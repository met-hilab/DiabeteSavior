INSERT INTO `users` (`id`, `email`, `password`, `reset_token`, `username`, `openid`, `service`, `activated`, `role`, `created`, `modified`) VALUES
(1, 'admin@diabetesavior.com', '011c945f30ce2cbafc452f39840f025693339c42', NULL, NULL, NULL, NULL, 1, 255, '2013-09-24 20:05:00', '2013-09-24 20:05:00'),
(2, 'user@diabetesavior.com', '011c945f30ce2cbafc452f39840f025693339c42', NULL, NULL, NULL, NULL, 1, 0, '2013-11-14 18:40:33', '2013-11-14 18:44:15');



INSERT INTO `profiles` (`id`, `user_id`, `title`, `firstname`, `lastname`, `phone`, `address`, `created`, `modified`) VALUES
(1, 1, NULL, 'John', 'Smith', '', NULL, '2013-11-14 18:40:33', '2013-11-14 18:44:15'),
(2, 2, NULL, 'Richard', 'Neff', '', NULL, '2013-11-14 18:40:33', '2013-11-14 18:44:15');




INSERT INTO `patients` (`id`, `created`, `modified`, `user_id`, `patient_number`, `patient_firstname`, `patient_lastname`, `patient_middlename`, `dob`, `occupation`, `gender`, `race`, `street`, `postal_code`, `city`, `state`) VALUES
('529a80f7-a36c-4a18-9d82-1838cbdd56cb', '2012-11-28 19:31:01', '2012-11-28 19:31:01', 1, 'mlf12056', 'Larry', 'Ford', '', '1976-06-12', 'Bus Driver', 'Male', 'Caucasian or European American', '403 Lyon Avenue', '02472', 'Watertown', 'Massachusetts'),
('529b9237-44dc-4370-8ea2-1838cbdd56cb', '2012-12-01 14:52:59', '2012-12-01 14:52:59', 1, 'fle01086', 'Lulu', 'Everett', '', '1969-12-01', 'Student', 'Female', 'African or African American', '24 Main Street', '02135', 'Boston', 'Massachusetts'),
('529b97d0-57d4-41a6-9ddf-1838cbdd56cb', '2013-12-01 15:10:56', '2013-12-01 15:10:56', 1, 'med13882', 'Eric', 'Dearman', '', '1976-12-13', 'Dental technician', 'Male', 'Caucasian or European American', '67 Washington Street', '02112', 'Boston', 'Massachusetts'),
('529b986a-d868-4b08-9f09-1838cbdd56cb', '2013-12-01 15:13:30', '2013-12-01 15:13:30', 1, 'fnm11884', 'Natalya', 'Moffet', '', '1980-11-11', 'Administrative assistant', 'Female', 'Caucasian or European American', '354 Tenmile Road', '02026', 'Dedham', 'Massachusetts'),
('529b9956-c064-4c2d-a9d5-1838cbdd56cb', '2013-12-01 15:17:26', '2013-12-01 15:17:26', 1, 'mja01887', 'Jose', 'Adams', '', '1974-09-01', 'Administrative services manager', 'Male', 'African or African American', '2378 Ferguson Street', '01923', 'Danvers', 'Massachusetts');



INSERT INTO `visits` (`id`, `created`, `modified`, `patient_id`) VALUES
(1, '2012-11-28 19:31:01', '2012-11-28 19:31:01', '529a80f7-a36c-4a18-9d82-1838cbdd56cb'),
(2, '2013-02-28 19:42:27', '2013-02-28 19:42:27', '529a80f7-a36c-4a18-9d82-1838cbdd56cb'),
(3, '2013-05-30 19:46:48', '2013-05-30 19:46:48', '529a80f7-a36c-4a18-9d82-1838cbdd56cb'),
(4, '2013-08-30 19:50:52', '2013-08-30 19:50:52', '529a80f7-a36c-4a18-9d82-1838cbdd56cb'),
(5, '2013-11-30 19:56:48', '2013-11-30 19:56:48', '529a80f7-a36c-4a18-9d82-1838cbdd56cb'),
(6, '2012-12-01 14:52:59', '2012-12-01 14:52:59', '529b9237-44dc-4370-8ea2-1838cbdd56cb'),
(7, '2013-03-01 14:57:14', '2013-03-01 14:57:14', '529b9237-44dc-4370-8ea2-1838cbdd56cb'),
(8, '2013-06-01 15:00:15', '2013-06-01 15:00:15', '529b9237-44dc-4370-8ea2-1838cbdd56cb'),
(9, '2013-09-01 15:02:19', '2013-09-01 15:02:19', '529b9237-44dc-4370-8ea2-1838cbdd56cb'),
(10, '2013-12-01 15:06:12', '2013-12-01 15:06:12', '529b9237-44dc-4370-8ea2-1838cbdd56cb');



