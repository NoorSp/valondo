{extends file="parent:frontend/account/profile.tpl"}

{block name="frontend_account_profile_profile_form"}
    <div class="account--welcome">
        <h1 class="panel--title">{s name="ProfileHeadline"}{/s}</h1>
    </div>
    
    {$smarty.block.parent}
{/block}

{block name="frontend_account_profile_profile_title"}
    <div class="panel--title is--underline">{s name="NameHeadline"}Vorname und Nachname{/s}</div>
{/block}