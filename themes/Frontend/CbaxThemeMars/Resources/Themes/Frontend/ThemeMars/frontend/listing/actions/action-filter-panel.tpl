{extends file="parent:frontend/listing/actions/action-filter-panel.tpl"}

{namespace name="frontend/listing/listing_actions"}

{block name='frontend_listing_actions_filter'}
	<div class="filter-headline" style="display: none;">{s name="ListingFilterHeadline"}Filtern nach{/s}</div>

	{$smarty.block.parent}

{/block}

{block name="frontend_listing_actions_filter_submit_button"}
	{if $theme.cbax_filter_active}
		{if !$theme.cbax_filter_auto_submit}
			{$smarty.block.parent}
		{/if}
	{else}
		{$smarty.block.parent}
	{/if}
{/block}