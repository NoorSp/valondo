<?php

namespace CbaxThemeMars\Subscriber;

use Enlight\Event\SubscriberInterface;
use Shopware\Components\Plugin\ConfigReader;
use CbaxThemeMars\Components\ThemeMarsHelper;

class Frontend implements SubscriberInterface
{
	/**
     * @var
     */
    private $config;
	
	/**
     * @var
     */
    private $pluginPath;
	
	/**
     * @var $helperComponent
     */
	private $helperComponent;
	
	/**
     * Frontend constructor
     */
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
		
		$this->pluginPath = $pluginPath;
		
		$this->helperComponent = $helperComponent;
    }

    public static function getSubscribedEvents()
    {
        return array(
			'Enlight_Controller_Action_PostDispatch' => ['onPostDispatch', 100],
			'Enlight_Controller_Action_PostDispatchSecure_Frontend_Listing' => 'onPostDispatchListing',
			//'Enlight_Controller_Action_PostDispatchSecure_Widgets_Listing' => 'onPostDispatchListingWidgets',
			'Enlight_Controller_Action_PostDispatchSecure_Frontend_Search' => 'onPostDispatchSearch',
			//'Enlight_Controller_Action_PostDispatchSecure_Frontend_LiveShopping' => 'onPostDispatchLiveShopping',
			//'Enlight_Controller_Action_PostDispatchSecure_Frontend_Bundle' => 'onPostDispatchBundle',
			//'Enlight_Controller_Action_PostDispatchSecure_Frontend_BonusSystem' => 'onPostDispatchBonusSystem',
			'Enlight_Controller_Action_PostDispatchSecure_Frontend_Note' => 'onPostDispatchNote',
			'Enlight_Controller_Action_PostDispatchSecure_Frontend_Account' => 'onPostDispatchAccount',
			'Enlight_Controller_Action_PostDispatchSecure_Frontend_Checkout' => 'onPostDispatchCheckout',
			'Shopware_Controllers_Widgets_Checkout::infoAction::after' => 'afterCheckoutInfo'
        );
    }
	
	public function onPostDispatch(\Enlight_Event_EventArgs $args)
	{
		if (!$this->config['active']) {
			return;
		}

		$controller = $args->getSubject();
		$request	= $controller->Request();
		$response	= $controller->Response();
		$view	    = $controller->View();
		
		if(!$request->isDispatched()||$response->isException() || $request->getModuleName()!='frontend')
		{
			return;
		}
		
		$breadcrumb = $view->sBreadcrumb;
		
		foreach ($breadcrumb AS $key => $value)
		{
			$breadcrumb[$key]['sub'] = $this->sGetCategoriesByParent($breadcrumb[$key]['id']);
		}

		$view->sBreadcrumb = $breadcrumb;

		$mars['notificationActive'] 			= $this->getNotificationActive($view->theme, $view->Controller);
		$mars['promotionSidebarWidgetActive'] = $this->getPromotionActive($view->theme, $view->Controller, 'sidebar-widget');
		$mars['promotionSidebarAboveActive'] 	= $this->getPromotionActive($view->theme, $view->Controller, 'sidebar-above');
		$mars['promotionSidebarBelowActive'] 	= $this->getPromotionActive($view->theme, $view->Controller, 'sidebar-below');
		$mars['promotionBasketActive'] 		= $this->getPromotionActive($view->theme, $view->Controller, 'basket');
		$mars['footerWidgetActive'] 			= $this->getPromotionActive($view->theme, $view->Controller, 'footer-widget');
		
		$theme = $view->theme;
		if ($view->sCategoryContent['hideFilter'])
		{
			$theme['cbax_filter_active'] = false;
		}
		$view->theme = $theme;
		
		$view->CbaxMars = $mars;
	}
	
	public function onPostDispatchListing(\Enlight_Event_EventArgs $args)
	{
		if (!$this->config['active']) {
			return;
		}

		$controller = $args->getSubject();
		$view	    = $controller->View();
		
		$sArticles = $view->sArticles;
		
		if (!empty($sArticles))
		{
            foreach($sArticles as &$article)
			{
                $article = $this->checkForShippingDelivery($article);
            }
			
            $view->sArticles = $sArticles;
        }
	}
	
	public function onPostDispatchSearch(\Enlight_Event_EventArgs $args)
	{
		if (!$this->config['active'])
			return;
        
		$controller = $args->getSubject();
		$request	= $controller->Request();
		$response	= $controller->Response();
		$view	    = $controller->View();
		
		$sSearchResults = $view->sSearchResults;
		
		if (!empty($sSearchResults['sArticles']))
		{
			foreach($sSearchResults['sArticles'] as &$article)
			{
                $article = $this->checkForShippingDelivery($article);
            }
			
            $view->sSearchResults = $sSearchResults;
        }
	}
	
	public function onPostDispatchNote(\Enlight_Event_EventArgs $args)
	{
		if (!$this->config['active'])
			return;
        
		$controller = $args->getSubject();
		$request	= $controller->Request();
		$response	= $controller->Response();
		$view	    = $controller->View();
		
		if (!$this->helperComponent->getConfiguratorActive('note'))
		{
			return;
		}
		
		$sNotes = $view->sNotes;
		
		foreach ($sNotes as &$content)
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
		$view->sNotes = $sNotes;
	}
	
	public function onPostDispatchAccount(\Enlight_Event_EventArgs $args)
	{
		if (!$this->config['active'])
			return;
        
		$controller = $args->getSubject();
		$request	= $controller->Request();
		$response	= $controller->Response();
		$view	    = $controller->View();
		
		if (!$this->helperComponent->getConfiguratorActive('account'))
		{
			return;
		}
		
		$sOpenOrders = $view->sOpenOrders;
		foreach ($sOpenOrders as &$oders)
		{
			foreach ($oders['details'] as &$content)
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
		$view->sOpenOrders = $sOpenOrders;
	}
	
	public function onPostDispatchCheckout(\Enlight_Event_EventArgs $args)
	{
		if (!$this->config['active'])
			return;
        
		$controller = $args->getSubject();
		$request	= $controller->Request();
		$response	= $controller->Response();
		$view	    = $controller->View();
		
		if (!$this->helperComponent->getConfiguratorActive('checkout'))
		{
			return;
		}
		
		$sBasket = $view->sBasket;
		foreach ($sBasket['content'] as &$content)
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
		$view->sBasket = $sBasket;
		
		// Ajax Add Article
		$ordernumber = $request->getParam('sAdd');
		if (empty($ordernumber)) {
			return;
		}
		
		$sArticle = $view->sArticle;
		
		$configurator = $this->helperComponent->getArticleConfigurator($sArticle['articleID'], $sArticle['ordernumber']);
			
		if ($configurator)
		{
			$sArticle['articlename'] = $configurator['articlename'];
			$sArticle['articleConfigurator'] = $configurator['articleConfigurator'];
		}
		
		$view->sArticle = $sArticle;
	}
	
	public function afterCheckoutInfo(\Enlight_Hook_HookArgs $args)
	{
		$controller = $args->getSubject();
		$view = $controller->View();

		$type = $controller->Request()->getParam('type', '');
		$view->type = $type;
	}
	
	public function checkForShippingDelivery($article)
	{
		$sql = "SELECT releasedate FROM s_articles_details WHERE articleID = ? AND kind = 1";
		$result = Shopware()->Db()->fetchOne($sql, array($article['articleID']));
		
		$article['sReleaseDate'] = $result;

        return $article;
    }

	public function sGetCategoriesByParent($id)
    {
		$sql = "
		SELECT 
			id,
			parent,
			description,
			blog
		FROM 
			s_categories 
		WHERE 
			parent = ?
		AND
			active = 1
		ORDER BY position, description 
		";
		$getCategories = Shopware()->Db()->fetchAll($sql, array($id));
		
		if (!$getCategories) return;
		
        $categories = array();
        foreach($getCategories as $category2)
		{
            $category["id"]     = $category2["id"];
			$category["parent"] = $category2["parent"];
			$category["name"]   = $category2["description"];
			$category["blog"]   = $category2["blog"];
			if ($category2["blog"])
			{
				$category["link"]	= Shopware()->Front()->Router()->assemble(array('sViewport'=>'blog','sCategory'=>$category2["id"]));
			}
			else
			{
				$category["link"]	= Shopware()->Front()->Router()->assemble(array('sViewport'=>'cat','sCategory'=>$category2["id"]));
			}

            $categories[] = $category;
        }

        return $categories;
    }
	
	public function checkController($display, $controller)
	{
		if (in_array('checkout', $display))
		{
			$display[] = 'account';
			$display[] = 'address';
			$display[] = 'payment';
			$display[] = 'register';
		}
		
		if (in_array($controller, $display))
		{
			return true;
		}
		else
		{
			return false;
		}
    }
	
	public function getNotificationActive($theme, $controller)
    {
		$active 	= $theme['cbax_notification_active'];
		$display	= $theme['cbax_notification_display'];
		$start_date = $theme['cbax_notification_start_date'];
		$end_date 	= $theme['cbax_notification_end_date'];
		$position 	= $theme['cbax_notification_position'];
		$text 		= $theme['cbax_notification_text'];
		
		if ($active && $text)
		{
			if (!$this->checkController($display, $controller))
			{
				return false;
			}
			
			if (!empty($start_date))
			{
				$timestamp_start_date 	= strtotime($start_date);
				$timestamp_current_date = strtotime(date("d.m.Y"));
				
				if ($timestamp_start_date > $timestamp_current_date)
				{
					return false;
				}
			}
			
			if (!empty($end_date))
			{
				$timestamp_end_date 	= strtotime($end_date);
				$timestamp_current_date = strtotime(date("d.m.Y"));
				
				if ($timestamp_end_date < $timestamp_current_date)
				{
					return false;
				}
			}
			
			return $position;
		}
		else
		{
			return false;
		}
    }
	
	public function getPromotionActive($theme, $controller, $element)
    {
		if ($element == 'sidebar-above')
		{
			$active 	= $theme['cbax_sidebar_active_above'];
			$display	= $theme['cbax_sidebar_display_above'];
			$start_date = $theme['cbax_sidebar_start_date_above'];
			$end_date 	= $theme['cbax_sidebar_end_date_above'];
			$content 	= $theme['cbax_sidebar_content_above'];
		}
		elseif ($element == 'sidebar-below')
		{
			$active 	= $theme['cbax_sidebar_active_below'];
			$display	= $theme['cbax_sidebar_display_below'];
			$start_date = $theme['cbax_sidebar_start_date_below'];
			$end_date 	= $theme['cbax_sidebar_end_date_below'];
			$content 	= $theme['cbax_sidebar_content_below'];
		}
		elseif ($element == 'sidebar-widget')
		{
			$active 	= $theme['cbax_sidebar_widget_active'];
			$display	= $theme['cbax_sidebar_widget_display'];
			$start_date = $theme['cbax_sidebar_widget_start_date'];
			$end_date 	= $theme['cbax_sidebar_widget_end_date'];
			$content 	= $theme['cbax_sidebar_widget_content'];
		}
		elseif ($element == 'footer-widget')
		{
			$active 	= $theme['cbax_footer_widget_active'];
			$display	= $theme['cbax_footer_widget_display'];
			$start_date = '';
			$end_date 	= '';
			$content 	= $theme['cbax_footer_widget_text'];
		}
		elseif ($element == 'basket')
		{
			$active 	= $theme['cbax_basket_active'];
			$display	= array('checkout');
			$start_date = $theme['cbax_basket_start_date'];
			$end_date 	= $theme['cbax_basket_end_date'];
			$content 	= $theme['cbax_basket_banner'];
		}
		
		if (!$this->checkController($display, $controller))
		{
			return false;
		}
		
		if ($active && $content)
		{
			if (!empty($start_date))
			{
				$timestamp_start_date 	= strtotime($start_date);
				$timestamp_current_date = strtotime(date("d.m.Y"));
				
				if ($timestamp_start_date > $timestamp_current_date)
				{
					return false;
				}
			}
			
			if (!empty($end_date))
			{
				$timestamp_end_date 	= strtotime($end_date);
				$timestamp_current_date = strtotime(date("d.m.Y"));
				
				if ($timestamp_end_date < $timestamp_current_date)
				{
					return false;
				}
			}
			
			return true;
		}
		else
		{
			return false;
		}
    }
}
