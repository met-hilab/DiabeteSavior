
/*
MySQL Data Transfer
Source Host: localhost
Source Database: diabetes
Target Host: localhost
Target Database: diabetes
Date: 2013/10/28
*/

DROP DATABASE IF EXISTS `cs673`;
CREATE DATABASE `cs673` DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
USE `cs673`;

SET FOREIGN_KEY_CHECKS=0;
-- ----------------------------
-- Table structure for users
-- ----------------------------
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `email` varchar(128) collate utf8_unicode_ci NOT NULL,
  `password` char(64) collate utf8_unicode_ci NOT NULL,
  `reset_token` char(64) collate utf8_unicode_ci default NULL,
  `username` varchar(45) collate utf8_unicode_ci default NULL,
  `openid` varchar(64) collate utf8_unicode_ci default NULL,
  `service` varchar(45) collate utf8_unicode_ci default NULL,
  `created` datetime default NULL,
  `modified` datetime default NULL,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  UNIQUE KEY `email_UNIQUE` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Table structure for patients
-- ----------------------------
CREATE TABLE `patients` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `patient_number` char(8) collate utf8_unicode_ci NOT NULL,
  `patient_firstname` varchar(255) collate utf8_unicode_ci NOT NULL,
  `patient_lastname` varchar(255) collate utf8_unicode_ci NOT NULL,
  `patient_middlename` varchar(255) collate utf8_unicode_ci default NULL,
  `dob` date NOT NULL,
  `picture` blob,
  `occupation` varchar(255) collate utf8_unicode_ci default NULL,
  `gender` enum('Male','Female') collate utf8_unicode_ci NOT NULL,
  `race` enum('African or African American','Asian or Asian American','Caucasian or European American','Native American or Native Alaskan','Other Race') collate utf8_unicode_ci NOT NULL,
  `street` varchar(255) collate utf8_unicode_ci default NULL,
  `postal_code` char(5) default NULL,
  `city` varchar(255) collate utf8_unicode_ci default NULL,
  `state` enum('Alabama','Alaska','Arizona','Arkansas','California','Colorado','Connecticut','Delaware','Florida','Georgia','Hawaii','Idaho','Illinois','Indiana','Iowa','Kansas','Kentucky','Louisiana','Maine','Maryland','Massachusetts','Michigan','Minnesota','Mississippi','Missouri','Montana','Nebraska','Nevada','New Hampshire','New Jersey','New Mexico','New York','North Carolina','North Dakota','Ohio','Oklahoma','Oregon','Pennsylvania','Rhode Island','South Carolina','South Dakota','Tennessee','Texas','Utah','Vermont','Virginia','Washington','West Virginia','Wisconsin','Wyoming') collate utf8_unicode_ci default NULL,
  PRIMARY KEY  (`id`),
  KEY `user_id` (`user_id`),  
  CONSTRAINT `patients_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  UNIQUE KEY `patient_number` (`patient_number`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;



-- ----------------------------
-- Table structure for diagnoses
-- ----------------------------
CREATE TABLE `diagnoses` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `patient_id` int(10) unsigned NOT NULL,
  `dxname` enum('Non-insulin-dependent diabetes mellitus') collate utf8_unicode_ci NOT NULL,
  `icd10code` enum('E11') collate utf8_unicode_ci NOT NULL,
  `Icd9code` enum('250.00','250.02') collate utf8_unicode_ci NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `patient_id` (`patient_id`),
  CONSTRAINT `diagnoses_ibfk_1` FOREIGN KEY (`patient_id`) REFERENCES `patients` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Table structure for drug_allergies
-- ----------------------------
CREATE TABLE `drug_allergies` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `patient_id` int(10) unsigned NOT NULL,
  `met` enum('yes','no') collate utf8_unicode_ci NOT NULL,
  `dpp_4i` enum('yes','no') collate utf8_unicode_ci NOT NULL,
  `glp_1ra` enum('yes','no') collate utf8_unicode_ci NOT NULL,
  `tzd` enum('yes','no') collate utf8_unicode_ci NOT NULL,
  `agi` enum('yes','no') collate utf8_unicode_ci NOT NULL,
  `colsvl` enum('yes','no') collate utf8_unicode_ci NOT NULL,
  `bcr_or` enum('yes','no') collate utf8_unicode_ci NOT NULL,
  `su_gln` enum('yes','no') collate utf8_unicode_ci NOT NULL,
  `insulin` enum('yes','no') collate utf8_unicode_ci NOT NULL,
  `sglt_2` enum('yes','no') collate utf8_unicode_ci NOT NULL,
  `praml` enum('yes','no') collate utf8_unicode_ci NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `patient_id` (`patient_id`),
  CONSTRAINT `drug_allergies_ibfk_1` FOREIGN KEY (`patient_id`) REFERENCES `patients` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Table structure for medhistory_complaints
-- ----------------------------
CREATE TABLE `medhistory_complaints` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `visit_id` int(10) unsigned NOT NULL,
  `complaints` text collate utf8_unicode_ci NOT NULL,
  `hypo` enum('yes','no') collate utf8_unicode_ci NOT NULL,
  `weight_gain` enum('yes','no') collate utf8_unicode_ci NOT NULL,
  `renal_gu` enum('yes','no') collate utf8_unicode_ci NOT NULL,
  `gi_sx` enum('yes','no') collate utf8_unicode_ci NOT NULL,
  `chf` enum('yes','no') collate utf8_unicode_ci NOT NULL,
  `cvd` enum('yes','no') collate utf8_unicode_ci NOT NULL,
  `bone` enum('yes','no') collate utf8_unicode_ci NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `visit_id` (`visit_id`),
  CONSTRAINT `medhistory_complaints_ibfk_1` FOREIGN KEY (`visit_id`) REFERENCES `visits` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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
  `hypo` enum('0','1','2','3') collate utf8_unicode_ci default NULL,
  `weight` enum('0','1','2','3') collate utf8_unicode_ci default NULL,
  `renal_gu` enum('0','1','2','3') collate utf8_unicode_ci default NULL,
  `gi_sx` enum('0','1','2','3') collate utf8_unicode_ci default NULL,
  `chf` enum('0','1','2','3') collate utf8_unicode_ci default NULL,
  `cvd` enum('0','1','2','3') collate utf8_unicode_ci default NULL,
  `bone` enum('0','1','2','3') collate utf8_unicode_ci default NULL,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `medicine_name` (`medicine_name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