INSERT INTO `drug_allergies` (`id`, `created`, `modified`, `patient_id`, `met`, `dpp_4i`, `glp_1ra`, `tzd`, `agi`, `colsvl`, `bcr_or`, `su_gln`, `insulin`, `sglt_2`, `praml`) VALUES
(2, '2013-11-30 19:31:01', '2013-11-30 19:56:48', '529a80f7-a36c-4a18-9d82-1838cbdd56cb', 'NKDA', 'NKDA', 'NKDA', 'NKDA', 'NKDA', 'unknown', 'unknown', 'unknown', 'unknown', 'unknown', 'unknown'),
(3, '2013-12-01 14:52:59', '2013-12-01 15:06:12', '529b9237-44dc-4370-8ea2-1838cbdd56cb', 'yes', 'unknown', 'unknown', 'unknown', 'unknown', 'unknown', 'unknown', 'unknown', 'unknown', 'unknown', 'unknown');




INSERT INTO `medhistory_complaints` (`id`, `created`, `modified`, `visit_id`, `complaints`, `current_pregnancy`, `hypo`, `weight_gain`, `renal_gu`, `gi_sx`, `chf`, `cvd`, `bone`) VALUES
(1, '2012-11-28 19:31:01', '2012-11-28 19:31:01', 1, 'Polyuria, polydipsia, polyphagia', NULL, 'no', 'no', 'no', 'no', 'no', 'no', 'no'),
(2, '2013-02-28 19:42:27', '2013-02-28 19:42:27', 2, 'Polyuria, polydipsia, polyphagia', NULL, 'no', 'no', 'no', 'no', 'no', 'no', 'no'),
(3, '2013-05-30 19:46:48', '2013-05-30 19:46:48', 3, 'Polyuria, polydipsia, polyphagia', NULL, 'no', 'no', 'no', 'no', 'no', 'no', 'no'),
(4, '2013-08-30 19:50:52', '2013-08-30 19:50:52', 4, 'Polyuria, polydipsia, polyphagia', NULL, 'no', 'no', 'no', 'no', 'no', 'no', 'no'),
(5, '2013-11-30 19:56:48', '2013-11-30 19:56:48', 5, 'Polyuria, polydipsia, polyphagia', NULL, 'no', 'no', 'no', 'no', 'no', 'no', 'no'),
(6, '2012-12-01 14:52:59', '2012-12-01 14:52:59', 6, 'Polyuria, polydipsia, polyphagia', NULL, 'no', 'yes', 'no', 'no', 'no', 'yes', 'no'),
(7, '2013-03-01 14:57:14', '2013-03-01 14:57:14', 7, 'Polyuria, polydipsia, polyphagia', NULL, 'no', 'yes', 'no', 'no', 'no', 'yes', 'no'),
(8, '2013-06-01 15:00:15', '2013-06-01 15:00:15', 8, 'Polyuria, polydipsia, polyphagia', NULL, 'no', 'yes', 'no', 'no', 'no', 'yes', 'no'),
(9, '2013-09-01 15:02:19', '2013-09-01 15:02:19', 9, 'Polyuria, polydipsia, polyphagia', NULL, 'no', 'yes', 'no', 'no', 'no', 'yes', 'no'),
(10, '2013-12-01 15:06:12', '2013-12-01 15:06:12', 10, 'Polyuria, polydipsia, polyphagia', NULL, 'no', 'yes', 'no', 'no', 'no', 'yes', 'no');




