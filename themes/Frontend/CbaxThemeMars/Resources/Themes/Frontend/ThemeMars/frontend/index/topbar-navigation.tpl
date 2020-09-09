{extends file="parent:frontend/index/topbar-navigation.tpl"}

{* Top bar navigation *}
{block name="frontend_index_top_bar_nav"}
    <div class="top-bar--navigation top-bar--cbax" style="float:left;">
        
 		<div class="navigation--entry entry--cbax">
        	{if $theme.cbax_icon_top_bar1}
                <i class="{$theme.cbax_icon_top_bar1}"></i>
          	{/if}
          	{s namespace="frontend/index/topbar" name='description1'}Schnelle Lieferung{/s}
  		</div>
        
		<div class="navigation--entry entry--cbax">
        	{if $theme.cbax_icon_top_bar2}
                <i class="{$theme.cbax_icon_top_bar2}"></i>
         	{/if}
           {s namespace="frontend/index/topbar" name='description2'}Kostenloser Versand{/s}
        </div>
        
        <div class="navigation--entry entry--cbax">
        	{if $theme.cbax_icon_top_bar3}
                <i class="{$theme.cbax_icon_top_bar3}"></i>
          	{/if}
            {s namespace="frontend/index/topbar" name='description3'}30 Tage Geld zurück Garantie{/s}
      	</div>
        
    </div>
    
    {$smarty.block.parent}
    
{/block}

{block name="frontend_index_checkout_actions_service_menu"}

	{$smarty.block.parent}

    {action module=widgets controller=Topbar action=topbar sCategory=$sCategoryContent.id}
    
    <div class="navigation--entry entry--account{if {config name=useSltCookie}} with-slt{/if}"
    	role="menuitem"
        data-offcanvas="true"
        data-offCanvasSelector=".mars-account--dropdown-navigation">
        <a href="{url controller='account'}"
        	title="{"{if $userInfo}{s name="AccountGreetingBefore" namespace="frontend/account/sidebar"}{/s}{$userInfo['firstname']}{s name="AccountGreetingAfter" namespace="frontend/account/sidebar"}{/s} - {/if}{s namespace='frontend/index/checkout_actions' name='IndexLinkAccount'}{/s}"|escape}"
            class="entry--link account--link{if $userInfo} account--user-loggedin{/if}">
            <i class="icon--account"></i>
            <span class="account--display">
                {s namespace='frontend/index/checkout_actions' name='IndexLinkAccount'}{/s}
            </span>
        </a>
        
        {if {config name=useSltCookie}}
                <div class="mars-account--dropdown-navigation">

                        <div class="navigation--smartphone">
                            <div class="entry--close-off-canvas">
                                <a href="#close-account-menu"
                                   class="account--close-off-canvas"
                                   title="{s namespace='frontend/index/menu_left' name="IndexActionCloseMenu"}{/s}">
                                    {s namespace='frontend/index/menu_left' name="IndexActionCloseMenu"}{/s} <i class="icon--arrow-right"></i>
                                </a>
                            </div>
                        </div>

                        {include file="frontend/account/sidebar.tpl" showSidebar=true inHeader=true}
                </div>
        {/if}
    </div>
{/block}