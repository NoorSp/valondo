{extends file="parent:frontend/detail/tabs/description.tpl"}

{namespace name="frontend/detail/description"}

{* Further links title *}
{block name='frontend_detail_description_links_title'}
    <div class="content--title link-to-title">
        {s name="ArticleTipMoreInformation"}{/s} "{$sArticle.articleName}"
    </div>
{/block}

{* Links list *}
{block name='frontend_detail_description_links_list'}
    <ul class="content--list list--unstyled info-links-list">
        {block name='frontend_detail_actions_contact'}
            {if $sInquiry}
                <li class="list--entry">
                    <a href="{$sInquiry}" rel="nofollow" class="content--link link--contact" title="{"{s name='DetailLinkContact' namespace="frontend/detail/actions"}{/s}"|escape}">
                        <i class="icon--help"></i> {s name="DetailLinkContact" namespace="frontend/detail/actions"}{/s}
                    </a>
                </li>
            {/if}
        {/block}

        {foreach $sArticle.sLinks as $information}
            {if $information.supplierSearch}

                {* Vendor landing page link *}
                {block name='frontend_detail_description_links_supplier'}
                    <li class="list--entry">
                        <a href="{url controller='listing' action='manufacturer' sSupplier=$sArticle.supplierID}"
                           target="{$information.target}"
                           class="content--link link--supplier"
                           title="{"{s name="DetailDescriptionLinkInformation"}{/s}"|escape}">

                            <i class="icon--info2"></i> {s name="DetailDescriptionLinkInformation"}{/s}
                        </a>
                    </li>
                {/block}
            {else}

                {* Links which will be added throught the administration *}
                {block name='frontend_detail_description_links_link'}
                    <li class="list--entry">
                        <a href="{$information.link}"
                           target="{if $information.target}{$information.target}{else}_blank{/if}"
                           class="content--link link--further-links"
                           title="{$information.description|escapeHtml}">
                            <i class="icon--arrow-right"></i> {$information.description|escapeHtml}
                        </a>
                    </li>
                {/block}
            {/if}
        {/foreach}
    </ul>
{/block}