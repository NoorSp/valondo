{extends file="parent:frontend/index/sidebar-categories.tpl"}

{* Maincategories left *}
{function name=categories level=0}
    <ul class="sidebar--navigation categories--navigation navigation--list{if !$level} is--drop-down{/if} is--level{$level}{if $level > 1} navigation--level-high{/if} is--rounded" role="menu">
        {* @deprecated The block "frontend_index_categories_left_ul" will be removed in further versions, please use "frontend_index_categories_left_before" *}
        {block name="frontend_index_categories_left_ul"}{/block}

        {block name="frontend_index_categories_left_before"}{/block}
        {foreach $categories as $category}
            {block name="frontend_index_categories_left_entry"}
                {if $theme.cbax_hide_sidebar_main_category}
                    {if $level == 0 and $category.flag==''}
                        {$classCategory = 'hide-sidebar-main-category'}
					{elseif $category.attribute.cbax_theme_mars_hide_in_sidebar}
						{$classCategory = 'hide-sidebar-main-category'}
                    {else}
                        {$classCategory = 'show-sidebar-main-category'}
                    {/if}
                {/if}
                <li class="navigation--entry{if $category.flag} is--active{/if}{if $category.subcategories} has--sub-categories{/if}{if $category.childrenCount} has--sub-children{/if} {$classCategory}" role="menuitem">
                    <a class="navigation--link{if $category.flag} is--active{/if}{if $category.subcategories} has--sub-categories{/if}{if $category.childrenCount} link--go-forward{/if}"
                       href="{$category.link}"
                       data-categoryId="{$category.id}"
                       data-fetchUrl="{url module=widgets controller=listing action=getCategory categoryId={$category.id}}"
                       title="{$category.description|escape}">
                        {$category.description}

                        {if $category.childrenCount}
                            <span class="is--icon-right">
                                <i class="icon--arrow-right"></i>
                            </span>
                        {/if}
                    </a>
                    {block name="frontend_index_categories_left_entry_subcategories"}
                        {if $category.subcategories}
                            {call name=categories categories=$category.subcategories level=$level+1}
                        {/if}
                    {/block}
                </li>
            {/block}
        {/foreach}
        {block name="frontend_index_categories_left_after"}{/block}
    </ul>
{/function}

{if $sCategories}
    {call name=categories categories=$sCategories}
{elseif $sMainCategories}
    {call name=categories categories=$sMainCategories}
{/if}