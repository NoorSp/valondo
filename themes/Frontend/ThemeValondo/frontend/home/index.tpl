{extends file="parent:frontend/home/index.tpl"}

{* Promotion *}
{block name='frontend_home_index_promotions'}
    {if $hasEmotion}
        <div class="content--emotions new-home-wrap">
            {foreach $emotions as $emotion}
                {if $hasEscapedFragment}
                    {if 0|in_array:$emotion.devicesArray}
                        <div class="emotion--fragment">
                            {action module=widgets controller=emotion action=index emotionId=$emotion.id controllerName=$Controller}
                        </div>
                    {/if}
                {else}
                    <div class="emotion--wrapper{if $emotion.fullscreen} emotion--fullscreen{/if}"
                         data-controllerUrl="{url module=widgets controller=emotion action=index emotionId=$emotion.id controllerName=$Controller}"
                         data-availableDevices="{$emotion.devices}">
                    </div>
                {/if}
            {/foreach}
        </div>
    {/if}
{/block}