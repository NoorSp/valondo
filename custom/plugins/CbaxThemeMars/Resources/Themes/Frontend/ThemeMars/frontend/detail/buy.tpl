{extends file="parent:frontend/detail/buy.tpl"}

{block name="frontend_detail_buy"}
    {if $theme.cbax_variant_info_active}
        {if (!isset($sArticle.active) || $sArticle.active)}
            {if $sArticle.isAvailable}
                {if $sArticle.sConfigurator && !$activeConfiguratorSelection}
                    <div class="alert {$theme.cbax_variant_info_styling} is--rounded is--variant">
                    <div class="alert--icon">
                        <i class="icon--element {$theme.cbax_variant_info_icon}"></i>
                    </div>
                    <div class="alert--content">{s namespace="frontend/detail/buy" name="DetailBuyVariantInfo"}Bitte wählen Sie eine Variante aus{/s}</div>
                    </div>
                {/if}
            {/if}
        {/if}
    {/if}
    
    {$smarty.block.parent}

{/block}