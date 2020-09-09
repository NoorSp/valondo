{extends file="parent:frontend/checkout/items/product.tpl"}

{* Product name *}
{block name='frontend_checkout_cart_item_details_title'}

   {$smarty.block.parent}
   
   {if $sBasketItem.articleConfigurator}
       <ul class="content--article-configurator content list--unstyled">
       {foreach $sBasketItem.articleConfigurator as $config}
        <li class="content--article-configurator-entry">
            <strong class="entry--label">{$config.configuratorGroup}: </strong> <span class="entry--content">{$config.configuratorOption}</span>
        </li>
        {/foreach}
        </ul>
    {/if}
    
{/block}