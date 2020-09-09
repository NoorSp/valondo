{extends file="parent:frontend/detail/data.tpl"}

{block name='frontend_detail_data_pseudo_price'}
	{if $sArticle.shippingfree}
    	<div class="detail--delivery">{s namespace="frontend/detail/data" name="DetailDataSippingfree"}Versandfrei{/s}</div>
    {/if}
    
    {$smarty.block.parent}
    
{/block}

{block name='frontend_detail_data_pseudo_price_discount_icon'}
	{if $theme.cbax_pseudoprice == 'percent'}
        <span class="price--discount-icon">
            -{$sArticle.pseudopricePercent.float}%
        </span>
    {elseif $theme.cbax_pseudoprice == 'absolute'}
        <span class="price--discount-icon">
            {assign var=pseudoprice_absolute value=$sArticle.pseudoprice_numeric - $sArticle.price_numeric}
            -{$pseudoprice_absolute|currency}
        </span>
    {else}
    	{$smarty.block.parent}
    {/if}
{/block}

{block name='frontend_detail_data_pseudo_price_discount_content_percentage'}
	{if $theme.cbax_pseudoprice != 'percent'}
    	{$smarty.block.parent}
    {/if}
{/block}