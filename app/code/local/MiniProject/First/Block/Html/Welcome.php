<?php

class MiniProject_First_Block_Html_Welcome extends Mage_Page_Block_Html_Welcome
{
    protected function _toHtml()
    {
        if (empty($this->_data['welcome'])) {
            if (Mage::isInstalled() && $this->_getSession()->isLoggedIn()) {



            //    $helper = Mage::helper('customer/customer')->getEntityID();
       $current_id = $this->escapeHtml( $this->escapeHtml($this->_getSession()->getCustomer()->getEntityTypeId()));

                $customerModel= Mage::getModel('customer/customer');
                $customer = $customerModel->load($current_id);
                $count= 0;

                $cName = explode(' ',$customer->getFirstname());
                $names = "";
                foreach($cName as $name)
                {

                    $names .= substr($name, 0, 1).".";

                }

                $customer_fname = $names;

                $customer_lname =  $customer->getLastname();
                $customer_entityID = $customer->getEntityId();
                $welcome_name = $customer_entityID . " " . $customer_lname . ", " . $customer_fname;


                $this->_data['welcome'] = $this->__('Welcome, %s!', $welcome_name);//$this->escapeHtml($this->_getSession()->getCustomer()->getName()));
            } else {
                $this->_data['welcome'] = Mage::getStoreConfig('design/header/welcome');
            }
        }

        return $this->_data['welcome'];
    }
    public function getValues()
    {

    }
}