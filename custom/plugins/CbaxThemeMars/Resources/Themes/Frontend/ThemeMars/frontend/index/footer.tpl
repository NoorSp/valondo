{extends file="parent:frontend/index/footer.tpl"}

{* Footer menu *}
{block name='frontend_index_footer_menu'}
	{if $theme.cbax_footer_template_one}
		<div class="footer--columns {$theme.cbax_footer_template_one} block-group">
			{include file='frontend/index/'|cat:{$theme.cbax_footer_template_one}|cat:'.tpl'}
		</div>
	{/if}
	{if $theme.cbax_footer_template_two}
		<div class="footer--columns {$theme.cbax_footer_template_two} block-group">
			{include file='frontend/index/'|cat:{$theme.cbax_footer_template_two}|cat:'.tpl'}
		</div>
	{/if}
	{if $theme.cbax_footer_template_three}
		<div class="footer--columns {$theme.cbax_footer_template_three} block-group">
			{include file='frontend/index/'|cat:{$theme.cbax_footer_template_three}|cat:'.tpl'}
		</div>
	{/if}
	{if $theme.cbax_footer_template_four}
		<div class="footer--columns {$theme.cbax_footer_template_four} block-group">
			{include file='frontend/index/'|cat:{$theme.cbax_footer_template_four}|cat:'.tpl'}
		</div>
	{/if}
{/block}

{* Copyright in the footer *}
{block name='frontend_index_footer_copyright'}{/block}
