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

    protected function _prepareCollection()
    {
        $collection = Mage::getResourceModel('sales/order_collection')
//            ->join(array('a' => 'sales/order_address'), 'main_table.entity_id = a.parent_id AND a.address_type != \'billing\'', array(
//                'city'       => 'city',
//                'country_id' => 'country_id'
//            ))
//            ->join(array('c' => 'customer/customer_group'), 'main_table.customer_group_id = c.customer_group_id', array(
//                'customer_group_code' => 'customer_group_code'
//            ))
//            ->addExpressionFieldToSelect(
//                'fullname',
//                'CONCAT({{customer_firstname}}, \' \', {{customer_lastname}})',
//                array('customer_firstname' => 'main_table.customer_firstname', 'customer_lastname' => 'main_table.customer_lastname'))
//            ->addExpressionFieldToSelect(
//                'products',
//                '(SELECT GROUP_CONCAT(\' \', x.name)
//                    FROM sales_flat_order_item x
//                    WHERE {{entity_id}} = x.order_id
//                        AND x.product_type != \'configurable\')',
//                array('entity_id' => 'main_table.entity_id')
//            )
        ;

        $this->setCollection($collection);
        parent::_prepareCollection();
        return $this;
    }

    protected function _prepareColumns()
    {
        $helper = Mage::helper('mini_project');
        $currency = (string) Mage::getStoreConfig(Mage_Directory_Model_Currency::XML_PATH_CURRENCY_BASE);

        $this->addColumn('entity_id', array(
            'header' => $helper->__('Distributor #'),
            'index'  => 'increment_id'
        ));

//        $this->addColumn('purchased_on', array(
//            'header' => $helper->__('Purchased On'),
//            'type'   => 'datetime',
//            'index'  => 'created_at'
//        ));

        $this->addColumn('distributor_name', array(
            'header'       => $helper->__('Distributor Name'),
            'index'        => 'name',
            'filter_index' => 'CONCAT(customer_firstname, \' \', customer_lastname)'//'(SELECT GROUP_CONCAT(\' \', x.name) FROM sales_flat_order_item x WHERE main_table.entity_id = x.order_id AND x.product_type != \'configurable\')'
        ));

        $this->addColumn('distributor_street_address_1', array(
            'header'       => $helper->__('Street Address'),
            'index'        => 'streetaddress'
            // 'filter_index' => 'CONCAT(customer_firstname, \' \', customer_lastname)'
        ));

        $this->addColumn('distributor_street_address_2', array(
            'header' => $helper->__('Street Address 2(Optional)'),
            'index'        => 'streetaddress2'
        ));

        $this->addColumn('distributor_state', array(
            'header'   => $helper->__('State'),
            'index'    => 'state_id',
            //  'renderer' => 'adminhtml/widget_grid_column_renderer_country'
        ));

        $this->addColumn('distributor_country', array(
            'header' => $helper->__('Country'),
            'index'  => 'country'
        ));

        $this->addColumn('distributor_telephone', array(
            'header'        => $helper->__('Telephone #'),
            'index'         => 'grand_total'
            //    'type'          => 'currency',
            //    'currency_code' => $currency
        ));

        $this->addColumn('distributor_status', array(
            'header' => $helper->__('Distributor Status'),
            'index'  => 'status',
            'type'    => 'options',
            'options' => Mage::getSingleton('sales/order_config')->getStatuses()
        ));

        $this->addColumn('order_status', array(
            'header'  => $helper->__('Status'),
            'index'   => 'status',
            'type'    => 'options',
            'options' => Mage::getSingleton('sales/order_config')->getStatuses(),
        ));

        $this->addExportType('*/*/exportMiniCsv', $helper->__('CSV'));
        $this->addExportType('*/*/exportMiniExcel', $helper->__('Excel XML'));

        return parent::_prepareColumns();
    }

    public function getGridUrl()
    {
        return $this->getUrl('*/*/grid', array('_current'=>true));
    }
}