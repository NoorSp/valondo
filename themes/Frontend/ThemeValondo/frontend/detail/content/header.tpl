{extends file="parent:frontend/detail/content/header.tpl"}

{block name='frontend_detail_index_header'}
    <header class="product--header">
        {block name='frontend_detail_index_header_inner'}
            <div class="product--info">
                {block name='frontend_detail_index_product_info'}

                    {* Product name *}
                    {block name='frontend_detail_index_name'}
                        <h1 class="product--title" itemprop="name">
                            {$sArticle.articleName}
                        </h1>
                    {/block}

                    {* Product - Supplier information *}
                    {block name='frontend_detail_supplier_info'}
                        {if $sArticle.supplierImg}
                            <div class="product--supplier">
                                <a href="{url controller='listing' action='manufacturer' sSupplier=$sArticle.supplierID}"
                                   title="{"{s name="DetailDescriptionLinkInformation" namespace="frontend/detail/description"}{/s}"|escape}"
                                   class="product--supplier-link">
                                    <img src="{$sArticle.supplierImg}" alt="{$sArticle.supplierName|escape}">
                                </a>
                            </div>
                        {/if}
                    {/block}

                    {* Product rating *}
                    {block name="frontend_detail_comments_overview"}
                    {/block}
                {/block}
            </div>
        {/block}
    </header>
{/block}
