{if $CbaxMars.promotionBasketActive}
    <div class="banner--container">
        {if $theme.cbax_basket_link}
            <a href="{s namespace='frontend/checkout/ajax_cart' name="MarsBasketLink"}{$theme.cbax_basket_link}{/s}" class="banner--link">
                <img class="banner--img" alt="Banner" src="{s namespace='frontend/checkout/ajax_cart' name="MarsBasketBanner"}{$theme.cbax_basket_banner}{/s}">
            </a>
        {else}
            <img class="banner--img" alt="Banner" src="{s namespace='frontend/checkout/ajax_cart' name="MarsBasketBanner"}{$theme.cbax_basket_banner}{/s}">
        {/if}
    </div>
{/if}