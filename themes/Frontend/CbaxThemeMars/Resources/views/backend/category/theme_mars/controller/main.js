//{block name="backend/category/controller/main"}
//{$smarty.block.parent}
Ext.define('Shopware.apps.ThemeMars.Category.controller.Main', {
	override: 'Shopware.apps.Category.controller.Main',

	onSaveSettings: function (button, event) {
		var me = this,
			window = me.getMainWindow(),
			form = window.formPanel.getForm(),

			categoryModel = form.getRecord();

		if (form.isValid()) {
			Ext.Ajax.request({
				method: 'POST',
				url: '{url controller=AttributeData action=saveData}',
				params: {
					_foreignKey: categoryModel.getId(),
					_table: 's_categories_attributes',
					__attribute_cbax_theme_mars_hide_in_sidebar: form.findField('cbaxThemeMarsHideInSidebar').getSubmitValue(),
					__attribute_cbax_theme_mars_hide_topseller: form.findField('cbaxThemeMarsHideTopseller').getSubmitValue()
				}
			});
		}

		me.callParent(arguments);
	}

});
//{/block}