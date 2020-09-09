{extends file="parent:frontend/index/header.tpl"}

{* Meta-Tags *}
{block name='frontend_index_header_meta_tags'}

    {$smarty.block.parent}
    
    {if $theme.cbax_verification_google}
        <meta name="google-site-verification" content="{$theme.cbax_verification_google}" />
    {/if}
    {if $theme.cbax_verification_bing}
        <meta name="msvalidate.01" content="{$theme.cbax_verification_bing}" />
    {/if}
    {if $theme.cbax_verification_alexa}
        <meta name="alexaVerifyID" content="{$theme.cbax_verification_alexa}" />
    {/if}
    {if $theme.cbax_verification_pinterest}
        <meta name="p:domain_verify" content="{$theme.cbax_verification_pinterest}" />
    {/if}
{/block}

{block name="frontend_index_header_css_screen"}
    {$smarty.block.parent}
    {if $theme.mars_background_image}
        <style type="text/css">
            @media only screen and (min-width: 768px) {
                body.mars-background-image {
                    background-image:url("{$theme.mars_background_image}") !important;
                }
            }
        </style>
    {/if}
{/block}