{extends file="parent:frontend/detail/tabs.tpl"}

{* Tab navigation *}
{block name="frontend_detail_tabs_navigation"}
    <div class="tab-menu--product-inner">
        {$smarty.block.parent}
    </div>
{/block}

{* Description content *}
{block name="frontend_detail_tabs_content_description_description"}
    <div class="tab--content{if $sArticle.sVoteAverage.count && $theme.cbax_vote_active && !{config name=VoteDisable}} has--reviews{/if}">
        {$smarty.block.parent}
    </div>
{/block}