INSERT INTO `vitals_labs` (`id`, `created`, `modified`, `visit_id`, `weight`, `height`, `bps`, `bpd`, `bmi`, `bmi_status`, `A1c`, `eGFR`, `notes`) VALUES
(1, '2012-11-28 19:31:01', '2012-11-28 19:31:01', 1, 78, 182, 0, 0, 23.5, 'Normal range', 6.5, NULL, 'Patient has elevated A1C level. '),
(2, '2013-02-28 19:42:27', '2013-02-28 19:42:27', 2, 78, 182, 0, 0, 23.5, 'Normal range', 6.6, NULL, 'A1C level elevated comparing to the last visit.'),
(3, '2013-05-30 19:46:48', '2013-05-30 19:46:48', 3, 79, 182, 0, 0, 23.8, 'Normal range', 6.7, NULL, 'A1C level elevated comparing to previous visits.'),
(4, '2013-08-30 19:50:52', '2013-08-30 19:50:52', 4, 79, 182, 0, 0, 23.8, 'Normal range', 7, NULL, 'A1C level reached 7.0%'),
(5, '2013-11-30 19:56:48', '2013-11-30 19:56:48', 5, 78, 182, 0, 0, 23.5, 'Normal range', 7.1, NULL, 'A1C level still increasing with triple therapy. Consider to use insulin.'),
(6, '2012-12-01 14:52:59', '2012-12-01 14:52:59', 6, 124, 174, 0, 0, 41, 'Extremely obese', 6.1, NULL, 'Target weight is 110 kg / 243 lb.\nFirst time visit. Patient does not take any medicines to decrease sugar level at this time.'),
(7, '2013-03-01 14:57:14', '2013-03-01 14:57:14', 7, 122, 174, 0, 0, 40.3, 'Extremely obese', 6.5, NULL, 'Target weight is 110 kg / 243 lb.\nA1C level increased. '),
(8, '2013-06-01 15:00:15', '2013-06-01 15:00:15', 8, 112, 174, 0, 0, 37, 'Obese', 6.1, NULL, 'Target weight is 90.5 kg / 200 lb.\nA1C level decreased on mono therapy.'),
(9, '2013-09-01 15:02:19', '2013-09-01 15:02:19', 9, 103, 174, 0, 0, 34, 'Obese', 6.6, NULL, 'Target weight is 90.5 kg / 200 lb.\nA1C level increased comparing to previous visit.'),
(10, '2013-12-01 15:06:12', '2013-12-01 15:06:12', 10, 97, 174, 0, 0, 32, 'Obese', 6.9, NULL, 'Target weight is 42.2 kg / 93 lb.\nA1C level increased comparing to previous visit.');




INSERT INTO `treatments` (`id`, `created`, `modified`, `visit_id`, `prescriber_username`, `a1c_goal`, `weight_goal`) VALUES
(1, '2012-11-28 19:31:01', '2012-11-28 19:31:01', 1, 'NO DATA', 6, 78),
(2, '2013-02-28 19:42:27', '2013-02-28 19:42:27', 2, 'NO DATA', 6, 35.4),
(3, '2013-05-30 19:46:48', '2013-05-30 19:46:48', 3, 'NO DATA', 6, 35.4),
(4, '2013-08-30 19:50:52', '2013-08-30 19:50:52', 4, 'NO DATA', 6.5, 78),
(5, '2013-11-30 19:56:48', '2013-11-30 19:56:48', 5, 'NO DATA', 6.5, 78),
(6, '2012-12-01 14:52:59', '2012-12-01 14:52:59', 6, 'NO DATA', 5.7, 110),
(7, '2013-03-01 14:57:14', '2013-03-01 14:57:14', 7, 'NO DATA', 6, 110),
(8, '2013-06-01 15:00:15', '2013-06-01 15:00:15', 8, 'NO DATA', 5.7, 102),
(9, '2013-09-01 15:02:19', '2013-09-01 15:02:19', 9, 'NO DATA', 6, 95),
(10, '2013-12-01 15:06:12', '2013-12-01 15:06:12', 10, 'NO DATA', 6, 42.2);




