{extends file="parent:frontend/listing/index.tpl"}

{* Sidebar left *}
{block name='frontend_index_content_left'}
    {if $theme.cbax_filter_active && $facets|count > 0}
    	{$countCtrlUrl = "{url module="widgets" controller="listing" action="listingCount" params=$ajaxCountUrlParams fullPath}"}

		{$data_listing = ''}

        <div class="cbax-aside">
            {if $theme.cbax_filter_position == 'before'}
                <div class="listing--actions is--rounded cbax-filter-sidebar" data-filter-active="{$theme.cbax_filter_active}" data-filter-permanent-open="{$theme.cbax_filter_permanent_open}" data-filter-panel-counter="{$theme.cbax_filter_panel_counter}" data-filter-auto-submit="{$theme.cbax_filter_auto_submit}" {$data_listing}>
                    {include file="frontend/listing/actions/action-filter-button.tpl"}
                    {include file="frontend/listing/actions/action-filter-panel.tpl"}
                </div>
                {include file='frontend/index/sidebar.tpl'}
            {else}
                {include file='frontend/index/sidebar.tpl'}
                <div class="listing--actions is--rounded cbax-filter-sidebar" data-filter-active="{$theme.cbax_filter_active}" data-filter-permanent-open="{$theme.cbax_filter_permanent_open}" data-filter-panel-counter="{$theme.cbax_filter_panel_counter}" data-filter-auto-submit="{$theme.cbax_filter_auto_submit}" {$data_listing}>
                    {include file="frontend/listing/actions/action-filter-button.tpl"}
                    {include file="frontend/listing/actions/action-filter-panel.tpl"}
                </div>
            {/if}
			{include file="frontend/index/sidebar-promotion-below.tpl"}
        </div>
    {else}
        {$smarty.block.parent}
    {/if}
{/block}

{* Banner *}
{block name="frontend_listing_index_banner"}
	{if !$hasEmotion && !$theme.cbax_show_banner_above}
		{include file='frontend/listing/banner.tpl'}
	{/if}
{/block}

{* Topseller *}
{block name="frontend_listing_index_topseller"}
	{if !$sCategoryContent.attribute.cbax_theme_mars_hide_topseller && !$sCategoryContent.attribute.cbaxThemeMarsHideTopseller}
		{$smarty.block.parent}
	{/if}
{/block}

{* Category headline *}
{block name="frontend_listing_index_text"}

	{if !$hasEmotion && !$theme.cbax_show_category_text_below}
		{include file='frontend/listing/text.tpl'}
	{/if}

{/block}

{block name="frontend_listing_index_tagcloud"}

	{if !$hasEmotion && $theme.cbax_show_category_text_below}
		{include file='frontend/listing/text.tpl'}
	{/if}
    
    {$smarty.block.parent}
    
{/block}