<?php

namespace CbaxThemeMars\Bootstrap;

use Shopware\Components\Emotion\ComponentInstaller;

class EmotionElementInstaller
{
    /**
     * @var ComponentInstaller
     */
    private $emotionComponentInstaller;

    /**
     * @var string
     */
    private $pluginName;

    /**
     * @param string $pluginName
     * @param ComponentInstaller $emotionComponentInstaller
     */
    public function __construct($pluginName, ComponentInstaller $emotionComponentInstaller)
    {
        $this->emotionComponentInstaller = $emotionComponentInstaller;
        $this->pluginName = $pluginName;
    }

    public function install()
    {
        $bannerZoomElement = $this->emotionComponentInstaller->createOrUpdate(
            $this->pluginName,
            'CbaxThemeMars',
            [
                'name' => 'Banner-Zoom Mars',
				'xtype' => 'emotion-components-banner-zoom',
				'template' => 'emotion_banner_zoom_mars',
				'cls' => 'emotion-banner-zoom-element',
				'description' => 'Erzeugt einen Zoom Effekt beim Hover für das hinterlegte Banner.'
            ]
        );

        $bannerZoomElement->createHiddenField([
            'name' => 'bannerPosition',
			'defaultValue' => 'center',
			'allowBlank' => true
        ]);
		
		$bannerZoomElement->createMediaField([
            'name' => 'file',
			'fieldLabel' => 'Bild'
        ]);
		
		$bannerZoomElement->createTextField([
            'name' => 'link',
			'fieldLabel' => 'Link',
			'allowBlank' => true
        ]);
		
		$bannerZoomElement->createTextField([
            'name' => 'title',
			'fieldLabel' => 'Titel',
			'allowBlank' => true
        ]);
		
		$bannerZoomElement->createNumberField([
            'name' => 'zoom',
			'fieldLabel' => 'Zoom',
			'defaultValue' => 105,
			'helpText' => 'Der Zoom bei Hover. Angabe in Prozent. Beispiel: 105'
        ]);
		
		$bannerZoomElement->createNumberField([
            'name' => 'duration',
			'fieldLabel' => 'Dauer des Übergangs',
			'defaultValue' => .4
        ]);
    }
}