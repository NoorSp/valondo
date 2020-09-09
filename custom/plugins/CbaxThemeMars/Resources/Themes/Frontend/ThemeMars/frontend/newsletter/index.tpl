{extends file="parent:frontend/newsletter/index.tpl"}

{* Error messages *}
{block name="frontend_newsletter_error_messages"}
    {if $sStatus.code}
        <div class="newsletter--error-messages">
            {if $sStatus.code==3}
                {include file="frontend/_includes/messages.tpl" type='success' content=$sStatus.message}
            {elseif $sStatus.code==5}
                {include file="frontend/_includes/messages.tpl" type='error' content=$sStatus.message}
            {elseif $sStatus.code==2}
                {include file="frontend/_includes/messages.tpl" type='warning' content=$sStatus.message}
            {elseif $sStatus.code != 0}
                {include file="frontend/_includes/messages.tpl" type='error' content=$sStatus.message}
            {/if}
        </div>
    {/if}
{/block}

{* Required fields hint *}
{block name="frontend_newsletter_form_required"}

    {$smarty.block.parent}

    {if $theme.cbax_privacy_newsletter}
        <div class="privacy-enhancement"{if $theme.cbax_privacy_modal_show} data-content="" data-modalbox="true" data-targetselector="a" data-mode="ajax"{/if}>
            {if $theme.cbax_privacy_newsletter == 'withCheckbox'}
                <input name="privacyenhancement" id="privacyenhancement" required="required" aria-required="true" value="1" class="chkbox is--required has--error" type="checkbox">
            {/if}
            <label for="privacyenhancement" class="chklabel">{s namespace='frontend/index/index' name="PrivacyEnhancement"}Die  <a title="Datenschutz-Bestimmungen" href="{url controller=custom sCustom=7}" style="text-decoration:underline">Datenschutz-Bestimmungen</a> habe ich zur Kenntnis genommen{/s}</label>
        </div>
    {/if}
{/block}