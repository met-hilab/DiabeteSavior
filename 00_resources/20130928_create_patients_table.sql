CREATE TABLE `cs673`.`patients` (
  `id` INT NOT NULL,
  `email` VARCHAR(255) NULL,
  `firstname` VARCHAR(45) NULL,
  `lastname` VARCHAR(45) NULL,
  `dob` INT NULL,
  `gender` INT NULL,
  `created` DATETIME NULL,
  `modified` DATETIME NULL,
  PRIMARY KEY (`id`));
