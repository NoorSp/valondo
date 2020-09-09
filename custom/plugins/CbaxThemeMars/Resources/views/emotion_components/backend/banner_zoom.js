//{block name="emotion_components/backend/banner_zoom"}
Ext.define('Shopware.apps.Emotion.view.components.BannerZoom', {

	extend: 'Shopware.apps.Emotion.view.components.Base',

	alias: 'widget.emotion-components-banner-zoom',

	basePath: '',

	initComponent: function () {
		var me = this;

		me.callParent(arguments);

		// me.linkTargetField = me.getForm().findField('linkTarget');
		// Ext.apply(me.linkTargetField, {
		// 	queryMode: 'local',
		// 	valueField: 'value',
		// 	displayField: 'label',
		// 	store: Ext.create('Ext.data.Store', {
		// 		fields: ['value', 'label'],
		// 		data : [
		// 			{ 'value': '_top', 'label': 'Gleiches Fenster' },
		// 			{ 'value': '_blank', 'label': 'Neues Fenster' }
		// 		]
		// 	})
		// });

		me.zoomField = me.getForm().findField('zoom');
		Ext.apply(me.zoomField, {
			allowDecimals: false,
			maxValue: 150,
			minValue: 100
		});

		me.durationField = me.getForm().findField('duration');
		Ext.apply(me.durationField, {
			maxValue: 1,
			minValue: 0,
			step: .1
		});

		me.mediaSelection = me.down('mediaselectionfield');
		me.mediaSelection.on('selectMedia', me.onSelectMedia, me);
		me.mediaSelection.albumId = -3;

		me.bannerFile = me.getForm().findField('file');
		if(me.bannerFile && me.bannerFile.value && me.bannerFile.value.length) {
			me.onSelectMedia('', me.bannerFile.value);
		}

		me.bannerPositionField = me.getForm().findField('bannerPosition');
	},

	onSelectMedia: function(element, media) {
		var me = this;

		me.selectedMedia = Ext.isArray(media) ? media[0] : media;

		if(!me.previewFieldset) {
			me.previewFieldset = me.createPreviewImage(media);
			me.add(me.previewFieldset);
		} else {
			me.previewImage.update({ src: me.basePath + (Ext.isArray(media) ? media[0].get('path') : media) });
		}
	},

	createPreviewImage: function(media) {
		var me = this;

		me.previewImage = Ext.create('Ext.container.Container', {
			tpl: me.getPreviewImageTemplate(),
			data: {
				src: me.basePath + (Ext.isArray(media) ? media[0].get('path') : media)
			},
			listeners: {
				'afterrender': me.registerPreviewPositionEvents.bind(me)
			}
		});

		return Ext.create('Ext.form.FieldSet', {
			title: 'Vorschaubild',
			items: [ me.previewImage ]
		});
	},

	registerPreviewPositionEvents: function() {
		var me = this,
			el = me.previewImage.getEl();

		el.on('click', function(event, target) {
			var $target = Ext.get(target),
				position = $target.getAttribute('data-position');

			Ext.each(el.dom.querySelectorAll('.preview-image--col'), function() {
				this.classList.remove('is--active');
			});
			$target.addCls('is--active');

			me.bannerPositionField.setValue(position);
		}, me, { delegate: '.preview-image--col' });

		if(me.bannerPositionField) {
			var val = me.bannerPositionField.getValue();

			Ext.each(el.dom.querySelectorAll('.preview-image--col'), function() {
				this.classList.remove('is--active');
			});

			el.dom.querySelector('.preview-image--col[data-position="' + val + '"]').classList.add('is--active');
		}
	},

	getPreviewImageTemplate: function() {
		return new Ext.Template(
			'<div class="preview-image--container">',
			'<img class="preview-image--media" src="[src]" alt="Preview Banner">',

			'<div class="preview-image--grid">',
			'<div class="preview-image--row">',
			'<div class="preview-image--col" data-position="top left">&nbsp;</div>',
			'<div class="preview-image--col" data-position="top center">&nbsp;</div>',
			'<div class="preview-image--col" data-position="top right">&nbsp;</div>',
			'</div>',

			'<div class="preview-image--row">',
			'<div class="preview-image--col" data-position="center left">&nbsp;</div>',
			'<div class="preview-image--col is--active" data-position="center">&nbsp;</div>',
			'<div class="preview-image--col" data-position="center right">&nbsp;</div>',
			'</div>',

			'<div class="preview-image--row">',
			'<div class="preview-image--col" data-position="bottom left">&nbsp;</div>',
			'<div class="preview-image--col" data-position="bottom center">&nbsp;</div>',
			'<div class="preview-image--col" data-position="bottom right">&nbsp;</div>',
			'</div>',
			'</div>',
			'</div>'
		);
	}
});
//{/block}