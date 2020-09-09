<?php

namespace CbaxThemeMars\Components;

use Shopware\Components\Plugin\ConfigReader;

class ThemeMarsHelper
{
   /**
     * @var
     */
    private $config;

    public function __construct($pluginName, ConfigReader $configReader)
    {
		$shop = false;
		if (Shopware()->Container()->initialized('shop')) {
			$shop = Shopware()->Container()->get('shop');
		}
	
		if (!$shop) {
			$shop = Shopware()->Container()->get('models')->getRepository(\Shopware\Models\Shop\Shop::class)->getActiveDefault();
		}
	
		$this->config = $configReader->getByPluginName($pluginName, $shop);
    }

    public function getArticleConfigurator($articleID, $ordernumber)
	{
		$article = $this->getArticle($articleID);
			
		if ($article['configurator_set_id'] > 0)
		{
			$result['articlename'] = $article['name'];
			$result['articleConfigurator'] = $this->getConfigurator($ordernumber);
			
			return $result;
		}
	}
	
	public function getArticle($articleID)
	{
		$sql = "
		SELECT
			name,
			configurator_set_id
		FROM
			s_articles
		
		WHERE id = ?
		";
		
		return Shopware()->Db()->fetchRow($sql, array($articleID));
	}
	
	public function getConfigurator($ordernumber)
	{
		$sql = "
		SELECT
			cg.id AS configuratorGroupID,
			co.id AS configuratorOptionID,
			cg.name AS configuratorGroup,
			co.name AS configuratorOption
		FROM
			s_articles_details AS ad
			
		JOIN s_article_configurator_option_relations AS cor
		ON cor.article_id = ad.id
		
		JOIN s_article_configurator_options AS co
		ON co.id = cor.option_id
		
		JOIN s_article_configurator_groups AS cg
		ON cg.id = co.group_id
		
		WHERE ad.ordernumber = ?
		
		ORDER BY cg.position
		";
		$result = Shopware()->Db()->fetchAll($sql, array($ordernumber));
		
		foreach ($result as $key => $value)
		{
			$sql = "SELECT objectdata FROM s_core_translations WHERE objecttype='configuratorgroup' AND objectkey = ".$result[$key]["configuratorGroupID"]." AND objectlanguage=" . Shopware()->Shop()->getId();
            $translation = Shopware()->Db()->fetchOne($sql);
            if (!empty($translation)) {
                $translation = unserialize($translation);
				$result[$key]["configuratorGroup"] = $translation["name"];
            }
			
			$sql = "SELECT objectdata FROM s_core_translations WHERE objecttype='configuratoroption' AND objectkey = ".$result[$key]["configuratorOptionID"]." AND objectlanguage=" . Shopware()->Shop()->getId();
            $translation = Shopware()->Db()->fetchOne($sql);
            if (!empty($translation)) {
                $translation = unserialize($translation);
				$result[$key]["configuratorOption"] = $translation["name"];
            }
		}
		
		return $result;
	}
	
	public function getConfiguratorActive($display, $typ = 'frontend')
	{
		if ($typ == 'frontend')
		{
			// Shop Spezifische Einstellungen des Theme für das Frontend abfragen
			$shop = Shopware()->Container()->get('shop');
		}
		else
		{
			// Standard Einstellungen des Theme für das Backend abfragen
			$ids = array();
			
			$sql = "SELECT id FROM s_core_templates WHERE template = 'ThemeMars'";
			$template_id = Shopware()->Db()->fetchOne($sql);
			
			if ($template_id)
			{
				$sql = "SELECT id FROM s_core_templates WHERE parent_id = ?";
				$template_sub_id = Shopware()->Db()->fetchAll($sql, array($template_id));
				
				foreach($template_sub_id as $id)
				{
					$ids[] = $id['id'];
				}
			}
			
			array_push($ids, $template_id);
			$template_ids = implode(',', $ids);
			
			$sql = "
			SELECT 
				id
			FROM 
				s_core_shops
			WHERE 
				active = 1
			AND
				template_id IN (".$template_ids.")
			";
			$shopID = Shopware()->Db()->fetchOne($sql);
			
			if (!$shopID) {
				return false;
			}
			
			$shop = Shopware()->Models()->getRepository('Shopware\Models\Shop\Shop')->getActiveById($shopID);
		}
		
		$inheritance = Shopware()->Container()->get('theme_inheritance');
        $config = $inheritance->buildConfig(
            $shop->getTemplate(),
            $shop,
            false
        );
		
        if (empty($config)) {
            return false;
        }
		
		if ($config['cbax_configurator_active'])
		{
			if (in_array($display, $config['cbax_configurator_display']))
			{
				return true;
			}
			else
			{
				return false;
			}
		}
		else
		{
			return false;
		}
	}
	
