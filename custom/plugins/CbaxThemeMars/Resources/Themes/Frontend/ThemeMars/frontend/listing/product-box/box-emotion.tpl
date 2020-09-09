{extends file="parent:frontend/listing/product-box/box-emotion.tpl"}

{block name='frontend_listing_box_article_image_picture'}
	{if $sArticle.attributes.cbax_theme_mars}
		{$cbaxMarsImages = $sArticle.attributes.cbax_theme_mars->get('images')}
	{else}
		{$cbaxMarsImages = $sArticle.cbax_theme_mars}
	{/if}

	{if $theme.cbax_previewimagechange_active && $theme.cbax_previewimagechange_show != 'listing'}
		{if $cbaxMarsImages[0].thumbnails}

			{$baseSource = $cbaxMarsImages[0].thumbnails[0].source}

			{if $itemCols && $emotion.grid.cols && !$fixedImageSize}
				{$colSize = 100 / $emotion.grid.cols}
				{$itemSize = "{$itemCols * $colSize}vw"}
			{else}
				{$itemSize = "200px"}
			{/if}

			{foreach $cbaxMarsImages[0].thumbnails as $image}
				{$srcSet = "{if $image@index !== 0}{$srcSet}, {/if}{$image.source} {$image.maxWidth}w"}

				{if $image.retinaSource}
					{$srcSetRetina = "{if $image@index !== 0}{$srcSetRetina}, {/if}{$image.retinaSource} {$image.maxWidth}w"}
				{/if}
			{/foreach}
		{elseif $cbaxMarsImages[0].source}
			{$baseSource = $cbaxMarsImages[0].source}
		{else}
			{$baseSource = "{link file='frontend/_public/src/img/no-picture.jpg'}"}
		{/if}

		{$desc = $sArticle.articleName|escape}

		{if $cbaxMarsImages[0].description}
			{$desc = $cbaxMarsImages[0].description|escape}
		{/if}

		<picture>
			{if $srcSetRetina}<source sizes="(min-width: 48em) {$itemSize}, 100vw" srcset="{$srcSetRetina}" media="(min-resolution: 192dpi)" />{/if}
			{if $srcSet}<source sizes="(min-width: 48em) {$itemSize}, 100vw" srcset="{$srcSet}" />{/if}
			{if $cbaxMarsImages[1] && $theme.cbax_previewimagechange_effect == 'change'}
				<img class="cbax--preview-image--1" src="{$baseSource}" alt="{$desc}" title="{$desc|truncate:25:""}" />
			{elseif $theme.cbax_previewimagechange_effect == 'zoom'}
				<img class="image--zoom" src="{$sArticle.image.thumbnails[0].source}" alt="{$desc}" title="{$desc|truncate:160}" />
			{else}
				<img src="{$sArticle.image.thumbnails[0].source}" alt="{$desc|strip_tags|truncate:160}" />
			{/if}
		</picture>

		{if $cbaxMarsImages[1] && $theme.cbax_previewimagechange_effect == 'change'}
			{if $cbaxMarsImages[1].thumbnails}

				{$baseSource = $cbaxMarsImages[1].thumbnails[0].source}

				{if $itemCols && $emotion.grid.cols && !$fixedImageSize}
					{$colSize = 100 / $emotion.grid.cols}
					{$itemSize = "{$itemCols * $colSize}vw"}
				{else}
					{$itemSize = "200px"}
				{/if}

				{foreach $cbaxMarsImages[1].thumbnails as $image}
					{$srcSet = "{if $image@index !== 0}{$srcSet}, {/if}{$image.source} {$image.maxWidth}w"}

					{if $image.retinaSource}
						{$srcSetRetina = "{if $image@index !== 0}{$srcSetRetina}, {/if}{$image.retinaSource} {$image.maxWidth}w"}
					{/if}
				{/foreach}
			{elseif $cbaxMarsImages[1].source}
				{$baseSource = $cbaxMarsImages[1].source}
			{else}
				{$baseSource = "{link file='frontend/_public/src/img/no-picture.jpg'}"}
			{/if}

			{$desc = $sArticle.articleName|escape}

			{if $cbaxMarsImages[1].description}
				{$desc = $cbaxMarsImages[1].description|escape}
			{/if}
			<picture>
				{if $srcSetRetina}
					<source sizes="(min-width: 48em) {$itemSize}, 100vw" srcset="{$srcSetRetina}"
							media="(min-resolution: 192dpi)" />{/if}
				{if $srcSet}
					<source sizes="(min-width: 48em) {$itemSize}, 100vw" srcset="{$srcSet}" />{/if}
				<img class="cbax--preview-image--2" src="{$baseSource}" alt="{$desc}" title="{$desc|truncate:25:""}"/>
			</picture>
		{/if}
	{else}
		{$smarty.block.parent}
	{/if}
{/block}