-- ----------------------------
-- Table structure for visits
-- ----------------------------
CREATE TABLE `visits` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `patient_id` int(10) unsigned NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `patient_id` (`patient_id`),
  CONSTRAINT `visits_ibfk_1` FOREIGN KEY (`patient_id`) REFERENCES `patients` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Table structure for profiles
-- ----------------------------
CREATE TABLE `profiles` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `user_id` int(10) unsigned NOT NULL,
  `title` varchar(255) collate utf8_unicode_ci default NULL,
  `firstname` varchar(255) collate utf8_unicode_ci NOT NULL,
  `lastname` varchar(255) collate utf8_unicode_ci NOT NULL,
  `phone` varchar(255) collate utf8_unicode_ci default NULL,
  `address` varchar(255) collate utf8_unicode_ci default NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `profiles_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Table structure for treatment_run_algorithms
-- ----------------------------
CREATE TABLE `treatment_run_algorithms` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `treatment_id` int(10) unsigned NOT NULL,
  `type` enum('lifestyle modification','monotherapy','dual_therapy','triple_therapy') collate utf8_unicode_ci NOT NULL,
  `recommendations` text collate utf8_unicode_ci,
  `medicine_name_one` varchar(255) collate utf8_unicode_ci default NULL,
  `dose_one` float default NULL,
  `medicine_name_two` varchar(255) collate utf8_unicode_ci default NULL,
  `dose_two` float default NULL,
  `medicine_name_three` varchar(255) collate utf8_unicode_ci default NULL,
  `dose_three` float default NULL,
  `edited_by_user` enum('yes','no') collate utf8_unicode_ci default NULL,
  PRIMARY KEY  (`id`),
  KEY `treatment_id` (`treatment_id`),
  CONSTRAINT `treatment_run_algorithms_ibfk_1` FOREIGN KEY (`treatment_id`) REFERENCES `treatments` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Table structure for treatments
-- ----------------------------
CREATE TABLE `treatments` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `visit_id` int(10) unsigned NOT NULL,
  `prescriber_username` varchar(255) collate utf8_unicode_ci NOT NULL,
  `a1c_goal` float default NULL,
  `weight_goal` float default NULL,
  PRIMARY KEY  (`id`),
  KEY `visit_id` (`visit_id`),
  CONSTRAINT `treatments_ibfk_1` FOREIGN KEY (`visit_id`) REFERENCES `visits` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Table structure for vitals_labs
-- ----------------------------
CREATE TABLE `vitals_labs` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `visit_id` int(10) unsigned NOT NULL,
  `weight` float NOT NULL,
  `height` float NOT NULL,
  `bps` int(11) NOT NULL,
  `bpd` int(11) NOT NULL,
  `bmi` float default NULL,
  `bmi_status` varchar(255) collate utf8_unicode_ci default NULL,
  `A1c` float NOT NULL,
  `eGFR` int(11) default NULL,
  `notes` text collate utf8_unicode_ci,
  PRIMARY KEY  (`id`),
  KEY `visit_id` (`visit_id`),
  CONSTRAINT `vitals_labs_ibfk_1` FOREIGN KEY (`visit_id`) REFERENCES `visits` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records 
-- ----------------------------
