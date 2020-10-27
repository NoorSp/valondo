{extends file='parent:frontend/listing/text.tpl'}

{namespace name="frontend/listing/listing"}

{* Categorie headline *}
{block name="frontend_listing_text"}
    {if $sCategoryContent.cmsheadline || $sCategoryContent.cmstext}
            {* Headline *}
            {block name="frontend_listing_text_headline"}

            {/block}

            {* Category text *}
            {block name="frontend_listing_text_content"}
                    {if $sCategoryContent.cmstext}

                        {* Long description *}
                        {block name="frontend_listing_text_content_long"}

                        {/block}

                        {* Short description *}
                        {block name="frontend_listing_text_content_short"}

                        {/block}

                        {* Off Canvas Container *}
                        {block name="frontend_listing_text_content_offcanvas"}

                                {* Close Button *}
                                {block name="frontend_listing_text_content_offcanvas_close"}

                                {/block}
                                {* Off Canvas Content *}
                                {block name="frontend_listing_text_content_offcanvas_content"}

                                {/block}
                        {/block}
                    {/if}
            {/block}
    {/if}
{/block}
