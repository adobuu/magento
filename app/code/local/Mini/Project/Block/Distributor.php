<?php

class Mini_Project_Block_Distributor extends Mage_Core_Block_Template
{

  public function gridDistributorBlock($value)
{
    //  Product Details
    $productID = $value->getDistributorCode();
    $product = explode(",", $productID);

    foreach($product as $prods)
    {
        $collection = Mage::getModel('project/test')->load($prods);
        //       echo $collection->getEntityId() . " ";
        echo $collection->getDistributorName() . "<br/>";
    }


}
    public function distributorBlock()
    {

       //  Product Details
        $productID = Mage::registry('current_product')->getDistributorCode();
        $product = explode(",", $productID);

        foreach($product as $prods)
        {
            $collection = Mage::getModel('project/test')->load($prods);
     //       echo $collection->getEntityId() . " ";
            echo $collection->getDistributorName() . "<br/>";
        }


    }
}