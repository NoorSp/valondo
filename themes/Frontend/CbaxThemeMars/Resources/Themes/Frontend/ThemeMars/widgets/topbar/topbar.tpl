<div class="navigation--entry entry--notepad" role="menuitem">
	<a href="{url controller='note'}" title="{"{s namespace='frontend/index/checkout_actions' name='IndexLinkNotepad'}{/s}"|escape}">
        <i class="icon--heart"></i>
        <span class="note--display">
        	{s namespace='frontend/index/checkout_actions' name='IndexLinkNotepad'}{/s}
        </span>
        {if $sNotesQuantity > 0}
            <span class="badge notes--quantity">
                {$sNotesQuantity}
            </span>
        {/if}
    </a>
</div>