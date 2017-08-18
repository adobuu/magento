<?php

class Mini_Project_Model_Resource_Distributor_Source extends Mage_Eav_Model_Entity_Attribute_Source_Abstract
{
//    const MAIN = 1;
//    const OTHER = 2;


    public function getAllOptions()
    {
        $collection = Mage::getModel('project/test')
            ->getCollection();
        $collection->addFieldToSelect(array('entity_id','distributor_name'));
        $collection->load();
        $result = array();

        foreach($collection as $distributor)
        {
            $result[] = array(
                'value' =>  $distributor->getEntityId(),
                'label' =>  $distributor->getDistributorName()
            );
        }
        return $result;
    }



    public function toOptionArray()
    {
        return $this->getAllOptions();
    }

    public function getOptionText($value)
    {
        $options = $this->getAllOptions(false);
        foreach ($options as $item) {
            if ($item['value'] == $value) {
                return $item['label'];

            }
        }
        return false;
    }


//    static $_all_options_cache = null;
//    static $_label_to_value_cache = null;
//    public function getAllOptions()
//    {
//        if (is_null(Mini_Project_Model_Resource_Distributor_Source::$_all_options_cache)) {
//            $collection = Mage::getModel('project/test')->getCollection();
//            $collection->addFieldToSelect(array('entity_id', 'distributor_name'));
//            $collection->load();
//            $result = array();
//           $map_result = array();
//            foreach ($collection as $distributor) {
//                $result[] = array(
//                    'value' => $distributor->getId(),
//                    'label' => $distributor->getDistributorName()
//                );
//
//                $map_result[$distributor->getId()] = $distributor->getDistributorName();
//            }
//            Mini_Project_Model_Resource_Distributor_Source::$_all_options_cache = $result;
//            Mini_Project_Model_Resource_Distributor_Source::$_label_to_value_cache = $map_result;
//        }
//        return Mini_Project_Model_Resource_Distributor_Source::$_all_options_cache;
//    }

//    public function getOptionText($value)
//    {
//        if(is_null(Mini_Project_Model_Resource_Distributor_Source::$_label_to_value_cache))
//        {
//            $this->getAllOptions();
//        }
//        if(isset(Mini_Project_Model_Resource_Distributor_Source::$_label_to_value_cache[$value]))
//        {
//            return Mini_Project_Model_Resource_Distributor_Source::$_label_to_value_cache[$value];
//        }
//        return 'No Distributor Available';
//    }

//    public function getFlatColums()
//    {
//
//        $attributeCode = $this->getAttribute()->getAttributeCode();
//        $column = array(
//            'unsigned'  => false,
//            'default'   => null,
//            'extra'     => null
//        );
//        if (Mage::helper('core')->useDbCompatibleMode()) {
//            $column['type']     = 'INT';
//            $column['is_null']  = true;
//        } else {
//            $column['type']     = Varien_Db_Ddl_Table::TYPE_INTEGER;
//            $column['nullable'] = true;
//            $column['comment']  = $attributeCode . ' column';
//        }
//
//        return array($attributeCode => $column);
//    }
//    public function getFlatUpdateSelect($store)
//    {
//        return Mage::getResourceModel('project/test_collection')
//            ->getFlatUpdateSelect($this->getAttribute(), $store);
//    }



//    public function addValueSortToCollection($collection, $dir = 'asc')
//    {
//        $adminStore = Mage_Core_Model_App::ADMIN_STORE_ID;
//        $valueTable1 = $this->getAttribute()->getAttributeCode() . '_t1';
//        $valueTable2 = $this->getAttribute()->getAttributeCode() . '_t2';
//
//        $collection->getSelect()->joinLeft(
//            array($valueTable1 => $this->getAttribute()->getBackend()->getTable()),
//            "`e`.`entity_id`=`{$valueTable1}`.`entity_id`"
//            . " AND `{$valueTable1}`.`attribute_id`='{$this->getAttribute()->getId()}'"
//            . " AND `{$valueTable1}`.`store_id`='{$adminStore}'",
//            array()
//        );
//
//        if ($collection->getStoreId() != $adminStore) {
//            $collection->getSelect()->joinLeft(
//                array($valueTable2 => $this->getAttribute()->getBackend()->getTable()),
//                "`e`.`entity_id`=`{$valueTable2}`.`entity_id`"
//                . " AND `{$valueTable2}`.`attribute_id`='{$this->getAttribute()->getId()}'"
//                . " AND `{$valueTable2}`.`store_id`='{$collection->getStoreId()}'",
//                array()
//            );
//            $valueExpr = new Zend_Db_Expr("IF(`{$valueTable2}`.`value_id`>0, `{$valueTable2}`.`value`, `{$valueTable1}`.`value`)");
//
//        } else {
//            $valueExpr = new Zend_Db_Expr("`{$valueTable1}`.`value`");
//        }
//
//
//        $collection->getSelect()
//            ->order($valueExpr, $dir);
//
//        return $this;
//    }

//    public function getFlatColums()
//    {
//        $columns = array(
//            $this->getAttribute()->getAttributeCode() => array(
//                'type' => 'int',
//                'unsigned' => false,
//                'is_null' => true,
//                'default' => null,
//                'extra' => null
//            )
//        );
//        return $columns;
//    }
//
//

}