ALTER TABLE `cs673`.`patients` 
CHANGE COLUMN `gender` `gender` ENUM('Male','Female') CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NULL ,
CHANGE COLUMN `race` `race` ENUM('African or African American','Asian or Asian American','Caucasian or European American','Native American or Native Alaskan','Other Race') CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NULL ;
