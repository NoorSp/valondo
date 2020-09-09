{namespace name="frontend/index/menu_footer"}

{block name="frontend_index_footer_template_seven_column_one"}
    <div class="footer--column template-seven-column-one is--first block column-75">
    	{block name="frontend_index_footer_template_seven_column_one_headline"}
        	<div class="column--headline">{s name="FooterTemplateSevenColumnOneHead"}Template 7 Spalte 1 Headline{/s}</div>
    	{/block}

		{block name="frontend_index_footer_template_seven_column_one_content"}
            <div class="column--content">
                <p class="column--desc">{s name="FooterTemplateSevenColumnOneContent"}Template 7 Spalte 1 Content{/s}</p>
            </div>
        {/block}
    </div>
{/block}

{block name="frontend_index_footer_template_seven_column_two"}
    <div class="footer--column template-seven-column-two is--last block">
    	{block name="frontend_index_footer_template_seven_column_two_headline"}
        	<div class="column--headline">{s name="FooterTemplateSevenColumnTwoHead"}Template 7 Spalte 2 Headline{/s}</div>
    	{/block}

		{block name="frontend_index_footer_template_seven_column_two_content"}
            <div class="column--content">
                <p class="column--desc">{s name="FooterTemplateSevenColumnTwoContent"}Template 7 Spalte 2 Content{/s}</p>
            </div>
        {/block}
    </div>
{/block}