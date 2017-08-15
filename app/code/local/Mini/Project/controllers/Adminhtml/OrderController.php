<?php

class Mini_Project_Adminhtml_OrderController extends Mage_Adminhtml_Controller_Action
{
    public function indexAction()
    {
        $this->_title($this->__('Sales'))->_title($this->__('Orders Mini'));
        $this->loadLayout();
        $this->_setActiveMenu('sales/sales');
        $this->_addContent($this->getLayout()->createBlock('mini_project/adminhtml_sales_order'));
        $this->renderLayout();
    }

    public function gridAction()
    {
        $this->loadLayout();
        $this->getResponse()->setBody(
            $this->getLayout()->createBlock('mini_project/adminhtml_sales_order_grid')->toHtml()
        );
    }

    public function exportMiniCsvAction()
    {
        $fileName = 'orders_mini.csv';
        $grid = $this->getLayout()->createBlock('mini_project/adminhtml_sales_order_grid');
        $this->_prepareDownloadResponse($fileName, $grid->getCsvFile());
    }

    public function exportMiniExcelAction()
    {
        $fileName = 'orders_mini.xml';
        $grid = $this->getLayout()->createBlock('mini_project/adminhtml_sales_order_grid');
        $this->_prepareDownloadResponse($fileName, $grid->getExcelFile($fileName));
    }
}