<?php

namespace CbaxThemeMars;

use Shopware\Components\Plugin;
use Shopware\Components\Plugin\Context\ActivateContext;
use Shopware\Components\Plugin\Context\DeactivateContext;
use Shopware\Components\Plugin\Context\InstallContext;
use Shopware\Components\Plugin\Context\UninstallContext;
use Shopware\Components\Plugin\Context\UpdateContext;
use CbaxThemeMars\Bootstrap\Updater;
use CbaxThemeMars\Bootstrap\EmotionElementInstaller;
use CbaxThemeMars\Bootstrap\Attributes;

/**
 * Shopware-Plugin CbaxThemeMars.
 */
class CbaxThemeMars extends Plugin
{
	/**
     * {@inheritdoc}
     */
    public function install(InstallContext $context)
    {
		$emotionElementInstaller = new EmotionElementInstaller(
            $this->getName(),
            $this->container->get('shopware.emotion_component_installer')
        );
		$emotionElementInstaller->install();
		
		$attributes = new Attributes($this->container->get('shopware_attribute.crud_service'), $this->container->get('models'));
        $attributes->createAttributes();
		
        parent::install($context);
    }

    /**
     * {@inheritdoc}
     */
    public function uninstall(UninstallContext $context)
    {
		if (!$context->keepUserData()) {
			$attributes = new Attributes($this->container->get('shopware_attribute.crud_service'), $this->container->get('models'));
			$attributes->removeAttributes();
		}
		
        $context->scheduleClearCache(UninstallContext::CACHE_LIST_ALL);
    }

    /**
     * {@inheritdoc}
     */
    public function update(UpdateContext $context)
    {
		$attributes = new Attributes($this->container->get('shopware_attribute.crud_service'), $this->container->get('models'));
        $attributes->createAttributes();
		
        $updater = new Updater();

        $updater->update($context->getCurrentVersion());

        $context->scheduleClearCache(UpdateContext::CACHE_LIST_ALL);
    }
	
	/**
     * {@inheritdoc}
     */
    public function activate(ActivateContext $context)
    {
        $context->scheduleClearCache(ActivateContext::CACHE_LIST_ALL);
    }

    /**
     * {@inheritdoc}
     */
    public function deactivate(DeactivateContext $context)
    {
       $context->scheduleClearCache(DeactivateContext::CACHE_LIST_ALL);
    }
}
