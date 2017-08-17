<?php
class Mini_Project_Adminhtml_DistributorController extends Mage_Adminhtml_Controller_Action
{
    public function indexAction()
    {
        $this->_title($this->__('Distributor'))->_title($this->__('Project Mini'));
        $this->loadLayout();
      //  $this->_setActiveMenu('mini_project');
        $this->_addContent($this->getLayout()->createBlock('mini_project/adminhtml_distributor_order'));
    //    $this->_addContent($this->getLayout()->createBlock('mini_project/adminhtml_event_edit'));


        return $this->renderLayout();
    }
    public function gridAction()
    {
        $this->loadLayout();
        $this->getResponse()->setBody(
            $this->getLayout()->createBlock('mini_project/adminhtml_distributor_order_grid')->toHtml()
        );
    }

    public function editAction()
    {
        if($eventId = $this->getRequest()->getParam('event_id')) {
            Mage::register('current_event', Mage::getModel('project/test')->load($eventId));
        }

        $this->loadLayout();
       // $this->_setActiveMenu('project/test');
        $this->_addContent(
          $this->getLayout()->createBlock('mini_project/adminhtml_event_edit')
        );
        return $this->renderLayout();
    }

}