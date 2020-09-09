{extends file="parent:frontend/detail/config_upprice.tpl"}

{* Configurator drop down *}
{block name='frontend_detail_group_selection'}
	<div class="select-field">
		<select name="group[{$sConfigurator.groupID}]"{if $theme.ajaxVariantSwitch} data-ajax-select-variants="true"{else} data-auto-submit="true"{/if}>
			{foreach $sConfigurator.values as $configValue}
				{if !{config name=hideNoInstock} || ({config name=hideNoInstock} && $configValue.selectable)}
					<option{if !$configValue.selectable} disabled{/if}{if $configValue.selected} selected="selected"{/if} value="{$configValue.optionID}">
						{$configValue.optionname}{if $configValue.upprice} {if $configValue.upprice > 0}{/if}{/if}
						{if !$configValue.selectable}{s name="DetailConfigValueNotAvailable"} (derzeit nicht lieferbar){/s}{/if}
					</option>
				{/if}
			{/foreach}
		</select>
	</div>

{/block}