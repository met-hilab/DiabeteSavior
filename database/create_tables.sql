   CREATE TABLE patients
(
    `id` CHAR( 36 ) NOT NULL ,
    `created` DATETIME NOT NULL ,
    `modified` DATETIME NOT NULL ,
    `patient_number` CHAR( 8 ) NOT NULL ,
    `patient_firstname` VARCHAR( 255 ) NOT NULL ,
    `patient_lastname` VARCHAR( 255 ) NOT NULL ,
    `patient_middlename` VARCHAR( 255 ) NULL ,
    `dob` DATE NOT NULL ,
    `picture` BLOB NULL ,
    `occupation` VARCHAR( 255 ) NULL ,
    `gender` ENUM( 'Male', 'Female' ) NOT NULL ,
    `race` ENUM( 'African or African American', 'Asian or Asian American', 'Caucasian or European American', 'Native American or Native Alaskan ', 'Other Race' ) NOT NULL ,
    `street` VARCHAR( 255 ) NULL ,
    `postal_code` INT( 5 ) NULL ,
    `city` VARCHAR( 255 ) NULL ,
    `state` ENUM ( 'Alabama', ' Alaska', 'Arizona', 'Arkansas', 'Alabama','Alaska','Arizona','Arkansas', 
'California','Colorado','Connecticut','Delaware','Florida','Georgia','Hawaii','Idaho','Illinois','Indiana','Iowa','Kansas',
'Kentucky','Louisiana','Maine','Maryland','Massachusetts','Michigan','Minnesota','Mississippi','Missouri','Montana','Nebraska',
'Nevada','New Hampshire','New Jersey','New Mexico','New York','North Carolina','North Dakota','Ohio','Oklahoma','Oregon','Pennsylvania',
'Rhode Island','South Carolina','South Dakota','Tennessee','Texas','Utah','Vermont','Virginia','Washington','West Virginia','Wisconsin', 
'Wyoming') NULL ,
PRIMARY KEY ( `id` ) ,
UNIQUE ( `patient_number`)
) 
ENGINE = InnoDB CHARACTER SET utf8 COLLATE utf8_unicode_ci; 
 


   CREATE TABLE visits 
(
    `id` INT (10) UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY ,
    `created` DATETIME NOT NULL ,
    `modified` DATETIME NOT NULL ,
    `patient_id` CHAR( 36 ) NOT NULL,
    FOREIGN KEY ( `patient_id` ) REFERENCES patients ( `id`) ON DELETE CASCADE ON UPDATE CASCADE
) 
ENGINE = InnoDB CHARACTER SET utf8 COLLATE utf8_unicode_ci;
 

 
   CREATE TABLE medhistory_complaints 
(
    `id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
    `created` DATETIME NOT NULL ,
    `modified` DATETIME NOT NULL ,
    `visit_id` INT(10) UNSIGNED NOT NULL ,
    `complaints` TEXT NOT NULL ,
    `hypo` ENUM( 'yes', 'no' ) NOT NULL ,
    `weight_gain` ENUM( 'yes', 'no' ) NOT NULL ,
    `renal_gu` ENUM( 'yes', 'no' ) NOT NULL ,
    `gi_sx` ENUM( 'yes', 'no' ) NOT NULL ,
    `chf` ENUM( 'yes', 'no' ) NOT NULL ,
    `cvd` ENUM( 'yes', 'no' ) NOT NULL ,
    `bone` ENUM( 'yes', 'no' ) NOT NULL ,
    PRIMARY KEY ( `id` ) ,
    FOREIGN KEY ( `visit_id` ) REFERENCES visits (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) 
ENGINE = InnoDB CHARACTER SET utf8 COLLATE utf8_unicode_ci;



   CREATE TABLE vitals_labs
(
    `id` INT (10) UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY ,
    `created` DATETIME NOT NULL ,
    `modified` DATETIME NOT NULL ,
    `visit_id` INT(10) UNSIGNED NOT NULL ,
    `weight` FLOAT NOT NULL ,
    `height` FLOAT NOT NULL ,
    `bps` INT NOT NULL ,
    `bpd` INT NOT NULL ,
    `bmi` FLOAT NULL ,
    `bmi_status` VARCHAR( 255 ) NULL ,
    `A1c` FLOAT NOT NULL ,
    `eGFR` INT NULL ,
    `notes` TEXT NULL ,
    FOREIGN KEY ( `visit_id` ) REFERENCES visits ( `id`) ON DELETE CASCADE ON UPDATE CASCADE
) 
ENGINE = InnoDB CHARACTER SET utf8 COLLATE utf8_unicode_ci; 



   CREATE TABLE diagnoses
(
    `id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY ,
    `created` DATETIME NOT NULL ,
    `modified` DATETIME NOT NULL ,
    `patient_id` VARCHAR( 36 ) NOT NULL ,
    `dxname` ENUM( 'Non-insulin-dependent diabetes mellitus' ) NOT NULL ,
    `icd10code` ENUM( 'E11' ) NOT NULL ,
    `Icd9code` ENUM( '250.00', '250.02' ) NOT NULL ,
    FOREIGN KEY ( `patient_id` ) REFERENCES patients(`id`) ON DELETE CASCADE ON UPDATE CASCADE
) 
ENGINE = InnoDB CHARACTER SET utf8 COLLATE utf8_unicode_ci;



   CREATE TABLE drug_allergies
