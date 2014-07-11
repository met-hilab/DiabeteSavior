ALTER TABLE `cs673`.`users` 
ADD COLUMN `activate_token` VARCHAR(255) NULL DEFAULT NULL AFTER `reset_at`,
ADD COLUMN `activated_at` DATETIME NULL DEFAULT NULL AFTER `activate_token`;
