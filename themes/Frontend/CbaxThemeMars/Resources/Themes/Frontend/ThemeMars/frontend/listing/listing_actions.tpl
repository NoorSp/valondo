{extends file="parent:frontend/listing/listing_actions.tpl"}

{* Filter action button *}
{block name="frontend_listing_actions_filter"}
    {if !$theme.cbax_filter_active}
        {$smarty.block.parent}
    {/if}
{/block}

{* Filter options *}
{block name="frontend_listing_actions_filter_options"}
    {if !$theme.cbax_filter_active}
        {$smarty.block.parent}
    {/if}
{/block}