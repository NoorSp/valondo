{extends file="parent:frontend/checkout/ajax_add_article.tpl"}

{* Article Name *}
{block name='checkout_ajax_add_information_name'}
    <div class="article--name">
        <ul class="list--name list--unstyled">
            <li class="entry--name">
                <a class="link--name" href="{$detailLink}" title="{$sArticle.articlename|escape}">
                    {$sArticle.articlename|escape|truncate:35}
                </a>
            </li>
            {if $sArticle.articleConfigurator}
            	{foreach $sArticle.articleConfigurator as $config}
				<li class="content--article-configurator-entry">
                    <strong class="entry--label">{$config.configuratorGroup}: </strong> <span class="entry--content">{$config.configuratorOption}</span>
                </li>
                {/foreach}
            {/if}
            <li class="entry--ordernumber">{s name="AjaxAddLabelOrdernumber"}{/s}: {$sArticle.ordernumber}</li>
        </ul>
    </div>
{/block}