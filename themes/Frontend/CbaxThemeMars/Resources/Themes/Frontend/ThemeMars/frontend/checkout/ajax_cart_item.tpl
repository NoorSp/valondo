{extends file="parent:frontend/checkout/ajax_cart_item.tpl"}

{block name="frontend_checkout_ajax_cart_articlename_name"}

	{$smarty.block.parent}
   
	{if $sBasketItem.articleConfigurator}
		<ul class="content--article-configurator list--unstyled">
        {foreach $sBasketItem.articleConfigurator as $config}
		<li class="content--article-configurator-entry">
            <strong class="entry--label">{$config.configuratorGroup}: </strong> <span class="entry--content">{$config.configuratorOption}</span>
        </li>
        {/foreach}
        </ul>
	{/if}
    
{/block}