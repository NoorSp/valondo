{extends file="parent:frontend/search/fuzzy.tpl"}

{* Sidebar left *}
{block name='frontend_index_content_left'}
    {if $theme.cbax_filter_active}
    	{$countCtrlUrl = "{url module="widgets" controller="listing" action="listingCount" params=$ajaxCountUrlParams fullPath}"}

		{$data_listing = ''}

		<div class="cbax-aside">
			{if $theme.cbax_filter_position == 'before'}
				<div class="listing--actions is--rounded cbax-filter-sidebar is--open" data-filter-active="{$theme.cbax_filter_active}" data-filter-permanent-open="{$theme.cbax_filter_permanent_open}" data-filter-panel-counter="{$theme.cbax_filter_panel_counter}" data-filter-auto-submit="{$theme.cbax_filter_auto_submit}" {$data_listing}>
					{include file="frontend/listing/actions/action-filter-button.tpl"}
					{include file="frontend/listing/actions/action-filter-panel.tpl"}
				</div>
				{include file='frontend/index/sidebar.tpl'}
			{else}
				{include file='frontend/index/sidebar.tpl'}
				<div class="listing--actions is--rounded cbax-filter-sidebar is--open" data-filter-active="{$theme.cbax_filter_active}" data-filter-permanent-open="{$theme.cbax_filter_permanent_open}" data-filter-panel-counter="{$theme.cbax_filter_panel_counter}" data-filter-auto-submit="{$theme.cbax_filter_auto_submit}" {$data_listing}>
					{include file="frontend/listing/actions/action-filter-button.tpl"}
					{include file="frontend/listing/actions/action-filter-panel.tpl"}
				</div>
			{/if}
		</div>
    {else}
        {$smarty.block.parent}
    {/if}
{/block}