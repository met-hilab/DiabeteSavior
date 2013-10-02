CREATE  TABLE `cs673`.`profiles` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT ,
  `user_id` INT NOT NULL ,
  `title` VARCHAR(255) NULL ,
  `firstname` VARCHAR(255) NOT NULL ,
  `lastname` VARCHAR(255) NOT NULL ,
  `phone` VARCHAR(255) NULL ,
  `address` VARCHAR(255) NULL ,
  `created` DATETIME NOT NULL ,
  `modified` DATETIME NOT NULL ,
  PRIMARY KEY (`id`) );
