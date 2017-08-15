<?php

class Mini_Project_Block_Adminhtml_Sales_Order extends Mage_Adminhtml_Block_Widget_Grid_Container
{
    public function __construct()
    {
        $this->_blockGroup = 'mini_project';
        $this->_controller = 'adminhtml_sales_order';
        $this->_headerText = Mage::helper('mini_orders')->__('Orders - Mini');

        parent::__construct();
        $this->_removeButton('add');
    }
}