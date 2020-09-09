{extends file="parent:widgets/emotion/index.tpl"}

{block name="widgets/emotion/index/config"}

	{$smarty.block.parent}
    
	{if $baseWidth != 900}
		{$baseWidth = 1340}
	{/if}
{/block}