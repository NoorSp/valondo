{namespace name="frontend/index/menu_footer"}

{block name="frontend_index_footer_template_three_column_one"}
    <div class="footer--column template-three-column-one is--first block column-50">
    	{block name="frontend_index_footer_template_three_column_one_headline"}
        	<div class="column--headline">{s name="FooterTemplateThreeColumnOneHead"}Template 3 Spalte 1 Headline{/s}</div>
    	{/block}

		{block name="frontend_index_footer_template_three_column_one_content"}
            <div class="column--content">
                <p class="column--desc">{s name="FooterTemplateThreeColumnOneContent"}Template 3 Spalte 1 Content{/s}</p>
            </div>
        {/block}
    </div>
{/block}

{block name="frontend_index_footer_template_three_column_two"}
    <div class="footer--column template-three-column-two block">
    	{block name="frontend_index_footer_template_three_column_two_headline"}
        	<div class="column--headline">{s name="FooterTemplateThreeColumnTwoHead"}Template 3 Spalte 2 Headline{/s}</div>
    	{/block}

		{block name="frontend_index_footer_template_three_column_two_content"}
            <div class="column--content">
                <p class="column--desc">{s name="FooterTemplateThreeColumnTwoContent"}Template 3 Spalte 2 Content{/s}</p>
            </div>
        {/block}
    </div>
{/block}

{block name="frontend_index_footer_template_three_column_three"}
    <div class="footer--column template-three-column-three is--last block">
    	{block name="frontend_index_footer_template_three_column_three_headline"}
        	<div class="column--headline">{s name="FooterTemplateThreeColumnThreeHead"}Template 3 Spalte 3 Headline{/s}</div>
    	{/block}

		{block name="frontend_index_footer_template_three_column_three_content"}
            <div class="column--content">
                <p class="column--desc">{s name="FooterTemplateThreeColumnThreeContent"}Template 3 Spalte 3 Content{/s}</p>
            </div>
        {/block}
    </div>
{/block}