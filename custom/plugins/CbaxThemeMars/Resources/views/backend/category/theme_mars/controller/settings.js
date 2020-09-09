//{block name="backend/category/controller/settings"}
//{$smarty.block.parent}
Ext.define('Shopware.apps.ThemeMars.Category.controller.Settings', {
	override: 'Shopware.apps.Category.controller.Settings',

	onRecordLoaded: function (record) {
		var me = this,
			form = me.getSettingsForm();

		me.callParent(arguments);

		Ext.Ajax.request({
			url: '{url controller=AttributeData action=loadData}',
			params: {
				_foreignKey: record.getId(),
				_table: 's_categories_attributes'
			},
			success: function (responseData) {
				var response = Ext.JSON.decode(responseData.responseText);

				form.cbaxThemeMarsHideInSidebar.setValue(response.data['__attribute_cbax_theme_mars_hide_in_sidebar']);
				form.cbaxThemeMarsHideTopseller.setValue(response.data['__attribute_cbax_theme_mars_hide_topseller']);
			}
		});
	}

});
//{/block}