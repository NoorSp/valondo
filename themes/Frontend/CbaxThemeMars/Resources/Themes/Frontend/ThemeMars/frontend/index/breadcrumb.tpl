{extends file="parent:frontend/index/breadcrumb.tpl"}

{block name="frontend_index_breadcrumb_entry_inner"}
	
    {$smarty.block.parent}
    
    {if $theme.cbax_breadcrumb_active && $breadcrumb.sub}
        <ul class="subBreadcrumb panel has--border is--rounded" data-breadcrumb-duration="{$theme.cbax_breadcrumb_delay}">
            {foreach from=$breadcrumb.sub item=breadcrumbsub}
                <li>
                    <a href="{$breadcrumbsub.link}">{$breadcrumbsub.name}</a>
                </li>
            {/foreach}
        </ul>
    {/if}
{/block}