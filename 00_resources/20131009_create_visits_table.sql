/*
MySQL Data Transfer
Source Host: localhost
Source Database: diabetes
Target Host: localhost
Target Database: diabetes
Date: 2013/10/9 7:21:59
Because of the foreign key, this sql should be run before the patients_create sql
*/

SET FOREIGN_KEY_CHECKS=0;
DROP TABLE IF EXISTS `visits`;
-- ----------------------------
-- Table structure for visits
-- ----------------------------
CREATE TABLE `visits` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `patient_id` char(36) collate utf8_unicode_ci NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `patient_id` (`patient_id`),
  CONSTRAINT `visits_ibfk_1` FOREIGN KEY (`patient_id`) REFERENCES `patients` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records 
-- ----------------------------
