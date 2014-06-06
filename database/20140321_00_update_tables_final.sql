ALTER TABLE `cs673`.`medhistory_complaints` 
ADD COLUMN `sleep_apnea` enum('yes','no') collate utf8_unicode_ci default NULL,
ADD COLUMN `stress_incont` enum('yes','no') collate utf8_unicode_ci default NULL, 
ADD COLUMN `family_hist_diabetes` enum('yes','no') collate utf8_unicode_ci default NULL, 
ADD COLUMN `phys_active` enum('yes','no') collate utf8_unicode_ci default NULL;

ALTER TABLE `cs673`.`patients` 
MODIFY `race` enum('African or African American','Asian or Asian American','Caucasian or European American','Native American or Native Alaskan','Hispanic or Latino','Pacific Islanders','Other Race') collate utf8_unicode_ci NOT NULL;

ALTER table `cs673`.`vitals_labs`
ADD COLUMN `waist` float default NULL,
ADD COLUMN `gtt` int(11) default NULL,
ADD COLUMN `fbg` int(11) default NULL,
ADD COLUMN `ldl` int(11) default NULL,
ADD COLUMN `hdl` int(11) default NULL ,
ADD COLUMN `vhdl` int(11) default NULL,
ADD COLUMN `triglycerides` int(11) default NULL,
ADD COLUMN `cholesterol_total` int(11) default NULL;

alter table `cs673`.`users`
ADD COLUMN `reset_at` DATETIME DEFAULT NULL AFTER `reset_token`;