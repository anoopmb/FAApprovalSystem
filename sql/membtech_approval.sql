
ALTER TABLE `0_gl_trans` ADD `user_id` int(11) DEFAULT NULL AFTER `person_id` ;
ALTER TABLE `0_gl_trans` ADD `status` tinyint(1) NOT NULL DEFAULT '0' AFTER `user_id` ;

DROP TABLE IF EXISTS `0_gl_approvals`;

CREATE TABLE `0_gl_approvals` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` smallint(6) NOT NULL DEFAULT '0',
  `type_no` int(11) NOT NULL DEFAULT '0',
  `memo_` varchar(200) NOT NULL DEFAULT '',
  `user_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB ;