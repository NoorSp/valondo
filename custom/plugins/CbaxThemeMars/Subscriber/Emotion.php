<?php

namespace CbaxThemeMars\Subscriber;

use Enlight\Event\SubscriberInterface;
use Shopware\Components\Plugin\ConfigReader;
use CbaxThemeMars\Components\ThemeMarsHelper;

class Emotion implements SubscriberInterface
{
	/**
     * @var
     */
    private $config;
	
	/**
     * @var $helperComponent
     */
	private $helperComponent;
	
	/**
     * @var
     */
    private $pluginPath;
	
	public function __construct($pluginPath, $pluginName, ConfigReader $configReader, ThemeMarsHelper $helperComponent)
    {
		$shop = false;
		if (Shopware()->Container()->initialized('shop')) {
			$shop = Shopware()->Container()->get('shop');
		}
	
		if (!$shop) {
			$shop = Shopware()->Container()->get('models')->getRepository(\Shopware\Models\Shop\Shop::class)->getActiveDefault();
		}
	
		$this->config = $configReader->getByPluginName($pluginName, $shop);
		
		$this->helperComponent = $helperComponent;
		
		$this->pluginPath = $pluginPath;
    }
	
	/**
     * {@inheritdoc}
     */
    public static function getSubscribedEvents()
    {
        return [
			'Enlight_Controller_Action_PostDispatchSecure_Backend_Emotion' => 'onPostDispatchBackendEmotion',
			'Enlight_Controller_Action_PostDispatchSecure_Widgets_Emotion' => 'onPostDispatchWidgetsEmotion',
			'Shopware_Controllers_Widgets_Emotion_AddElement' => 'onEmotionAddElement'
        ];
    }
	
	/**
     * @param \Enlight_Controller_ActionEventArgs $args
     */
    public function onPostDispatchBackendEmotion(\Enlight_Controller_ActionEventArgs $args)
    {
        $view = $args->getSubject()->View();
        $view->addTemplateDir($this->pluginPath . '/Resources/views');
		$view->extendsTemplate('backend/emotion/banner_element/view/detail/elements/banner_zoom.js');
    }

	public function onPostDispatchWidgetsEmotion(\Enlight_Event_EventArgs $args)
	{
		$controller = $args->getSubject();
		$view = $controller->View();
		
		$sEmotions = $view->sEmotions;

		foreach ($sEmotions as $emotionsKey => $sEmotion) {
			foreach ($sEmotion['elements'] as $emotionKey => $element) {
				if ($element['component']['xType'] !== 'emotion-components-article') {
					continue;
				}

				$articles = $this->helperComponent->getSecondArticleImage(array($element['data']));
				$sEmotions[$emotionsKey]['elements'][$emotionKey]['data'] = $articles[0];
			}
		}

		$view->sEmotions = $sEmotions;
		
		$view->addTemplateDir($this->pluginPath . '/Resources/views');
	}
	
	public function onEmotionAddElement(\Enlight_Event_EventArgs $args)
	{
		if (!$this->config['active'])
			return;
		
		$element = $args->get('element');

		if ($element['component']['xType'] !== 'emotion-components-banner-zoom') {
			return;
		}
		
		if ($element['component']['name'] !== 'Banner-Zoom Mars') {
			return;
		}

		$data = $args->getReturn();
		
		$data['zoomMars'] = (int)$data['zoom'] / 100;
		$data['durationMars'] = $data['duration'] . 's';

		$mediaService = Shopware()->Container()->get('shopware_media.media_service');
		$file = $mediaService->normalize($data['file']);
		$mediaId = Shopware()->Db()->fetchOne("SELECT id FROM s_media WHERE path = ?", [$file]);

		if ($mediaId) {
			$context = Shopware()->Container()->get('shopware_storefront.context_service')->getShopContext();
			$media = Shopware()->Container()->get('shopware_storefront.media_service')->get($mediaId, $context);
			if ($media instanceof \Shopware\Bundle\StoreFrontBundle\Struct\Media) {
				$mediaData = Shopware()->Container()->get('legacy_struct_converter')->convertMediaStruct($media);
			} else {
				$mediaData = [];
			}
			$data = array_merge($mediaData, $data);
		}

		$args->setReturn($data);
	}
}
