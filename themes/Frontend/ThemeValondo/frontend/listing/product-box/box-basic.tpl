{extends file='parent:frontend/listing/product-box/box-basic.tpl'}

{block name='frontend_listing_box_article_info_container'}
    <div class="product--info">

        {* Product image *}
        {block name='frontend_listing_box_article_picture'}
            {include file="frontend/listing/product-box/product-image.tpl"}
        {/block}

        {* Customer rating for the product *}
        {block name='frontend_listing_box_article_rating'}
            {if !{config name=VoteDisable}}
                {if $sArticle.sVoteAverage.average}
                    <div class="product--rating-container">
                        {include file='frontend/_includes/rating.tpl' points=$sArticle.sVoteAverage.average type="aggregated" label=false microData=false}
                    </div>
                {/if}
            {/if}
        {/block}

        {* Product name *}
        {block name='frontend_listing_box_article_name'}
            <div class="product--supplier--heart">
                <span class="product--vd--supplier">{$sArticle.supplierName}</span>

            </div>
            <a href="{$sArticle.linkDetails}"
               class="product--title"
               title="{$sArticle.articleName|escapeHtml}">
                {$sArticle.articleName|truncate:50|escapeHtml}
            </a>
        {/block}

        {* Variant description *}
        {block name='frontend_listing_box_variant_description'}
            {if $sArticle.attributes.swagVariantConfiguration}
                <div class="variant--description">
                                    <span title="
                                        {foreach $sArticle.attributes.swagVariantConfiguration->get('value') as $group}
                                                {$group.groupName}: {$group.optionName}
                                        {/foreach}
                                        ">
                                        {foreach $sArticle.attributes.swagVariantConfiguration->get('value') as $group}
                                            <span class="variant--description--line">
                                                <span class="variant--groupName">{$group.groupName}:</span> {$group.optionName} {if !$group@last}|{/if}
                                            </span>
                                        {/foreach}
                                    </span>
                </div>
            {/if}
        {/block}

        {* Product description *}
        {block name='frontend_listing_box_article_description'}
            <div class="product--description">
                {$sArticle.description_long|strip_tags|truncate:240}
            </div>
        {/block}

        {block name='frontend_listing_box_article_price_info'}
            <div class="product--price-info">

                {* Product price - Unit price *}
                {block name='frontend_listing_box_article_unit'}
                    {include file="frontend/listing/product-box/product-price-unit.tpl"}
                {/block}

                {* Product price - Default and discount price *}
                {block name='frontend_listing_box_article_price'}
                    {include file="frontend/listing/product-box/product-price.tpl"}
                {/block}
            </div>
        {/block}

        {block name="frontend_listing_box_article_buy"}
            {if {config name="displayListingBuyButton"}}
                <div class="product--btn-container">
                    {if $sArticle.allowBuyInListing}
                        {include file="frontend/listing/product-box/button-buy.tpl"}
                    {else}
                        {include file="frontend/listing/product-box/button-detail.tpl"}
                    {/if}
                </div>
            {/if}
        {/block}

        {* Product actions - Compare product, more information *}
        {block name='frontend_listing_box_article_actions'}
            {include file="frontend/listing/product-box/product-actions.tpl"}
        {/block}

        {block name='frontend_listing_box_article_delivery_info'}
            {if $theme.cbax_show_delivery_listing}
                {if $Controller != 'detail'}
                    {include file="frontend/plugins/index/delivery_informations.tpl" sArticle=$sArticle}
                {/if}
            {/if}
        {/block}
    </div>
{/block}