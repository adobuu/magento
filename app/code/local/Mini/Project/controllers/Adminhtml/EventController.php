<?php

class Mini_Project_Adminhtml_EventController extends Mage_Adminhtml_Controller_Action
{
    public function indexAction()
    {
        $this->loadLayout();
      //  $this->setActiveMenu('project');
        $this->_addContent(
            $this->getLayout()->createBlock('mini_project/adminhtml_event_edit')
        );

        return $this->renderLayout();
    }

    public function saveAction()
    {

           $eventId = $this->getRequest()->getParam('entity_id');
      //  var_dump($eventId);
          $eventModel = Mage::getModel('project/test');//->load($eventId);
       // var_dump($eventModel);

        if ($data = $this->getRequest()->getPost())
        {
            try
            {
                $eventModel->addData($data)->save();

                Mage::getSingleton('adminhtml/session')->addSuccess(
                    $this->__("Your event has been saved!")
                );
            }
            catch(Exception $e)
            {
                Mage::getSingleton('adminhtml/session')->addError($e->getMessage());
            }
        }

        $this->_redirect('*/adminhtml_event/index');
    }

    // public function indexAction()
    // {
    // 	$this->loadLayout();
    // 	$this->_addContent(
    // 		$this->getLayout()->createBlock('mini_project/adminhtml_event_edit')
    // 		);
    // 	return $this->renderLayout();
    // }
}