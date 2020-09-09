{extends file="parent:frontend/listing/manufacturer.tpl"}

{* Breadcrumb *}
{block name="frontend_index_start"}
    {$smarty.block.parent}
    {if !$CbaxSupplierModified}
		{$sBreadcrumb[] = [
		'name' => {$manufacturer->getName()|escape},
		'link'=> {url controller='listing' action='manufacturer' sSupplier=$manufacturer->getId()}
		]}
    {/if}
{/block}