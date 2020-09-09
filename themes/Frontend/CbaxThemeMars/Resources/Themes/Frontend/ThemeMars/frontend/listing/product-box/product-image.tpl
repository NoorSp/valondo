{extends file="parent:frontend/listing/product-box/product-image.tpl"}

{block name='frontend_listing_box_article_image_picture_element'}
	{if $sArticle.attributes.cbax_theme_mars}
		{$cbaxMarsImages = $sArticle.attributes.cbax_theme_mars->get('images')}
	{else}
		{$cbaxMarsImages = $sArticle.cbax_theme_mars}
	{/if}

	{if $theme.cbax_previewimagechange_active && $theme.cbax_previewimagechange_show != 'emotion'}
		{if $cbaxMarsImages[1] && $theme.cbax_previewimagechange_effect == 'change'}
			<img class="cbax--preview-image--1" srcset="{$cbaxMarsImages[0].thumbnails[0].sourceSet}"
				 alt="{$desc}"
				 title="{$desc|truncate:25:""}"/>
			<img class="cbax--preview-image--2" srcset="{$cbaxMarsImages[1].thumbnails[0].sourceSet}"
				 alt="{$desc}"
				 title="{$desc|truncate:25:""}"/>
		{elseif $theme.cbax_previewimagechange_effect == 'zoom'}
			<img class="image--zoom"
				 srcset="{$sArticle.image.thumbnails[0].sourceSet}"
				 alt="{$desc}"
				 title="{$desc|truncate:160}" />
		{else}
			{$smarty.block.parent}
		{/if}
	{else}
		{$smarty.block.parent}
	{/if}
{/block}