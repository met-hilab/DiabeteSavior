USE `cs673`;
CREATE  TABLE `users` (
  `id` INT NOT NULL AUTO_INCREMENT ,
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
  UNIQUE INDEX `email_UNIQUE` (`email` ASC) );
