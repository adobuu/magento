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


}