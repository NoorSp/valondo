{block name="widgets_emotion_components_banner_zoom"}
    <div class="emotion--banner banner-zoom"
         data-coverImage="true"
         data-width="{$Data.width}"
         data-height="{$Data.height}"
         data-zoom="{$Data.zoomMars}"
         data-duration="{$Data.durationMars}">

        {block name="widget_emotion_component_banner_zoom_inner"}
            <div class="banner--content {$Data.bannerPosition}">

                {block name="widget_emotion_component_banner_zoom_image"}

					{if $Data.thumbnails}
						{$baseSource = $Data.thumbnails[0].source}
						
                        {foreach $element.viewports as $viewport}
                            {$cols = ($viewport.endCol - $viewport.startCol) + 1}
                            {$elementSize = $cols * $cellWidth}
                            {$size = "{$elementSize}vw"}

                            {if $breakpoints[$viewport.alias]}

                                {if $viewport.alias === 'xl' && !$emotionFullscreen}
                                    {$size = "calc({$elementSize / 100} * {$baseWidth}px)"}
                                {/if}

                                {$size = "(min-width: {$breakpoints[$viewport.alias]}) {$size}"}
                            {/if}

                            {$itemSize = "{$size}{if $itemSize}, {$itemSize}{/if}"}
                        {/foreach}
                        
						{foreach $Data.thumbnails as $image}
							{$srcSet = "{if $image@index !== 0}{$srcSet}, {/if}{$image.source} {$image.maxWidth}w"}

							{if $image.retinaSource}
								{$srcSetRetina = "{if $image@index !== 0}{$srcSetRetina}, {/if}{$image.retinaSource} {$image.maxWidth}w"}
							{/if}
						{/foreach}
					{else}
						{$baseSource = $Data.source}
					{/if}

                    <picture>
						{if $srcSetRetina}<source sizes="{$itemSize}" srcset="{$srcSetRetina}" media="(min-resolution: 192dpi)" />{/if}
						{if $srcSet}<source sizes="{$itemSize}" srcset="{$srcSet}" />{/if}
                        <img src="{$baseSource}"
                         	class="banner--image"
                         	{if $srcSet}sizes="{$itemSize}" srcset="{$srcSet}"{/if}
                         	{if $Data.title}alt="{$Data.title|escape}" {/if}/>
                    </picture>
                {/block}

                {block name="widget_emotion_component_banner_zoom_link"}
                    {if $Data.link}
                        <a href="{$Data.link}" class="banner--link"
						{if $Data.title}title="{$Data.title|escape}"{/if}
						{if $Data.linkTarget} target="{$Data.linkTarget}"{/if}></a>
                    {/if}
                {/block}
            </div>
        {/block}
    </div>
{/block}