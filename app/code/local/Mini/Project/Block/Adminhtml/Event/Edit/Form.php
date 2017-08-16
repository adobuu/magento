<?php

class Mini_Project_Block_Adminhtml_Event_Edit_Form extends Mage_Adminhtml_Block_Widget_Form
{
     protected function _prepareForm()
     {
         /*
         * SETUP FORM
         * */
         $form = new Varien_Data_Form(
             array(
                 'id' => 'edit_form',
                 'action' => $this->getData('action'),
                 'method' => 'post')

         );
        // var_dump($this->getData('action'));
         $fieldset = $form->addFieldset('base_fieldset', array('legend' => Mage::helper('project')->__('General Information'), 'class' => 'fieldset-wide'));

        /*
         * DISTRIBUTOR NAME
         * */
         $fieldset->addField('distributor_name', 'text', array(
                 'name' => 'distributor_name',
                 'label' => 'Distributor Name',
                 'title' => 'distributor_name',
                 'required' => true

             ));
         /*
         * DISTRIBUTOR STREET ADDRESS 1
         * */
         $fieldset->addField('distributor_street_address1', 'text', array(
             'name' => 'distributor_street_address1',
             'label' => 'Street Address',
             'title' => 'distributor_street_address1',
             'required' => true

         ));
         /*
         * DISTRIBUTOR STREET ADDRESS 2
         * */
         $fieldset->addField('distributor_street_address2', 'text', array(
             'name' => 'distributor_street_address2',
             'label' => 'Street Address (Optional)',
             'title' => 'distributor_street_address2',
             'required' => false

         ));
         /*
         * DISTRIBUTOR STATE
         * */
         $fieldset->addField('distributor_state', 'text', array(
             'name' => 'distributor_state',
             'label' => 'State',
             'title' => 'distributor_state',
             'required' => true

         ));
         /*
         * DISTRIBUTOR COUNTRY
         * */
         $fieldset->addField('distributor_country', 'text', array(
             'name' => 'distributor_country',
             'label' => 'Country',
             'title' => 'distributor_state',
             'required' => true

         ));
         /*
         * DISTRIBUTOR TELEPHONE
         * */
         $fieldset->addField('distributor_telephone', 'text', array(
             'name' => 'distributor_telephone',
             'label' => 'Telephone',
             'title' => 'distributor_telephone',
             'required' => false

         ));
         /*
         * DISTRIBUTOR STATUS
         * */
         $fieldset->addField('distributor_status', 'select', array(
             'label'     => 'distributor_status',
             'class'     => 'required-entry',
             'required'  => true,
             'name'      => 'distributor_status',
             'onclick' => "",
             'onchange' => "",
             'value'  => '1',
             'values' => array('-1'=>'Please Select..','1' => 'Active','2' => 'Inactive'),
             'disabled' => false,
             'readonly' => false,
            // 'after_element_html' => '<small>*specify if active or inactive</small>',
             'tabindex' => 1

         ));
         /*
         * SETUP FORM CONTAINER
         * */
         $form->setUseContainer(true);
         $this->setForm($form);
         return parent::_prepareForm();
     }


}