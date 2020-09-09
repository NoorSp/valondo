{* Copyright in the footer *}
{block name='frontend_index_footer_copyright'}
	<div class="footer--bottom-content">

        {* Vat info *}
		{block name='frontend_index_footer_vatinfo'}
            <div class="footer--vat-info">
                <p class="vat-info--text">
                    {if $sOutputNet}
                        {s name='FooterInfoExcludeVat' namespace="frontend/index/footer"}{/s}
                    {else}
                        {s name='FooterInfoIncludeVat' namespace="frontend/index/footer"}{/s}
                    {/if}
                </p>
            </div>
		{/block}

        {* Shopware footer *}
        {block name="frontend_index_shopware_footer"}
        	<div class="footer--realized">
            	{s namespace="frontend/index/fotter_bottom" name='coolbax'}Realisiert von <a href="http://www.coolbax.de" target="_blank">coolbax.de</a>{/s}
            </div>
		{/block}
        
	</div>
{/block}
