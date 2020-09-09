<?php

namespace CbaxThemeMars\Subscriber;

use Enlight\Event\SubscriberInterface;
use CbaxThemeMars\Components\ThemeMarsHelper;

class Backend implements SubscriberInterface
{
	/**
     * @var
     */
    private $pluginPath;
	
	/**
     * @var $helperComponent
     */
	private $helperComponent;

    /**
     * Backend constructor
     */
    public function __construct($pluginPath, ThemeMarsHelper $helperComponent)
    {
		$this->pluginPath = $pluginPath;
		
		$this->helperComponent = $helperComponent;
    }

    public static function getSubscribedEvents()
    {
        return array(
			'Enlight_Controller_Action_PostDispatchSecure_Backend_Category' => 'loadBackendModuleCategory',
			'Shopware_Components_Document::assignValues::after' => 'afterAssignValues',
			// 'Shopware_Plugin_Collect_MediaXTypes' => 'onCollectMediaXTypes',
			'Shopware_Modules_Order_SendMail_FilterVariables' => 'sendMailFilterVariables'

        );
    }
	
	public function loadBackendModuleCategory(\Enlight_Event_EventArgs $args)
    {
        $request = $args->getRequest();
		$view = $args->getSubject()->View();

		$view->addTemplateDir($this->pluginPath . '/Resources/views/');

		if ($request->getActionName() === 'load') {

			$view->extendsTemplate('backend/category/theme_mars/controller/main.js');
			$view->extendsTemplate('backend/category/theme_mars/controller/settings.js');
			$view->extendsTemplate('backend/category/theme_mars/view/settings.js');
		}
    }
	
	public function afterAssignValues(\Enlight_Hook_HookArgs $args)
	{
		if (!$this->helperComponent->getConfiguratorActive('document', 'backend'))
		{
			return;
		}
		
		$doc = $args->getSubject();
		
		/** @var \Smarty_Data $view */
        $view = $doc->_view;
		
		$pages = $view->getTemplateVars('Pages');
		
		$order = $args->getSubject()->_order->__toArray();
		
		foreach ($pages as &$page)
		{
            foreach ($page as &$content)
			{
				if ($content['modus'] == 0)
				{
					$configurator = $this->helperComponent->getArticleConfigurator($content['articleID'], $content['articleordernumber']);
				
					if ($configurator)
					{
						$content['name'] = $configurator['articlename'];
						$content['articleConfigurator'] = $configurator['articleConfigurator'];
					}
				}
            }
        }
		
		$view->assign('Pages', $pages);
	}
	
	public function sendMailFilterVariables(\Enlight_Event_EventArgs $args)
	{
		if (!$this->helperComponent->getConfiguratorActive('mail', 'backend'))
		{
			return;
		}
		
		$variables = $args->getReturn();
		
		foreach ($variables['sOrderDetails'] as &$content)
		{
			if ($content['modus'] == 0)
			{
				$configurator = $this->helperComponent->getArticleConfigurator($content['articleID'], $content['ordernumber']);
				
				if ($configurator)
				{
					$content['articlename'] = $configurator['articlename'];
					$content['articleConfigurator'] = $configurator['articleConfigurator'];
				}
			}
		}
		
		return $variables;
	}

	/*
	public function onCollectMediaXTypes(Enlight_Event_EventArgs $args)
	{
		return new Doctrine\Common\Collections\ArrayCollection(array(
			'mediafield'
		));
	}
	*/

}