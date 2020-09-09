//{block name="backend/category/view/tabs/settings"}
//{$smarty.block.parent}
Ext.define('Shopware.apps.ThemeMars.Category.view.category.tabs.Settings', {
	override: 'Shopware.apps.Category.view.category.tabs.Settings',

	getDefaultFormField: function () {
		var me = this,
			defaultFormField = me.callParent(arguments);

		defaultFormField.add(me.getThemeMarsFields());

		return defaultFormField;
	},

	getThemeMarsFields: function () {
		var me = this;

		me.cbaxThemeMarsHideInSidebar = Ext.create('Ext.form.field.Checkbox', {
			boxLabel: '{s namespace="backend/plugins/theme_mars/view/settings" name=labelHideInSidebar}NICHT in linker Navigation anzeigen (Theme Mars){/s}',
			labelWidth: 180,
			name: 'cbaxThemeMarsHideInSidebar',
			uncheckedValue: 0,
			inputValue: 1
		});

		me.cbaxThemeMarsHideTopseller = Ext.create('Ext.form.field.Checkbox', {
			boxLabel: '{s namespace="backend/plugins/theme_mars/view/settings" name=labelHideTopseller}Topseller ausblenden (Theme Mars){/s}',
			labelWidth: 180,
			name: 'cbaxThemeMarsHideTopseller',
			uncheckedValue: 0,
			inputValue: 1
		});

		return [
			me.cbaxThemeMarsHideInSidebar,
			me.cbaxThemeMarsHideTopseller
		];
	}
});
//{/block}