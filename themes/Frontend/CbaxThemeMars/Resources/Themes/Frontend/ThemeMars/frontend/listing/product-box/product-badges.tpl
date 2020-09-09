{extends file="parent:frontend/listing/product-box/product-badges.tpl"}

{block name='frontend_listing_box_article_discount'}
	{if $sArticle.shippingfree}
        {if $theme.cbax_show_shippingfree_listing && $productBoxLayout != 'slider'}
            <div class="product--badge badge--delivery">{s namespace="frontend/listing/box_article" name="ListingBoxSippingfree"}Versandfrei{/s}</div>
        {elseif $theme.cbax_show_shippingfree_slider && $productBoxLayout == 'slider'}
            <div class="product--badge badge--delivery">{s namespace="frontend/listing/box_article" name="ListingBoxSippingfree"}Versandfrei{/s}</div>
        {/if}
    {/if}
    {if $sArticle.has_pseudoprice}
        {if $theme.cbax_pseudoprice == 'percent'}
            <div class="product--badge badge--discount">
                -{$sArticle.pseudopricePercent.float}%
            </div>
        {elseif $theme.cbax_pseudoprice == 'absolute'}
            <div class="product--badge badge--discount">
               {assign var=pseudoprice_absolute value=$sArticle.pseudoprice_numeric - $sArticle.price_numeric}
                -{$pseudoprice_absolute|currency}
            </div>
         {else}
         	{$smarty.block.parent}
        {/if}
    {/if}
{/block}




