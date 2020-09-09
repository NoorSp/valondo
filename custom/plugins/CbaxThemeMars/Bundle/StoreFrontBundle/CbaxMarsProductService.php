<?php

namespace CbaxThemeMars\Bundle\StoreFrontBundle;

use Doctrine\DBAL\Connection;
use Shopware\Bundle\StoreFrontBundle\Gateway\DBAL\FieldHelper;
use Shopware\Bundle\StoreFrontBundle\Gateway\DBAL\Hydrator;
use Shopware\Bundle\StoreFrontBundle\Service\ListProductServiceInterface;
use Shopware\Bundle\StoreFrontBundle\Struct;

class CbaxMarsProductService implements ListProductServiceInterface
{
	private $service;

	private $connection;

	private $fieldHelper;

	private $hydrator;

	function __construct(
		ListProductServiceInterface $service,
		Connection $connection,
		FieldHelper $fieldHelper,
		Hydrator\MediaHydrator $hydrator
	) {
		$this->service = $service;
		$this->connection = $connection;
		$this->fieldHelper = $fieldHelper;
		$this->hydrator = $hydrator;
	}

	public function getList(array $numbers, Struct\ProductContextInterface $context)
	{
		$coreProducts = $this->service->getList($numbers, $context);

		$ids = array();
		foreach ($coreProducts as $product) {
			array_push($ids, $product->getId());
		}
		$ids = array_unique($ids);

		$query = $this->getQuery($context);

		$query->andWhere('image.articleID IN (:products)')
			->addOrderBy('image.main')
			->addOrderBy('image.position')
			->setParameter(':products', $ids, Connection::PARAM_INT_ARRAY);

		$stmt = $query->execute();

		$data = $stmt->fetchAll(\PDO::FETCH_ASSOC);

		$result = array();
		foreach ($data as $row) {
			$productId = $row['__image_articleID'];

			$result[$productId][] = $this->hydrator->hydrateProductImage($row);
		}

		foreach ($numbers as $number) {
			if (array_key_exists($number, $coreProducts)) {
				$coreProduct = $coreProducts[$number];
				$id = $coreProduct->getId();

				if (isset($result[$id]) && count($result[$id]) > 1) {

					$image_array = null;

					foreach ($result[$id] as $key => $image) {
						$image_array[$key] = Shopware()->Container()->get('legacy_struct_converter')->convertMediaStruct(
							$image
						);
					}

					$attribute = new Struct\Attribute(['images' => $image_array]);
					$coreProduct->addAttribute('cbax_theme_mars', $attribute);

					$coreProducts[$number] = $coreProduct;
				}
			}
		}

		return $coreProducts;
	}

	public function get($number, Struct\ProductContextInterface $context)
	{
		$coreProducts = $this->getList([$number], $context);
		return array_shift($coreProducts);
	}

	private function getQuery(Struct\ShopContextInterface $context)
	{
		$query = $this->connection->createQueryBuilder();

		$query->select($this->fieldHelper->getMediaFields())
			->addSelect($this->fieldHelper->getImageFields());

		$query->from('s_articles_img', 'image')
			->innerJoin('image', 's_media', 'media', 'image.media_id = media.id')
			->innerJoin('media', 's_media_album_settings', 'mediaSettings', 'mediaSettings.albumID = media.albumID')
			->leftJoin('image', 's_media_attributes', 'mediaAttribute', 'mediaAttribute.mediaID = image.media_id')
			->leftJoin('image', 's_articles_img_attributes', 'imageAttribute', 'imageAttribute.imageID = image.id')
			->andWhere('image.parent_id IS NULL');

		$this->fieldHelper->addImageTranslation($query, $context);
		$this->fieldHelper->addMediaTranslation($query, $context);

		return $query;
	}
}