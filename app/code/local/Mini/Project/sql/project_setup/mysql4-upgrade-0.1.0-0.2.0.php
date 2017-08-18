
<?php
$installer = Mage::getResourceModel('catalog/setup', 'catalog_setup');
$installer->startSetup();

$attribute = array(
    'type'     => 'varchar',
    'label'    => 'Distributor',
    'input'    => 'multiselect',
    'global'   => Mage_Catalog_Model_Resource_Eav_Attribute::SCOPE_GLOBAL,
    'visible'  => true,
    'required' => false,
    'user_defined' => true,
    'default'  => "",
    'visible_on_front' => false,
    'used_in_product_listing' => true,
    'used_for_sort_by' => false,
    'group'    => "General",
    'backend'  => 'eav/entity_attribute_backend_array',
    'source' => 'project/resource_distributor_source'
);


$installer->addAttribute('catalog_product', 'distributor_code', $attribute);
$installer->endSetup();