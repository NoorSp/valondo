{extends file="parent:frontend/index/index.tpl"}

{block name="frontend_index_body_classes"}
    {$smarty.block.parent}
    {if $theme.mars_background_image} mars-background-image{/if}
{/block}

{* Notification above *}
{block name='frontend_index_before_page'}

    {$smarty.block.parent}

    {if $CbaxMars.notificationActive == 'above'}
        <div class="cbax-notification{if $theme.cbax_notification_link && $theme.cbax_notification_link_text} is-button{/if} {$theme.cbax_notification_position}{if $theme.cbax_notification_active_smartphone} notification-show-mobile{/if}">
            <div class="container">
                <div class="notification-text">{s namespace='frontend/index/index' name="MarsNotificationText"}{$theme.cbax_notification_text}{/s}</div>
                {if $theme.cbax_notification_link && $theme.cbax_notification_link_text}
                    <div class="notification-link">
                        <div class="button"><a href="{$theme.cbax_notification_link}">{s namespace='frontend/index/index' name="MarsNotificationLinkText"}{$theme.cbax_notification_link_text}{/s}</a></div>
                    </div>
                {/if}
            </div>
        </div>
    {/if}
{/block}

{block name='frontend_index_top_bar_container'}
	{if $theme.cbax_top_bar_active}
    	{include file="frontend/index/topbar-navigation.tpl"}
    {/if}
{/block}

{* Sticky Menu *}
{block name='frontend_index_navigation'}

    {$smarty.block.parent}

    {if $theme.cbax_sticky_active}
        <div class="dummy-sticky"></div>

        {* Sticky Suche *}
        <nav class="navigation-sticky" data-stickysearch-duration="{$theme.cbax_sticky_delay}"
             data-sticky-show="{$theme.cbax_sticky_typ}"
             data-sticky-tablet-show="{$theme.cbax_sticky_tablet}"
             data-sticky-phone-show="{$theme.cbax_sticky_phone}">
            <div class="container">

                <nav class="sticky--navigation block-group">
                    {* Menu bottom trigger *}
                    <div class="entry--menu-bottom">
                        <a class="entry--link entry--trigger btn is--icon-left">
                            <i class="icon--menu"></i> {s namespace='frontend/index/menu_bottom' name="IndexLinkMenu"}{/s}
                        </a>
                    </div>
                </nav>

                <div class="logo-main block-group" role="banner">
                    {* Main shop logo *}
                    <div class="logo--shop block">
                        {if $theme.cbax_sticky_logo}
                            {$sticky_logo = $theme.cbax_sticky_logo}
                        {else}
                            {$sticky_logo = $theme.mobileLogo}
                        {/if}
						<a class="logo--link" href="{url controller='index'}"
						   title="{"{config name=shopName}"|escape} - {"{s name='IndexLinkDefault' namespace="frontend/index/index"}{/s}"|escape}">
							<img srcset="{link file=$sticky_logo}"
								 alt="{"{config name=shopName}"|escape} - {"{s name='IndexLinkDefault' namespace="frontend/index/index"}{/s}"|escape}"/>
						</a>
                    </div>
                </div>

                <nav class="shop--navigation block-group">
                    <ul class="navigation--list block-group" role="menubar">

                        {* Menu (Off canvas left) trigger *}
                        <li class="navigation--entry entry--menu-left" role="menuitem">
                            <a class="entry--link entry--trigger btn is--icon-left" href="#offcanvas--left"
                               data-offcanvas="true" data-offCanvasSelector=".sidebar-main">
                                <i class="icon--menu"></i> {s namespace='frontend/index/menu_left' name="IndexLinkMenu"}{/s}
                            </a>
                        </li>

                        {* Search form *}
                        <li class="navigation--entry entry--search" role="menuitem" data-search="true"
                            aria-haspopup="true"{if $theme.focusSearch && {controllerName} == 'index'} data-activeOnStart="true"{/if}>
                            <a class="btn entry--link entry--trigger" href="#show-hide--search"
                               title="{"{s namespace='frontend/index/search' name="IndexTitleSearchToggle"}{/s}"|escape}">
                                <i class="icon--search"></i>
                                <span class="search--display">{s namespace='frontend/index/search' name="IndexSearchFieldSubmit"}{/s}</span>
                            </a>

                            {* Include of the search form *}
                            {include file="frontend/index/search.tpl"}
                        </li>

                        {* Include of the cart *}
                        {action module=widgets controller=checkout action=info}
                    </ul>
                </nav>
            </div>
        </nav>
    {/if}
{/block}

