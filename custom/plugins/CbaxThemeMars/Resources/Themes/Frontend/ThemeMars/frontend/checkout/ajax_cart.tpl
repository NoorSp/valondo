{extends file="parent:frontend/checkout/ajax_cart.tpl"}

{* Basket link *}
{block name='frontend_checkout_ajax_cart_button_container'}

    {$smarty.block.parent}
    
    {include file="frontend/checkout/cart-promotion.tpl"}
    
{/block}