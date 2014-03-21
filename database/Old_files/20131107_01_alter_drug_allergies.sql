/*
MySQL Data Transfer
Source Host: localhost
Source Database: cs673
Target Host: localhost
Target Database: cs673
Date: 2013/11/7 23:10:15
*/
USE `cs673`;

SET FOREIGN_KEY_CHECKS=0;

DROP TABLE IF EXISTS `drug_allergies`;
-- ----------------------------
-- Table structure for drug_allergies
-- ----------------------------
CREATE TABLE `drug_allergies` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `patient_id` char(36) collate utf8_unicode_ci NOT NULL,
  `met` enum('yes','unkown','no') collate utf8_unicode_ci NOT NULL,
  `dpp_4i` enum('yes','unkown','no') collate utf8_unicode_ci NOT NULL,
  `glp_1ra` enum('yes','unkown','no') collate utf8_unicode_ci NOT NULL,
  `tzd` enum('yes','unkown','no') collate utf8_unicode_ci NOT NULL,
  `agi` enum('yes','unkown','no') collate utf8_unicode_ci NOT NULL,
  `colsvl` enum('yes','unkown','no') collate utf8_unicode_ci NOT NULL,
  `bcr_or` enum('yes','unkown','no') collate utf8_unicode_ci NOT NULL,
  `su_gln` enum('yes','unkown','no') collate utf8_unicode_ci NOT NULL,
  `insulin` enum('yes','unkown','no') collate utf8_unicode_ci NOT NULL,
  `sglt_2` enum('yes','unkown','no') collate utf8_unicode_ci NOT NULL,
  `praml` enum('yes','unkown','no') collate utf8_unicode_ci NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `patient_id` (`patient_id`),
  CONSTRAINT `drug_allergies_ibfk_1` FOREIGN KEY (`patient_id`) REFERENCES `patients` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records 
-- ----------------------------
INSERT INTO `drug_allergies` VALUES ('1', '2013-11-08 01:54:21', '2013-11-08 01:54:21', '01', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no');
