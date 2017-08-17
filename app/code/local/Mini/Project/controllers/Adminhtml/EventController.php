<?php

class Mini_Project_Adminhtml_EventController extends Mage_Adminhtml_Controller_Action
{
    /*
     * INDEX
     * */
    public function indexAction()
    {
        $this->loadLayout();
      //  $this->setActiveMenu('project');
        $this->_addContent(
            $this->getLayout()->createBlock('mini_project/adminhtml_event_edit')
        );

        return $this->renderLayout();
    }
    public function newAction()
    {
        $this->_forward('edit');
    }
    /*
     * EDIT
     * */
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
//    public function editAction()
//    {
//        $this->loadLayout();
//        //  $this->setActiveMenu('project');
//        $this->_addContent(
//            $this->getLayout()->createBlock('mini_project/adminhtml_event_edit')
//        );
//
//        return $this->renderLayout();
//    }
    /*
     * SAVE BUTTON
     * */
    public function saveAction()
    {

           $eventId = $this->getRequest()->getParam('event_id');
          $eventModel = Mage::getModel('project/test')->load($eventId);
 //       var_dump($eventModel);

        if ($data = $this->getRequest()->getPost())
        {
            //var_dump($data);
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
                Mage::getSingleton('adminhtml/session')->setEventFormData($data);
                $this->redicrect('*/*/edit', array('_current' => true));
            }
        }

        $this->_redirect('*/adminhtml_event/index');
    }
    /*
     * DELETE BUTTON
     * */
    public function deleteAction()
    {

        $eventId = $this->getRequest()->getParam('event_id');
        $eventModel = Mage::getModel('project/test')->load($eventId);
            try
            {
                $eventModel->delete();
                Mage::getSingleton('adminhtml/session')->addSuccess(
                    $this->__("Your event has been deleted!")
                );
            }
            catch(Exception $e)
            {
                Mage::getSingleton('adminhtml/session')->addError($e->getMessage());
                $this->redicrect('*/*/edit', array('_current' => true));
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