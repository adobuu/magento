<?php
$installer = $this;
$installer->startSetup();
$installer->run(" DROP TABLE IF EXISTS {$this->getTable('distributor')};
 
CREATE TABLE {$this->getTable('distributor')} (
  `entity_id` int(11) unsigned NOT NULL auto_increment,
  `distributor_name` VARCHAR(20) NULL default '',
  `distributor_street_address_1` VARCHAR(50) NOT NULL default '',
  `distributor_street_address_2` VARCHAR(50) NOT NULL default '',
  `distributor_state` VARCHAR(15) NOT NULL default '',
  `distributor_country` VARCHAR(50) NOT NULL default '',
  `distributor_telephone` VARCHAR(20) NOT NULL default '',
  `distributor_status` TINYINT(1) NOT NULL default '0',
   PRIMARY KEY (`entity_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
");
$installer->endSetup();
