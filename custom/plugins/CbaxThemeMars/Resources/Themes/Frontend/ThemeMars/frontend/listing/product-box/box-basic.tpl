{extends file="parent:frontend/listing/product-box/box-basic.tpl"}

{* Product actions - Compare product, more information, buy now *}
{block name='frontend_listing_box_article_info_container'}

	{$smarty.block.parent}
    
    {block name='frontend_listing_box_article_delivery_info'}
        {if $theme.cbax_show_delivery_listing}
            {if $Controller != 'detail'}
                {include file="frontend/plugins/index/delivery_informations.tpl" sArticle=$sArticle}
            {/if}
        {/if}
    {/block}
{/block}