(
    `id` INT (10) UNSIGNED NOT NULL ,
    `created` DATETIME NOT NULL ,
    `modified` DATETIME NOT NULL ,
    `patient_id` VARCHAR( 36 ) NOT NULL ,
    `met` ENUM( 'yes', 'no' ) NOT NULL ,
    `dpp_4i` ENUM( 'yes', 'no' )NOT NULL ,
    `glp_1ra` ENUM( 'yes', 'no' )NOT NULL ,
    `tzd` ENUM( 'yes', 'no' )NOT NULL ,
    `agi` ENUM( 'yes', 'no' )NOT NULL ,
    `colsvl` ENUM( 'yes', 'no' )NOT NULL ,
    `bcr-or` ENUM( 'yes', 'no' )NOT NULL ,
    `su_gln` ENUM( 'yes', 'no' )NOT NULL ,
    `insulin` ENUM( 'yes', 'no' )NOT NULL ,
    `sglt_2` ENUM( 'yes', 'no' )NOT NULL ,
    `praml` ENUM( 'yes', 'no' )NOT NULL ,
    PRIMARY KEY ( `id` ) ,
    FOREIGN KEY ( `patient_id` ) REFERENCES patients ( `id`) ON DELETE CASCADE ON UPDATE CASCADE
) 
ENGINE = InnoDB CHARACTER SET utf8 COLLATE utf8_unicode_ci; 



   CREATE TABLE treatments
(
    `id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY ,
    `created` DATETIME NOT NULL ,
    `modified` DATETIME NOT NULL ,
    `visit_id` INT (10) UNSIGNED NOT NULL ,
    `prescriber_username` VARCHAR( 255 ) NOT NULL ,
    `a1c_goal` FLOAT NULL ,
    `weight_goal` FLOAT NULL ,
     FOREIGN KEY ( `visit_id` ) REFERENCES visits ( `id`) ON DELETE CASCADE ON UPDATE CASCADE 
) 
ENGINE = InnoDB CHARACTER SET utf8 COLLATE utf8_unicode_ci; 



   CREATE TABLE treatment_run_algorithms
(
    `id` INT(10) UNSIGNED NOT NULL ,
    `created` DATETIME NOT NULL ,
    `modified` DATETIME NOT NULL ,
    `treatment_id` INT(10) UNSIGNED NOT NULL ,
    `type` ENUM( 'lifestyle modification', 'monotherapy', 'dual_therapy', 'triple_therapy' ) NOT NULL ,
    `recommendations` TEXT NULL ,
    `medicine_name_one` VARCHAR( 255 ) NULL ,
    `dose_one` FLOAT NULL ,
    `medicine_name_two` VARCHAR( 255 ) NULL ,
    `dose_two` FLOAT NULL ,
    `medicine_name_three` VARCHAR( 255 ) NULL ,
    `dose_three` FLOAT NULL ,
    `edited_by_user` ENUM( 'yes', 'no' ) NULL ,
    PRIMARY KEY ( `id` ) ,
    FOREIGN KEY ( `treatment_id` ) REFERENCES treatments (`id`) ON DELETE CASCADE ON UPDATE CASCADE 
)
ENGINE = InnoDB CHARACTER SET utf8 COLLATE utf8_unicode_ci; 



   CREATE TABLE medicines
(
    `id` INT (10) UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY ,
    `created` DATETIME NOT NULL ,
    `modified` DATETIME NOT NULL ,
    `medicine_name` VARCHAR( 255 ) NOT NULL ,
    `min_dose` FLOAT NOT NULL ,
    `max_dose` FLOAT NOT NULL ,
    `metric` CHAR( 8 ) NOT NULL ,
    `hypo` ENUM( '0', '1', '2', '3' ) NULL ,
    `weight` ENUM( '0', '1', '2', '3' ) NULL ,
    `renal_gu` ENUM( '0', '1', '2', '3' ) NULL ,
    `gi_sx` ENUM( '0', '1', '2', '3' ) NULL ,
    `chf` ENUM( '0', '1', '2', '3' ) NULL ,
    `cvd` ENUM( '0', '1', '2', '3' ) NULL ,
    `bone` ENUM( '0', '1', '2', '3' ) NULL ,
    UNIQUE ( `medicine_name`)
) 
ENGINE = InnoDB CHARACTER SET utf8 COLLATE utf8_unicode_ci; 



CREATE TABLE users
(
    `id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT ,
    `email` VARCHAR(128) NOT NULL ,
    `password` CHAR(64) NOT NULL ,
    `reset_token` CHAR(64) NULL ,
    `username` VARCHAR(45) NULL ,
    `openid` VARCHAR(64) NULL ,
    `service` VARCHAR(45) NULL ,
    `created` DATETIME NULL DEFAULT NULL ,
    `modified` DATETIME NULL DEFAULT NULL ,
    PRIMARY KEY (`id`) ,
    UNIQUE INDEX `id_UNIQUE` (`id` ASC) ,
    UNIQUE INDEX `email_UNIQUE` (`email` ASC) 
)
ENGINE = InnoDB CHARACTER SET utf8 COLLATE utf8_unicode_ci;



   CREATE TABLE profiles 
(
    `id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT ,
    `user_id` INT(10) UNSIGNED NOT NULL ,
    `title` VARCHAR(255) NULL ,
    `firstname` VARCHAR(255) NOT NULL ,
    `lastname` VARCHAR(255) NOT NULL ,
    `phone` VARCHAR(255) NULL ,
    `address` VARCHAR(255) NULL ,
    `created` DATETIME NOT NULL ,
    `modified` DATETIME NOT NULL ,
    PRIMARY KEY (`id`),
	FOREIGN KEY ( `user_id` ) REFERENCES users (`id`) ON DELETE CASCADE ON UPDATE CASCADE 
)
    ENGINE = InnoDB CHARACTER SET utf8 COLLATE utf8_unicode_ci;
   