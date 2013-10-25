/*
-- Query: SELECT * FROM cs673.users
LIMIT 0, 2000

-- Date: 2013-10-10 15:41
*/
USE `cs673`;
/*truncate users;*/
INSERT INTO `users` (`email`,`password`,`reset_token`,`username`,`openid`,`service`,`created`,`modified`) VALUES ('admin@diabetesavior.com','011c945f30ce2cbafc452f39840f025693339c42',NULL,NULL,NULL,NULL,'2013-09-24 20:05:00','2013-09-24 20:05:00');


INSERT INTO patients (
`id` ,
`created` ,
`modified` ,
`user_id` ,
`patient_number` ,
`patient_firstname` ,
`patient_lastname` ,
`patient_middlename` ,
`dob` ,
`occupation` ,
`gender` ,
`race` ,
`street` ,
`postal_code` ,
`city` ,
`state`
)
VALUES (
'01', '2013-10-04 22:59:36', '2013-10-04 22:59:46', '1', 'M0000001', 'Robert', 'Brown', 'M', 
'1990-01-01', 'Driver', 'Male', 'Caucasian or European American', '123 Green Street', 
'02144', 'Boston', 'Massachusetts'
);




INSERT INTO patients (
`id` ,
`created` ,
`modified` ,
`user_id` ,
`patient_number` ,
`patient_firstname` ,
`patient_lastname` ,
`patient_middlename` ,
`dob` ,
`occupation` ,
`gender` ,
`race` ,
`street` ,
`postal_code` ,
`city` ,
`state`
)
VALUES (
'02', '2013-09-05 22:59:36', '2013-09-05 22:59:46', '1', 'M0000002', 'Mark', 'Todess', 'J', 
'1991-01-01', 'Manager', 'Male', 'Caucasian or European American', '24 Main Street', 
'02134', 'Boston', 'Massachusetts'
);



INSERT INTO patients (
`id` ,
`created` ,
`modified` ,
`user_id` ,
`patient_number` ,
`patient_firstname` ,
`patient_lastname` ,
`patient_middlename` ,
`dob` ,
`occupation` ,
`gender` ,
`race` ,
`street` ,
`postal_code` ,
`city` ,
`state`
)
VALUES (
'03', '2013-09-05 22:59:36', '2013-09-05 22:59:46', '1', 'M0000003', 'Mike', 'Fedoff', 'S', 
'1981-01-01', 'Director', 'Male', 'Caucasian or European American', '67 Washington Street', 
'02112', 'Boston', 'Massachusetts'
);


USE `cs673`;
INSERT INTO patients(
`id` ,
`created` ,
`modified` ,
`user_id` ,
`patient_number` ,
`patient_firstname` ,
`patient_lastname` ,
`patient_middlename` ,
`dob` ,
`occupation` ,
`gender` ,
`race` ,
`street` ,
`postal_code` ,
`city` ,
`state`
)
VALUES (
'04', '2013-10-02 23:12:25', '2013-10-02 23:12:31', '1', 'F0000001', 'Barbara', 'Lenn', 'T',
'1988-10-06', 'Nurse', 'Female', 'Native American or Native Alaskan', '54 Forester Street', 
'00001', 'New York', 'New York'
);



INSERT INTO patients(
`id` ,
`created` ,
`modified` ,
`user_id` ,
`patient_number` ,
`patient_firstname` ,
`patient_lastname` ,
`patient_middlename` ,
`dob` ,
`occupation` ,
`gender` ,
`race` ,
`street` ,
`postal_code` ,
`city` ,
`state`
)
VALUES (
'05', '2012-10-02 23:12:25', '2012-10-02 23:12:31', '1', 'F0000002', 'Molly', 'Polk', 'D',
'1995-11-06', 'Student', 'Female', 'Native American or Native Alaskan', '44 Second Ave.', 
'00001', 'New York', 'New York'
);

