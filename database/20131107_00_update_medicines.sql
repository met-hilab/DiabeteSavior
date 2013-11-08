/*
MySQL Data Transfer
Source Host: localhost
Source Database: cs673
Target Host: localhost
Target Database: cs673
Date: 2013/11/7 23:02:06
*/
USE `cs673`;

SET FOREIGN_KEY_CHECKS=0;
-- ----------------------------
-- Table structure for medicines
-- ----------------------------
CREATE TABLE `medicines` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `medicine_name` varchar(255) collate utf8_unicode_ci NOT NULL,
  `min_dose` float NOT NULL,
  `max_dose` float NOT NULL,
  `metric` char(8) collate utf8_unicode_ci NOT NULL,
  `hypo` enum('1','2','3','4') collate utf8_unicode_ci default NULL,
  `weight` enum('1','2','3','4') collate utf8_unicode_ci default NULL,
  `renal_gu` enum('1','2','3','4') collate utf8_unicode_ci default NULL,
  `gi_sx` enum('1','2','3','4') collate utf8_unicode_ci default NULL,
  `chf` enum('1','2','3','4') collate utf8_unicode_ci default NULL,
  `cvd` enum('1','2','3','4') collate utf8_unicode_ci default NULL,
  `bone` enum('1','2','3','4') collate utf8_unicode_ci default NULL,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `medicine_name` (`medicine_name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records 
-- ----------------------------
