{extends file="parent:frontend/account/order_item_details.tpl"}

{* Name *}
{block name="frontend_account_order_item_name"}

    {$smarty.block.parent}
    
    {if $article.articleConfigurator}
       <ul class="content--article-configurator list--unstyled">
       {foreach $article.articleConfigurator as $config}
        <li class="content--article-configurator-entry">
            <strong class="entry--label">{$config.configuratorGroup}: </strong> <span class="entry--content">{$config.configuratorOption}</span>
        </li>
        {/foreach}
        </ul>
    {/if}
    
{/block}