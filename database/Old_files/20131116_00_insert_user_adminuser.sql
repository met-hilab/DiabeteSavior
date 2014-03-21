USE `cs673`;
/*add admin user*/
INSERT INTO `users` (`email`,`password`,`reset_token`,`username`,`openid`,`service`,`created`,`modified`, `activated`) VALUES ('admin@diabetesavior.com','011c945f30ce2cbafc452f39840f025693339c42',NULL,NULL,NULL,NULL,'2013-09-24 20:05:00','2013-09-24 20:05:00', 1);
UPDATE `users` SET `role`='255' WHERE `id`='1';
