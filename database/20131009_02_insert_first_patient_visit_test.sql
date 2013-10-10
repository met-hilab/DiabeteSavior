
INSERT INTO visits (
`id` ,
`created` ,
`modified` ,
`patient_id`
)
VALUES (
'01', '2013-01-05 23:19:53', '2013-01-05 23:20:01', '01'
), (
'02', '2013-05-03 23:21:02', '2013-05-03 23:21:11', '01'
);

INSERT INTO medhistory_complaints (
`id` ,
`created` ,
`modified` ,
`visit_id` ,
`complaints` ,
`hypo` ,
`weight_gain` ,
`renal_gu` ,
`gi_sx` ,
`chf` ,
`cvd` ,
`bone`
)
VALUES (
'01', '2013-10-05 23:29:48', '2013-10-05 23:29:52', '01', 'Test Complaints', 'yes', 'yes', 'no', 'no', 'no', 'no', 'no'
);

INSERT INTO vitals_labs(
`id` ,
`created` ,
`modified` ,
`visit_id` ,
`weight` ,
`height` ,
`bps` ,
`bpd` ,
`bmi` ,
`bmi_status` ,
`A1c` ,
`eGFR` ,
`notes`
)
VALUES (
'01', '2013-10-05 23:32:51', '2013-10-05 23:32:53', '01', '80', '182', '120', '80', NULL , NULL , '6.5' , NULL , 'Test notes field'
);

INSERT INTO diagnoses(
`id` ,
`created` ,
`modified` ,
`patient_id` ,
`dxname` ,
`icd10code` ,
`Icd9code`
)
VALUES (
'01', '2013-10-05 23:35:38', '2013-10-05 23:35:41', '01', 'Non-insulin-dependent diabetes mellitus', 'E11', '250.00'
);

INSERT INTO drug_allergies(
`id` ,
`created` ,
`modified` ,
`patient_id` ,
`met` ,
`dpp_4i` ,
`glp_1ra` ,
`tzd` ,
`agi` ,
`colsvl` ,
`bcr-or` ,
`su_gln` ,
`insulin` ,
`sglt_2` ,
`praml`
)
VALUES (
'01', '2013-10-05 23:36:35', '2013-10-05 23:36:38', '01', 'no', 'yes', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no'
);

INSERT INTO treatments (
`id` ,
`created` ,
`modified` ,
`visit_id` ,
`prescriber_username` ,
`a1c_goal` ,
`weight_goal`
)
VALUES (
'01', '2013-10-05 23:38:11', '2013-10-05 23:38:13', '01', 'Paul', NULL , '78'
);

INSERT INTO treatment_run_algorithms (
`id` ,
`created` ,
`modified` ,
`treatment_id` ,
`type` ,
`recommendations` ,
`medicine_name_one` ,
`dose_one` ,
`medicine_name_two` ,
`dose_two` ,
`medicine_name_three` ,
`dose_three` ,
`edited_by_user`
)
VALUES (
'01', '2013-10-05 23:39:54', '2013-10-05 23:39:57', '01', 'lifestyle modification', 'Recommended lifestyle modification', NULL , NULL , NULL , NULL , NULL , NULL , 'no'
);
