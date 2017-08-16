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
  `distributor_status` VARCHAR(15) NOT NULL default '',
   PRIMARY KEY (`entity_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO {$this->getTable('distributor')} (`distributor_name`, `distributor_street_address_1`, `distributor_state`,`distributor_country`,`distributor_status`) 
VALUES
('Hadrian Onate', 'Block 4 Lot 6, Subdivision 1', 'Silay City', 'Philippines', 'Active'),
('Mark Jabay', 'Block 2 Lot 24, Subdivision 2', 'Bacolod City', 'Philippines', 'Active'),
('John Doe', 'Block 5 Lot 2, Subdivision 3', 'Talisay City', 'Philippines', 'Active');

");
$installer->endSetup();
