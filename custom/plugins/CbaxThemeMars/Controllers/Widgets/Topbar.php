<?php
class Shopware_Controllers_Widgets_Topbar extends Enlight_Controller_Action
{
	/**
     * @var sBasket
     */
    public $module;

    /**
     * Reference to Shopware session object (Shopware()->Session)
     *
     * @var Zend_Session_Namespace
     */
    protected $session;
	
	/**
     * Pre dispatch method
     */
    public function preDispatch()
    {
        $this->module = Shopware()->Modules()->Basket();
        $this->session = Shopware()->Session();
    }
	
	public function topbarAction()
    {
        $view = $this->View();
        $view->sBasketQuantity = isset($this->session->sBasketQuantity) ? $this->session->sBasketQuantity : 0;
        $view->sBasketAmount = isset($this->session->sBasketAmount) ? $this->session->sBasketAmount : 0;
        $view->sNotesQuantity = isset($this->session->sNotesQuantity) ? $this->session->sNotesQuantity : $this->module->sCountNotes();
        $view->sUserLoggedIn = !empty(Shopware()->Session()->sUserId);
    }
}
?>