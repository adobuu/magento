<?php

class Mini_Project_Block_Adminhtml_Distributor_Order extends Mage_Adminhtml_Block_Widget_Grid_Container
{
    public function __construct()
    {
        $this->_blockGroup = 'mini_project';
        $this->_controller = 'adminhtml_distributor_order';
        $this->_headerText = Mage::helper('mini_project')->__('Distributor');


        parent::__construct();
        $this->_removeButton('add');
    }
}