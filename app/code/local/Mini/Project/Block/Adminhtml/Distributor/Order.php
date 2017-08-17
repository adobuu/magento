<?php

class Mini_Project_Block_Adminhtml_Distributor_Order extends Mage_Adminhtml_Block_Widget_Grid_Container
{
    public function __construct()
    {
        $this->_blockGroup = 'mini_project';
        $this->_controller = 'adminhtml_distributor_order';
        $this->_headerText = Mage::helper('mini_project')->__('Distributor');


        parent::__construct();

                $this->_addButton('adddistributor', array(
            'label' => Mage::helper('adminhtml')->__('Add Distributor'),
            'onclick' => "setLocation('{$this->getUrl('/adminhtml_event/index')}')",
            'class' => 'save'
            ),-100);
        $this->_removeButton('add');


    }
}