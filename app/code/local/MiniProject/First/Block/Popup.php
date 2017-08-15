<?php
//My First Comment
class MiniProject_First_Block_Popup extends Mage_Core_Block_Template
{

    public function popupBlock()
    {
        if(Mage::getSingleton('customer/session')->isLoggedIn())
        {
         //   $customer = Mage::getSingleton('customer/session');
            $customerData = Mage::getSingleton('customer/session')->getCustomer();
            return $customerData->getName();
        }

   // $name = $this->escapeHtml( $this->escapeHtml($this->_getSession()->getCustomer()->getEntityTypeId());
    }
    public function setLogIn()
    {
        if(Mage::getSingleton('customer/session')->isLoggedIn())
        {

            Mage::getSingleton('core/session')->setLoginCustomer(1);
        }
    }

    public function getLogIn()
    {
     return Mage::getSingleton('core/session')->getLoginCustomer();
    }
}