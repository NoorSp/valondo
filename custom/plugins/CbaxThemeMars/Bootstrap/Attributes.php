<?php

namespace CbaxThemeMars\Bootstrap;

use Shopware\Bundle\AttributeBundle\Service\CrudService;
use Shopware\Bundle\AttributeBundle\Service\TypeMapping;
use Shopware\Components\Model\ModelManager;

class Attributes
{
    /**
     * @var CrudService
     */
    private $crudService;

    /**
     * @var ModelManager
     */
    private $modelManager;

    /**
     * @param CrudService  $crudService
     * @param ModelManager $modelManager
     */
    public function __construct(CrudService $crudService, ModelManager $modelManager)
    {
        $this->crudService = $crudService;
        $this->modelManager = $modelManager;
    }

	/**
	 * Attribute data types
	 *
	 * Unified type 		SQL type 		Backend view
	 * *********************************************************
	 * string 				VARCHAR(500) 	Ext.form.field.Text
	 * text 				TEXT 			Ext.form.field.TextArea
	 * html 				MEDIUMTEXT 		Shopware.form.field.TinyMCE
	 * integer 				INT(11) 		Ext.form.field.Number
	 * float 				DOUBLE 			Ext.form.field.Number
	 * boolean 				INT(1) 			Ext.form.field.Checkbox
	 * date 				DATE 			Shopware.apps.Base.view.element.Date
	 * datetime 			DATETIME 		Shopware.apps.Base.view.element.DateTime
	 * combobox 			MEDIUMTEXT 		Ext.form.field.ComboBox
	 * single_selection 	VARCHAR(500) 	Shopware.form.field.SingleSelection
	 * multi_selection 		MEDIUMTEXT 		Shopware.form.field.Grid
	 */
    public function createAttributes()
    {
        $this->crudService->update('s_categories_attributes', 'cbax_theme_mars_hide_in_sidebar', TypeMapping::TYPE_INTEGER);
		$this->crudService->update('s_categories_attributes', 'cbax_theme_mars_hide_topseller', TypeMapping::TYPE_INTEGER);

        $this->modelManager->generateAttributeModels(['s_categories_attributes']);
    }

    public function removeAttributes()
    {
        $this->crudService->delete('s_categories_attributes', 'cbax_theme_mars_hide_in_sidebar');
		$this->crudService->delete('s_categories_attributes', 'cbax_theme_mars_hide_topseller');

        $this->modelManager->generateAttributeModels(['s_categories_attributes']);
    }
}