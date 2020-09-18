{extends file="parent:frontend/index/index.tpl"}

        {block name='frontend_index_content_main'}
            {if isset($sCategoryContent) && $sCategoryContent.id}
                <div class="valondo--cat--heading" style="background-image: url('{$sCategoryContent.media.source}')">
                    <div class="container">
                        <div class="valondo--headline--text-details">
                            {if $sCategoryContent.cmsheadline}
                                <h1 class="hero--headline panel--title">{$sCategoryContent.cmsheadline}</h1>
                            {/if}
                            {if $sCategoryContent.cmstext}
                                <div class="hero--headline panel--desc">{$sCategoryContent.cmstext}</div>
                            {/if}
                        </div>

                        {*<div class="valondo--headline--img-detail">*}
                            {*{if $sCategoryContent.media.source}*}
                                {*<img class="hero--headline panel--cat-img" src="{$sCategoryContent.media.source}" />*}
                            {*{/if}*}
                        {*</div>*}
                    </div>

                </div>
            {/if}

            <section class="content-main container block-group">

                {if !isset($sCategoryContent) && !$sCategoryContent.id}
                {* Breadcrumb *}
                {block name='frontend_index_breadcrumb'}
                    {if count($sBreadcrumb)}
                        <nav class="content--breadcrumb block">
                            {block name='frontend_index_breadcrumb_inner'}
                                {include file='frontend/index/breadcrumb.tpl'}
                            {/block}
                        </nav>
                    {/if}
                {/block}
                {/if}


                {* Content top container *}
                {if isset($sCategoryContent) && $sCategoryContent.id}
                    {$Category = 'categoryPage' }
                {/if}

                <div class="content-main--inner {$Category}">
                    {* Sidebar left *}
                    {block name='frontend_index_content_left'}
                        {include file='frontend/index/sidebar.tpl'}
                    {/block}
                    {* Main content *}
                    {block name='frontend_index_content_wrapper'}
                        <div class="content--wrapper">
                            {block name='frontend_index_content'}{/block}
                        </div>
                    {/block}



                    {* Sidebar right *}
                    {block name='frontend_index_content_right'}

                    {/block}

                    {* Last seen products *}
                    {block name='frontend_index_left_last_articles'}
                        {if $sLastArticlesShow && !$isEmotionLandingPage}
                            {* Last seen products *}
                            <div class="last-seen-products is--hidden" data-last-seen-products="true">
                                <div class="last-seen-products--title">
                                    {s namespace="frontend/plugins/index/viewlast" name='WidgetsRecentlyViewedHeadline'}{/s}
                                </div>
                                <div class="last-seen-products--slider product-slider" data-product-slider="true">
                                    <div class="last-seen-products--container product-slider--container"></div>
                                </div>
                            </div>
                        {/if}
                    {/block}
                </div>
            </section>

            {if ({controllerName|lower} == 'listing') && ({controllerAction|lower} == 'index') }
            <div class="valondo--cat--slider">
                <div class="cat--slider-title">
                    <p>Das könnte Sie auch Interessieren:</p>
                </div>
                <div class="container">
                    {if isset($sCategoryContent) && $sCategoryContent.id}
                        <div class="owl-carousel owl-theme">
                            {foreach $sCategories as $category}
                                {*<pre>{$category.attribute|@print_r}</pre>*}
                                <div class="item">
                                    <div class="valondo--cat-item">
                                        <img src="{$category.attribute['icon']}" alt="">
                                        <a class="navigation--link"
                                           href="{$category.link}"
                                           data-categoryId="{$category.id}"
                                           data-fetchUrl="{url module=widgets controller=listing action=getCategory categoryId={$category.id}}"
                                           title="{$category.description|escape}">
                                            {$category.description}
                                        </a>
                                    </div>
                                </div>
                            {/foreach}
                        </div>
                    {/if}
                </div>
            </div>
            {/if}
        {/block}
