<?php

class Mini_Project_Adminhtml_EventController extends Mage_Adminhtml_Controller_Action
{
    public function indexAction()
    {
        $this->loadLayout();
        $this->_addContent(
            $this->getLayout()->createBlock('project/adminhtml_event_edit')
        );

        return $this->renderLayout();
    }
}