INSERT INTO `treatment_run_algorithms` (`id`, `created`, `modified`, `treatment_id`, `type`, `recommendations`, `medicine_name_one`, `dose_one`, `medicine_name_two`, `dose_two`, `medicine_name_three`, `dose_three`, `edited_by_user`, `edited_justification`) VALUES
(1, '2013-11-30 19:33:07', '2013-11-30 19:33:07', 1, 'lifestyle + monotherapy', '\n<b>Reported medicine side effects:</b>\nMetformin:\n-High likelyhood of adverse effects related to renal or genitourinary problems.\n\r\n    									-Use with caution: risk of gastrointestinal side effects.\n\r\n    									-Possible benefits related to weight loss and cardiovascular disease.\n', 'Metformin', NULL, 'none', NULL, 'none', NULL, 'no', NULL),
(2, '2013-02-28 19:42:27', '2013-02-28 19:42:27', 2, 'lifestyle + dual therapy', '\n<b>Reported medicine side effects:</b>\nMetformin:\n-High likelyhood of adverse effects related to renal or genitourinary problems.\n\r\n    									-Use with caution: risk of gastrointestinal side effects.\n\r\n    									-Possible benefits related to weight loss and cardiovascular disease.\nGLP_1RA:\n-High likelyhood of adverse effects related to renal or genitourinary problems.\n\r\n    									-Use with caution: risk of gastrointestinal side effects.\n\r\n    									-Possible benefits related to weight loss.\n', 'Metformin', NULL, 'GLP_1RA', NULL, 'none', NULL, 'no', NULL),
(3, '2013-05-30 19:46:48', '2013-05-30 19:46:48', 3, 'lifestyle + triple therapy', '\n<b>Reported medicine side effects:</b>\nMetformin:\n-High likelyhood of adverse effects related to renal or genitourinary problems.\n\r\n    									-Use with caution: risk of gastrointestinal side effects.\n\r\n    									-Possible benefits related to weight loss and cardiovascular disease.\nGLP_1RA:\n-High likelyhood of adverse effects related to renal or genitourinary problems.\n\r\n    									-Use with caution: risk of gastrointestinal side effects.\n\r\n    									-Possible benefits related to weight loss.\nTZD:\n-High likelyhood of adverse effects related to weight gain, and renal or genitourinary problems.\n\r\n    									-Use with caution: risk of chronic heart failure and bone fracture.\n', 'Metformin', NULL, 'GLP_1RA', NULL, 'TZD', NULL, 'no', NULL),
(4, '2013-08-30 19:50:52', '2013-08-30 19:50:52', 4, 'lifestyle + triple therapy', '<b>Reported medicine side effects:</b>\r\nMetformin:\r\n-High likelyhood of adverse effects related to renal or genitourinary problems.\r\n\r\n    									-Use with caution: risk of gastrointestinal side effects.\r\n\r\n    									-Possible benefits related to weight loss and cardiovascular disease.\r\nGLP_1RA:\r\n-High likelyhood of adverse effects related to renal or genitourinary problems.\r\n\r\n    									-Use with caution: risk of gastrointestinal side effects.\r\n\r\n    									-Possible benefits related to weight loss.\r\nTZD:\r\n-High likelyhood of adverse effects related to weight gain, and renal or genitourinary problems.\r\n\r\n    									-Use with caution: risk of chronic heart failure and bone fracture.\r\nInsulin:\r\n-High likelyhood of adverse effects related to hypoglycemia, weight gain, \r\n    												and renal or genitourinary problems.\r\n', 'Metformin', NULL, 'GLP_1RA', NULL, 'TZD', NULL, 'yes', 'Too early to start insulin'),
(5, '2013-11-30 19:56:48', '2013-11-30 19:56:48', 5, 'lifestyle + triple therapy + insulin', '\n<b>Reported medicine side effects:</b>\nMetformin:\n-High likelyhood of adverse effects related to renal or genitourinary problems.\n\r\n    									-Use with caution: risk of gastrointestinal side effects.\n\r\n    									-Possible benefits related to weight loss and cardiovascular disease.\nGLP_1RA:\n-High likelyhood of adverse effects related to renal or genitourinary problems.\n\r\n    									-Use with caution: risk of gastrointestinal side effects.\n\r\n    									-Possible benefits related to weight loss.\nTZD:\n-High likelyhood of adverse effects related to weight gain, and renal or genitourinary problems.\n\r\n    									-Use with caution: risk of chronic heart failure and bone fracture.\nInsulin:\n-High likelyhood of adverse effects related to hypoglycemia, weight gain, \r\n    												and renal or genitourinary problems.\n', 'Metformin', NULL, 'GLP_1RA', NULL, 'TZD', NULL, 'no', NULL),
(6, '2012-12-01 14:52:59', '2012-12-01 14:52:59', 6, 'lifestyle modification', '\n<b>Reported medicine side effects:</b>\n', 'none', NULL, 'none', NULL, 'none', NULL, 'no', NULL),
(7, '2013-03-01 14:57:14', '2013-03-01 14:57:14', 7, 'lifestyle + monotherapy', '<b>Patient is at higher risk of side effects due to contraindications with following medications:</b>\nGLP_1RA:  weight gain\n\n<b>Reported medicine side effects:</b>\nGLP_1RA:\n-High likelyhood of adverse effects related to renal or genitourinary problems.\n\r\n    									-Use with caution: risk of gastrointestinal side effects.\n\r\n    									-Possible benefits related to weight loss.\n', 'GLP_1RA', NULL, 'none', NULL, 'none', NULL, 'no', NULL),
(8, '2013-06-01 15:00:15', '2013-06-01 15:00:15', 8, 'lifestyle + monotherapy', '<b>Patient is at higher risk of side effects due to contraindications with following medications:</b>\nGLP_1RA:  weight gain\n\n<b>Reported medicine side effects:</b>\nGLP_1RA:\n-High likelyhood of adverse effects related to renal or genitourinary problems.\n\r\n    									-Use with caution: risk of gastrointestinal side effects.\n\r\n    									-Possible benefits related to weight loss.\n', 'GLP_1RA', NULL, 'none', NULL, 'none', NULL, 'no', NULL),
(9, '2013-09-01 15:02:19', '2013-09-01 15:02:19', 9, 'lifestyle + dual therapy', '<b>Patient is at higher risk of side effects due to contraindications with following medications:</b>\nGLP_1RA:  weight gain\n\n<b>Reported medicine side effects:</b>\nGLP_1RA:\n-High likelyhood of adverse effects related to renal or genitourinary problems.\n\r\n    									-Use with caution: risk of gastrointestinal side effects.\n\r\n    									-Possible benefits related to weight loss.\nDPP4_i:\n-nuetral\n', 'GLP_1RA', NULL, 'DPP4_i', NULL, 'none', NULL, 'no', NULL),
(10, '2013-12-01 15:06:12', '2013-12-01 15:06:12', 10, 'lifestyle + triple therapy', '<b>Patient is at higher risk of side effects due to contraindications with following medications:</b>\nGLP_1RA:  weight gain\nTZD:  weight gain\n\n<b>Reported medicine side effects:</b>\nGLP_1RA:\n-High likelyhood of adverse effects related to renal or genitourinary problems.\n\r\n    									-Use with caution: risk of gastrointestinal side effects.\n\r\n    									-Possible benefits related to weight loss.\nDPP4_i:\n-nuetral\nTZD:\n-High likelyhood of adverse effects related to weight gain, and renal or genitourinary problems.\n\r\n    									-Use with caution: risk of chronic heart failure and bone fracture.\n', 'GLP_1RA', NULL, 'DPP4_i', NULL, 'TZD', NULL, 'no', NULL);











