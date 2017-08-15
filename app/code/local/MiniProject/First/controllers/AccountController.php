<?php
require_once Mage::getModuleDir('controllers',"Mage_Customer").DS.'AccountController.php';
class MiniProject_First_AccountController extends Mage_Customer_AccountController
{
    public function logoutSuccessAction()
    {
        Mage::getSingleton('core/session')->unsLoginCustomer();
        $this->loadLayout();
        $this->renderLayout();
    }
}