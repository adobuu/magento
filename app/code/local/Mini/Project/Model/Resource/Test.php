<?php
class Mini_Project_Model_Resource_Test extends Mage_Core_Model_Mysql4_Abstract
{
    public function _construct()
    {
        $this->_init('project/distributor', 'entity_id');
    }
}