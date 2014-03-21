/*
MySQL Data Transfer
Source Host: localhost
Source Database: cs673
Target Host: localhost
Target Database: cs673
Date: 2013/10/19 9:37:51
*/

USE `cs673`;

SET FOREIGN_KEY_CHECKS=0;

DROP TABLE IF EXISTS `patients`;

-- ----------------------------
-- Table structure for patients
-- ----------------------------
CREATE TABLE `patients` (
  `id` char(36) collate utf8_unicode_ci NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
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
  `postal_code` varchar(10) collate utf8_unicode_ci default NULL,
  `city` varchar(255) collate utf8_unicode_ci default NULL,
  `state` enum('Alabama','Alaska','Arizona','Arkansas','California','Colorado','Connecticut','Delaware','Florida','Georgia','Hawaii','Idaho','Illinois','Indiana','Iowa','Kansas','Kentucky','Louisiana','Maine','Maryland','Massachusetts','Michigan','Minnesota','Mississippi','Missouri','Montana','Nebraska','Nevada','New Hampshire','New Jersey','New Mexico','New York','North Carolina','North Dakota','Ohio','Oklahoma','Oregon','Pennsylvania','Rhode Island','South Carolina','South Dakota','Tennessee','Texas','Utah','Vermont','Virginia','Washington','West Virginia','Wisconsin','Wyoming') collate utf8_unicode_ci default NULL,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `patient_number` (`patient_number`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records 
-- ----------------------------
INSERT INTO `patients` VALUES ('01', '2013-10-04 22:59:36', '2013-10-04 22:59:46', 'M0000001', 'Robert', 'Brown', 'M', '1990-01-01', null, 'Driver', 'Male', 'Caucasian or European American', '123 Green Street', '2144', 'Boston', 'Massachusetts');
INSERT INTO `patients` VALUES ('02', '2013-09-05 22:59:36', '2013-09-05 22:59:46', 'M0000002', 'Mark', 'Todess', 'J', '1991-01-01', null, 'Manager', 'Male', 'Caucasian or European American', '24 Main Street', '2134', 'Boston', 'Massachusetts');
INSERT INTO `patients` VALUES ('03', '2013-09-05 22:59:36', '2013-09-05 22:59:46', 'M0000003', 'Mike', 'Fedoff', 'S', '1981-01-01', null, 'Director', 'Male', 'Caucasian or European American', '67 Washington Street', '2112', 'Boston', 'Massachusetts');
INSERT INTO `patients` VALUES ('04', '2013-10-02 23:12:25', '2013-10-02 23:12:31', 'F0000001', 'Barbara', 'Lenn', 'T', '1988-10-06', null, 'Nurse', 'Female', 'Native American or Native Alaskan', '54 Forester Street', '1', 'New York', 'New York');
INSERT INTO `patients` VALUES ('05', '2012-10-02 23:12:25', '2012-10-02 23:12:31', 'F0000002', 'Molly', 'Polk', 'D', '1995-11-06', null, 'Student', 'Female', 'Native American or Native Alaskan', '44 Second Ave.', '1', 'New York', 'New York');
