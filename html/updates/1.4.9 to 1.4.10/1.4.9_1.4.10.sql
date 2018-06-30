ALTER TABLE `user` ADD `wallet` VARCHAR(1000) NULL DEFAULT NULL ;
CREATE TABLE IF NOT EXISTS `wallet_load` (
`wallet_load_id` int(11) NOT NULL,
  `user` varchar(100) DEFAULT NULL,
  `amount` varchar(1000) DEFAULT NULL,
  `method` varchar(100) DEFAULT NULL,
  `status` longtext,
  `timestamp` varchar(100) DEFAULT NULL,
  `payment_details` longtext
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=latin1;
ALTER TABLE `wallet_load` ADD PRIMARY KEY(`wallet_load_id`);
ALTER TABLE `wallet_load` CHANGE `wallet_load_id` `wallet_load_id` INT(11) NOT NULL AUTO_INCREMENT;
UPDATE `general_settings` SET `value` = '1.4.10' WHERE `type` = 'version';