{* Content top container *}
{block name="frontend_index_content_top"}

    {$smarty.block.parent}

    {if !$hasEmotion && $theme.cbax_show_banner_above}
        {include file='frontend/listing/banner.tpl'}
    {/if}
{/block}

{* Footer *}
{block name="frontend_index_footer"}
	{if $theme.cbax_payment_and_shipping_active}
        <footer class="footer-info">
            <div class="container">
                {include file='frontend/index/footer_info.tpl'}
            </div>
        </footer>
    {/if}
    <footer class="footer-main">
        <div class="container">
            {block name="frontend_index_footer_container"}
                {include file='frontend/index/footer.tpl'}
            {/block}
        </div>
    </footer>
    <footer class="footer-bottom">
        <div class="container">
            {include file='frontend/index/footer_bottom.tpl'}
        </div>
    </footer>
{/block}

{* Last seen products *}
{block name='frontend_index_left_last_articles'}
    {if $sLastArticlesShow && !$isEmotionLandingPage}
        {* Last seen products *}
        <div class="last-seen-products is--hidden" data-last-seen-products="true">
            <div class="last-seen-products--title">
                <span>{s namespace="frontend/plugins/index/viewlast" name='WidgetsRecentlyViewedHeadline'}{/s}</span>
            </div>
            <div class="last-seen-products--slider product-slider" data-product-slider="true">
                <div class="last-seen-products--container product-slider--container"></div>
            </div>
        </div>
    {/if}
{/block}

{* Scroll To Top *}
{block name='frontend_index_body_inline'}
	
    {$smarty.block.parent}
    
	{if $theme.cbax_backtotop_active}
        <div id="backtotop" class="backtotop {$theme.cbax_backtotop_position}" title="Back to Top" data-backtotop-duration="{$theme.cbax_backtotop_delay}">
            <button class="btn {$theme.cbax_backtotop_button}">
                <i class="icon--arrow-up"></i>
            </button>
        </div>
    {/if}

    {if $CbaxMars.promotionSidebarWidgetActive}
        <div class="cbax-sidebar-widget {$theme.cbax_sidebar_widget_position}" data-sidebar-widget-position="{$theme.cbax_sidebar_widget_position}">
            <div class="sidebar-widget-content">
                {s namespace='frontend/index/index' name="MarsSidebarWidgetContent"}{$theme.cbax_sidebar_widget_content}{/s}
            </div>
            <div class="sidebar-widget-button">
                <i class="icon--element {$theme.cbax_sidebar_widget_icon}"></i>
                <span>{s namespace='frontend/index/index' name="MarsSidebarWidgetHeadline"}{$theme.cbax_sidebar_widget_headline}{/s}</span>
            </div>
        </div>
    {/if}

    {if $CbaxMars.footerWidgetActive}
        <div class="cbax-footer-widget {$theme.cbax_footer_widget_position}{if $theme.cbax_footer_widget_active_smartphone} footer-widget-show-mobile{/if}">
            <div class="footer-widget-icon">
                {if $theme.cbax_footer_widget_link}
                    <a href="{$theme.cbax_footer_widget_link}"><i class="icon--element {$theme.cbax_footer_widget_icon}"></i></a>
                {else}
                    <i class="icon--element {$theme.cbax_footer_widget_icon}"></i>
                {/if}
            </div>
            <div class="footer-widget-content">
                <div class="footer-widget-headline">{$theme.cbax_footer_widget_headline}</div>
                <div class="footer-widget-text">{$theme.cbax_footer_widget_text}</div>
            </div>
        </div>
    {/if}

    {if $CbaxMars.notificationActive == 'below'}
        <div class="cbax-notification{if $theme.cbax_notification_link && $theme.cbax_notification_link_text} is-button{/if} {$theme.cbax_notification_position}{if $theme.cbax_notification_active_smartphone} notification-show-mobile{/if}">
            <div class="container">
                <div class="notification-text">{s namespace='frontend/index/index' name="MarsNotificationText"}{$theme.cbax_notification_text}{/s}</div>
                {if $theme.cbax_notification_link && $theme.cbax_notification_link_text}
                    <div class="notification-link">
                        <div class="button"><a href="{$theme.cbax_notification_link}">{s namespace='frontend/index/index' name="MarsNotificationLinkText"}{$theme.cbax_notification_link_text}{/s}</a></div>
                    </div>
                {/if}
            </div>
        </div>
    {/if}
{/block}