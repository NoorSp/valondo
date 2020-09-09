{extends file="parent:frontend/index/footer-navigation.tpl"}

{block name="frontend_index_footer_column_newsletter_form_submit"}

    {$smarty.block.parent}

    {if $theme.cbax_privacy_newsletter_fotter}
        <div class="privacy-enhancement-newsletter-footer"{if $theme.cbax_privacy_modal_show} data-content="" data-modalbox="true" data-targetselector="a" data-mode="ajax"{/if}>
            {if $theme.cbax_privacy_newsletter_fotter == 'withCheckbox'}
                <input name="privacyenhancement" id="privacyenhancement" required="required" aria-required="true" value="1" class="chkbox is--required has--error" type="checkbox">
            {/if}
            <label for="privacyenhancement" class="chklabel">{s namespace='frontend/index/index' name="PrivacyEnhancement"}Die  <a title="Datenschutz-Bestimmungen" href="{url controller=custom sCustom=7}" style="text-decoration:underline">Datenschutz-Bestimmungen</a> habe ich zur Kenntnis genommen{/s}</label>
        </div>
    {/if}
{/block}