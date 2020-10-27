{extends file="parent:frontend/index/sidebar.tpl"}

{block name='frontend_index_left_categories'}
    {include file="frontend/index/sidebar-promotion-above.tpl"}
    {$smarty.block.parent}

    <!-- Contact info -->
    <div class="sidebar--contact-details">
        <div>
            <a class="logo--link" href="{url controller='index'}" title="{"{config name=shopName}"|escapeHtml} - {"{s name='IndexLinkDefault' namespace="frontend/index/index"}{/s}"|escape}">
                <picture>
                    <source srcset="{link file=$theme.desktopLogo}" media="(min-width: 78.75em)">
                    <source srcset="{link file=$theme.tabletLandscapeLogo}" media="(min-width: 64em)">
                    <source srcset="{link file=$theme.tabletLogo}" media="(min-width: 48em)">
                    <img srcset="{link file=$theme.mobileLogo}" alt="{"{config name=shopName}"|escapeHtml} - {"{s name='IndexLinkDefault' namespace="frontend/index/index"}{/s}"|escape}" />
                </picture>
            </a>
            <a class="valondo--tel" href="tel:03023329341"><i class="icon--phone"></i>030 - 233 293 41</a>
            <p>Mo-Fr, 09:00 - 16:00 Uhr</p>
            <a class="valondo--mail" href="mailto:info@valondo.com">info@valondo.com</a>
        </div>
    </div>
{/block}

{block name='frontend_index_left_menu'}

    {$smarty.block.parent}

    {if !$theme.cbax_filter_active || ($theme.cbax_filter_active && $facets|count < 1)}
        {include file="frontend/index/sidebar-promotion-below.tpl"}
    {elseif $Controller != 'listing'}
        {include file="frontend/index/sidebar-promotion-below.tpl"}
    {/if}
{/block}

