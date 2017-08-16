<?php

class Mini_Project_Block_Adminhtml_Event_Edit_Form extends Mage_Adminhtml_Block_Widget_Form
{
     protected function _prepareForm()
     {
         $form = new Varien_Data_Form(
             array('id' => 'edit_form', 'action' => $this->getData('action'), 'method' => 'post')
         );
         $fieldset = $form->addFieldset('base_fieldset', array('legend' => Mage::helper('project')->__('General Information'), 'class' => 'fieldset-wide'));


         $fieldset->addField('name', 'text', array(
                 'name' => 'name',
                 'label' => 'rtgtrg',
                 'title' => 'rtgrtgrt',
                 'required' => true

             )

         );

     }


}