{extends file="parent:frontend/index/sidebar.tpl"}

{block name='frontend_index_left_categories'}
	{include file="frontend/index/sidebar-promotion-above.tpl"}
	{$smarty.block.parent}
{/block}

{block name='frontend_index_left_menu'}

	{$smarty.block.parent}
    
    {if !$theme.cbax_filter_active || ($theme.cbax_filter_active && $facets|count < 1)}
		{include file="frontend/index/sidebar-promotion-below.tpl"}
    {elseif $Controller != 'listing'}
		{include file="frontend/index/sidebar-promotion-below.tpl"}
    {/if}
{/block}

