{extends file="parent:frontend/tellafriend/index.tpl"}

{* Notice that all fields which contains a star symbole needs to be filled out *}
{block name='frontend_tellafriend_captcha_notice'}

    {$smarty.block.parent}
    
    {if $theme.cbax_privacy_article_recommendation}
        <div class="privacy-enhancement"{if $theme.cbax_privacy_modal_show} data-content="" data-modalbox="true" data-targetselector="a" data-mode="ajax"{/if}>
        	{if $theme.cbax_privacy_article_recommendation == 'withCheckbox'}
            	<input name="privacyenhancement" id="privacyenhancement" required="required" aria-required="true" value="1" class="chkbox is--required has--error" type="checkbox">
            {/if}
            <label for="privacyenhancement" class="chklabel">{s namespace='frontend/index/index' name="PrivacyEnhancement"}Die  <a title="Datenschutz-Bestimmungen" href="{url controller=custom sCustom=7}" style="text-decoration:underline">Datenschutz-Bestimmungen</a> habe ich zur Kenntnis genommen{/s}</label>
        </div>
    {/if}
{/block}