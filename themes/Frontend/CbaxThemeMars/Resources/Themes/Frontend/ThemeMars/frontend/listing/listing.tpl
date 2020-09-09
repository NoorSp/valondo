{extends file="parent:frontend/listing/listing.tpl"}

{block name="frontend_listing_listing_container"}

	{$smarty.block.parent}
    
	{if !$sArticles|@count}
    	<div class="alert is--warning is--rounded">
            <div class="alert--icon">
                <i class="icon--element icon--warning"></i>
            </div>
            <div class="alert--content">
                {s name="ListingArticleNoFound"}Leider wurden keine Artikel gefunden!{/s}
            </div>
        </div>
    {/if}
{/block}