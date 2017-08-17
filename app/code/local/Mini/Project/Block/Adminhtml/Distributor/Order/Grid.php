<?php

class Mini_Project_Block_Adminhtml_Distributor_Order_Grid extends Mage_Adminhtml_Block_Widget_Grid
{
    public function __construct()
    {
        parent::__construct();
        $this->setId('mini_project_grid');
        $this->setDefaultSort('increment_id');
        $this->setDefaultDir('DESC');
        $this->setSaveParametersInSession(true);
        $this->setUseAjax(true);
    }
    public function getRowUrl($item)
    {
        return $this->getUrl('*/adminhtml_event/edit',array('event_id' => $item->getId()));
    }

    protected function _prepareCollection()
    {
        $collection = Mage::getResourceModel('project/test_collection')

        ;

        $this->setCollection($collection);
        parent::_prepareCollection();
        return $this;
    }

    protected function _prepareColumns()
    {
        $helper = Mage::helper('project');
       // $currency = (string) Mage::getStoreConfig(Mage_Directory_Model_Currency::XML_PATH_CURRENCY_BASE);

//        $this->addColumn(
//            'entity_id',
//            array(
//            'header' => $helper->__('Distributor #'),
//            'index'  => 'entity_id'
//        ));
        $this->addColumn(
            'distributor_name',
            array(
                'header' => Mage::helper('project')->__('Distributor Name'),
                'index'  => 'distributor_name',

            ));
        $this->addColumn(
            'distributor_street_address_1',
            array(
                'header' => Mage::helper('project')->__('Steet 1'),
                'index'  => 'distributor_street_address_1',

            ));
//        $this->addColumn(
//            'distributor_street_address_2',
//            array(
//                'header' => Mage::helper('project')->__('Steet 2 (Optional)'),
//                'index'  => 'distributor_street_address_2',
//
//            ));
//        $this->addColumn(
//            'distributor_state',
//            array(
//                'header' => Mage::helper('project')->__('State'),
//                'index'  => 'distributor_state',
//
//            ));
//        $this->addColumn(
//            'distributor_country',
//            array(
//                'header' => Mage::helper('project')->__('Country'),
//                'index'  => 'distributor_country',
//
//            ));
//        $this->addColumn(
//            'distributor_telephone',
//            array(
//                'header' => Mage::helper('project')->__('Telephone'),
//                'index'  => 'distributor_telephone',
//
//            ));
        $this->addColumn(
            'distributor_status',
            array(
                'header' => Mage::helper('project')->__('Status'),
                'index'  => 'distributor_status',

            ));

        return parent::_prepareColumns();
    }

    public function getGridUrl()
    {
        return $this->getUrl('*/*/grid', array('_current'=>true));
    }
}