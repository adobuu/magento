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
            $this->getLayout()->createBlock('mini_project/adminhtml_event_create')
        );

        return $this->renderLayout();
    }
    /*
     * INDEX BUTTON
     * */
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

           $eventId = $this->getRequest()->getParam('entity_id');
      //  var_dump($eventId);
          $eventModel = Mage::getModel('project/test')->load($eventId);
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

        $eventId = $this->getRequest()->getParam('entity_id');
        //  var_dump($eventId);
        $eventModel = Mage::getModel('project/test')->load($eventId);
        // var_dump($eventModel);


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