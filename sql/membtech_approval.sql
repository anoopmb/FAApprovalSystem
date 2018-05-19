
ALTER TABLE `0_users` ADD `allow_direct_posting` tinyint(1) NOT NULL DEFAULT '0';
ALTER TABLE `0_gl_trans` ADD `user_id` int(11) DEFAULT NULL AFTER `person_id`;
ALTER TABLE `0_gl_trans` ADD `status` tinyint(1) NOT NULL DEFAULT '0' AFTER `user_id`;
ALTER TABLE `0_audit_trail` ADD `status` tinyint(1) NOT NULL DEFAULT '0' AFTER `user`;

DROP TABLE IF EXISTS `0_gl_approvals`;

CREATE TABLE `0_gl_approvals` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` smallint(6) NOT NULL DEFAULT '0',
  `type_no` int(11) NOT NULL DEFAULT '0',
  `tran_date` date NOT NULL DEFAULT '0000-00-00',
  `memo_` varchar(200) NOT NULL DEFAULT '',
  `user_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB ;










