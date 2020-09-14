{extends file="parent:frontend/listing/product-box/box-product-slider.tpl"}

{block name='frontend_listing_box_article_info_container'}
    <div class="product--info full-slide">

        <div>
            {* Product image *}
            {block name='frontend_listing_box_article_picture'}
                {include file="frontend/listing/product-box/product-image.tpl"}
            {/block}
        </div>

        <div class="slide-info-wrap">
            {* Product name *}
            {block name='frontend_listing_box_article_name'}
                <a href="{$sArticle.linkDetails}"
                   class="product--title"
                   title="{$sArticle.articleName|escapeHtml}">
                    {$sArticle.articleName|truncate:50|escapeHtml}
                </a>
                <div class="product--description">
                    {$sArticle.description_long|strip_tags|truncate:140}
                </div>
            {/block}

            {* Variant description *}
            {block name='frontend_listing_box_variant_description'}{/block}

            <div class="slide-price-btn-wrap">
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

                {block name='frontend_listing_box_article_delivery_info'}{/block}

                <a href="{$sArticle.linkDetails}" title="{$sArticle.articleName|escapeHtml}">zum Produkt ></a>
            </div>
        </div>
    </div>
{/block}