	public function getSecondArticleImage($sArticles)
	{
		foreach ($sArticles as &$article) {
			$articleID = $article['articleID'];

			$sql = "
			SELECT 
				*
			FROM
				s_articles_img
			
			WHERE
				articleID = ?
				
			ORDER BY main, position
			";
			$images = Shopware()->Db()->fetchAll($sql, $articleID);

			if ($images && count($images) > 1) {
				foreach ($images as $image) {
					$articleImage = $this->getDataOfArticleImage($image);

					$article['cbax_theme_mars'][] = $articleImage;
				}
			}
		}
		
		return $sArticles;
	}

	public function getDataOfArticleImage($image)
	{
		// Album Setting
		$sql = "SELECT thumbnail_size, thumbnail_high_dpi FROM s_media_album_settings WHERE albumID = '-1'";
		$settings = Shopware()->Db()->fetchRow($sql);
		// we get all thumbnail sizes of the article album
		$sizes = explode(';', $settings['thumbnail_size']);
		// we get all thumbnail high Dpi of the article album
		$highDpiThumbnails = $settings['thumbnail_high_dpi'];

		$imageDir = Shopware()->System()->sPathArticleImg;
		$thumbDir = $imageDir . 'thumbnail/';


		if (empty($image['extension'])) $image['extension'] = 'jpg';

		$attribute = array();

		// attributes
		if (!empty($image['attribute1'])) {
			$attribute['attribute1'] = $image['attribute1'];
		}

		if (!empty($image['attribute2'])) {
			$attribute['attribute2'] = $image['attribute2'];
		}

		if (!empty($image['attribute3'])) {
			$attribute['attribute3'] = $image['attribute3'];
		}

		$thumbnails = array();

		foreach ($sizes as $size) {
			$size = explode('x', $size);

			$suffix = $size[0] . 'x' . $size[1];

			$mediaService = Shopware()->Container()->get('shopware_media.media_service');

			$source = $mediaService->getUrl($thumbDir . $image['img'] . '_' . $suffix . '.' . $image['extension']);
			if ($highDpiThumbnails) {
				$retinaSource = $mediaService->getUrl($thumbDir . $image['img'] . '_' . $suffix . '@2x.' . $image['extension']);
				$sourceSet = sprintf('%s, %s 2x', $source, $retinaSource);
			} else {
				$sourceSet = $source;
			}

			$thumbnails[] = [
				'source' => $source,
				'retinaSource' => $retinaSource,
				'sourceSet' => $sourceSet,
				'maxWidth' => $size[0],
				'maxHeight' => $size[1]
			];
		}
		
		$data = array(
			'id' => $image["id"],
			'position' => 1,
			'source' => $mediaService->getUrl($imageDir . $image["img"] . "." . $image["extension"]),
			'description' => $image["description"],
			'extension' => $image["extension"],
			'main' => 1,
			'parentId' => null,
			'thumbnails' => $thumbnails,
			'attribute' => $attribute
		);

		return $data;
	}
}
