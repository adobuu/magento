<?php

class Mini_Project_Block_Adminhtml_Event_Edit extends Mage_Adminhtml_Block_Widget_Form_Container
{
    public function __construct()
    {

        parent::__construct();
        $this->_objectId = 'event_id';
        $this->_blockGroup = 'mini_project';
        $this->_controller = 'adminhtml_event';


        $this->_updateButton('save','label', Mage::helper('project')->__('Save'));
        $this->_updateButton('delete','label', Mage::helper('project')->__('Delete'));
        $this->_addButton('saveandcontinue', array(
            'label' => Mage::helper('adminhtml')->__('Save and Continue Edit'),
            'onclick' => 'saveAndContinueEdit()',
            'class' => 'save'
            ),-100);

    }

    public function getHeaderText()
    {
        return Mage::helper('project')->__('Distributor');
    }
    // public function __construct()
    // {
    //     parent::construct();
    //     $this->_objectId = 'event_id';
    //     $this->_blockGroup = 'mini_project';
    //     $this->_controller = 'adminhtml_event';

    //     // $this->_updateButton('save','label', Mage::helper('project')->__('Save'));
    //     // $this->_updateButton('delete','label', Mage::helper('project')->__('Delete'));
    //     // $this->_addButton('saveandcontinue', array(
    //     //     'label' => Mage::helper('adminhtml')->__('Save and Continue Edit'),
    //     //     'onclick' => 'saveAndContinueEdit()',
    //     //     'class' => 'save'
    //     //     ),-100);
    // }

    // public function getHeaderText()
    // {
    //     return Mage::helper('project')->__('My Form Container');
    // }

}