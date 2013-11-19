 <!-- Drug Allergies or Contraindications -->

 <table  class="table table-condensed">

    <?php if ($patient['DrugAllergy']['met'] == 'yes') { ?>
        <tr> <th class="dimgray-header">Metformin: </th> <td><?php echo 'yes' ?></td> </tr>
    <?php }?>
    <?php if ($patient['DrugAllergy']['dpp_4i'] == 'yes') { ?>
        <tr> <th class="dimgray-header">Dipeptidyl peptidase 4 inhibitors (DPP-4): </th> <td><?php echo 'yes' ?></td> </tr>
    <?php }?>
    <?php if ($patient['DrugAllergy']['glp_1ra'] == 'yes') { ?>
        <tr> <th class="dimgray-header">Glucagon-like peptide-1 receptor agonists (GLP-1): </th> <td><?php echo 'yes' ?></td> </tr>
    <?php }?>
    <?php if ($patient['DrugAllergy']['tzd'] == 'yes') { ?>
        <tr> <th class="dimgray-header">Thiazolidinediones (TZD): </th> <td><?php echo 'yes' ?></td> </tr>
    <?php }?>
    <?php if ($patient['DrugAllergy']['agi'] == 'yes') { ?>
        <tr> <th class="dimgray-header">Alpha-glucosidase inhibitors (AGIs): </th> <td><?php echo 'yes' ?></td> </tr>
    <?php }?>
    <?php if ($patient['DrugAllergy']['colsvl'] == 'yes') { ?>
        <tr> <th class="dimgray-header">Colesevelam: </th> <td><?php echo 'yes' ?></td> </tr>
    <?php }?>
    <?php if ($patient['DrugAllergy']['bcr_or'] == 'yes') { ?>
        <tr> <th class="dimgray-header">Bromocriptine Mesylate: </th> <td><?php echo 'yes' ?></td> </tr>
    <?php }?>
    <?php if ($patient['DrugAllergy']['su_gln'] == 'yes') { ?>
        <tr> <th class="dimgray-header">Sulfonylurea (SFU) and Glinides: </th> <td><?php echo 'yes' ?></td> </tr>
    <?php }?>
    <?php if ($patient['DrugAllergy']['insulin'] == 'yes') { ?>
        <tr> <th class="dimgray-header">Insulin: </th> <td><?php echo 'yes' ?></td> </tr>
    <?php }?>
    <?php if ($patient['DrugAllergy']['sglt_2'] == 'yes') { ?>
        <tr> <th class="dimgray-header">Sodium-glucose co-transporter 2 inhibitors (SGLT2):</th> <td><?php echo 'yes'?></td> </tr>
    <?php }?>
    <?php if ($patient['DrugAllergy']['praml'] == 'yes') { ?>
        <tr> <th class="dimgray-header">Pramlintide: </th> <td><?php echo 'yes' ?></td> </tr>
    <?php }?>

    <?php if ($patient['DrugAllergy']['met'] == 'NKDA') { ?>
        <tr> <th class="dimgray-header">Metformin: </th> <td><?php echo 'NKDA' ?></td> </tr>
    <?php }?>
    <?php if ($patient['DrugAllergy']['dpp_4i'] == 'NKDA') { ?>
        <tr> <th class="dimgray-header">Dipeptidyl peptidase 4 inhibitors (DPP-4): </th> <td><?php echo 'NKDA' ?></td> </tr>
    <?php }?>
    <?php if ($patient['DrugAllergy']['glp_1ra'] == 'NKDA') { ?>
        <tr> <th class="dimgray-header">Glucagon-like peptide-1 receptor agonists (GLP-1): </th> <td><?php echo 'NKDA' ?></td> </tr>
    <?php }?>
    <?php if ($patient['DrugAllergy']['tzd'] == 'NKDA') { ?>
        <tr> <th class="dimgray-header">Thiazolidinediones (TZD): </th> <td><?php echo 'NKDA' ?></td> </tr>
    <?php }?>
    <?php if ($patient['DrugAllergy']['agi'] == 'NKDA') { ?>
        <tr> <th class="dimgray-header">Alpha-glucosidase inhibitors (AGIs): </th> <td><?php echo 'NKDA' ?></td> </tr>
    <?php }?>
    <?php if ($patient['DrugAllergy']['colsvl'] == 'NKDA') { ?>
        <tr> <th class="dimgray-header">Colesevelam: </th> <td><?php echo 'NKDA' ?></td> </tr>
    <?php }?>
    <?php if ($patient['DrugAllergy']['bcr_or'] == 'NKDA') { ?>
        <tr> <th class="dimgray-header">Bromocriptine Mesylate: </th> <td><?php echo 'NKDA' ?></td> </tr>
    <?php }?>
    <?php if ($patient['DrugAllergy']['su_gln'] == 'NKDA') { ?>
        <tr> <th class="dimgray-header">Sulfonylurea (SFU) and Glinides: </th> <td><?php echo 'NKDA' ?></td> </tr>
    <?php }?>
    <?php if ($patient['DrugAllergy']['insulin'] == 'NKDA') { ?>
        <tr> <th class="dimgray-header">Insulin: </th> <td><?php echo 'NKDA' ?></td> </tr>
    <?php }?>
    <?php if ($patient['DrugAllergy']['sglt_2'] == 'NKDA') { ?>
        <tr> <th class="dimgray-header">Sodium-glucose co-transporter 2 inhibitors (SGLT2):</th> <td><?php echo 'NKDA' ?></td> </tr>
    <?php }?>
    <?php if ($patient['DrugAllergy']['praml'] == 'NKDA') { ?>
        <tr> <th class="dimgray-header">Pramlintide: </th> <td><?php echo 'NKDA' ?></td> </tr>
    <?php }?>

    <?php if ($patient['DrugAllergy']['met'] == 'unknown' || $patient['DrugAllergy']['met'] == null) { ?>
        <tr> <th class="dimgray-header">Metformin: </th> <td><?php echo 'unknown' ?></td> </tr>
    <?php }?>
    <?php if ($patient['DrugAllergy']['dpp_4i'] == 'unknown' || $patient['DrugAllergy']['dpp_4i'] == null) { ?>
        <tr> <th class="dimgray-header">Dipeptidyl peptidase 4 inhibitors (DPP-4): </th> <td><?php echo 'unknown' ?></td> </tr>
    <?php }?>
    <?php if ($patient['DrugAllergy']['glp_1ra'] == 'unknown' || $patient['DrugAllergy']['glp_1ra'] == null) { ?>
        <tr> <th class="dimgray-header">Glucagon-like peptide-1 receptor agonists (GLP-1): </th> <td><?php echo 'unknown' ?></td> </tr>
    <?php }?>
    <?php if ($patient['DrugAllergy']['tzd'] == 'unknown' || $patient['DrugAllergy']['tzd'] == null) { ?>
        <tr> <th class="dimgray-header">Thiazolidinediones (TZD): </th> <td><?php echo 'unknown' ?></td> </tr>
    <?php }?>
    <?php if ($patient['DrugAllergy']['agi'] == 'unknown' || $patient['DrugAllergy']['agi'] == null) { ?>
        <tr> <th class="dimgray-header">Alpha-glucosidase inhibitors (AGIs): </th> <td><?php echo 'unknown' ?></td> </tr>
    <?php }?>
    <?php if ($patient['DrugAllergy']['colsvl'] == 'unknown' || $patient['DrugAllergy']['colsvl'] == null) { ?>
        <tr> <th class="dimgray-header">Colesevelam: </th> <td><?php echo 'unknown' ?></td> </tr>
    <?php }?>
    <?php if ($patient['DrugAllergy']['bcr_or'] == 'unknown' || $patient['DrugAllergy']['bcr_or'] == null) { ?>
        <tr> <th class="dimgray-header">Bromocriptine Mesylate: </th> <td><?php echo 'unknown' ?></td> </tr>
    <?php }?>
    <?php if ($patient['DrugAllergy']['su_gln'] == 'unknown' || $patient['DrugAllergy']['su_gln'] == null) { ?>
        <tr> <th class="dimgray-header">Sulfonylurea (SFU) and Glinides: </th> <td><?php echo 'unknown' ?></td> </tr>
    <?php }?>
    <?php if ($patient['DrugAllergy']['insulin'] == 'unknown' || $patient['DrugAllergy']['insulin'] == null) { ?>
        <tr> <th class="dimgray-header">Insulin: </th> <td><?php echo 'unknown' ?></td> </tr>
    <?php }?>
    <?php if ($patient['DrugAllergy']['sglt_2'] == 'unknown' || $patient['DrugAllergy']['sglt_2'] == null) { ?>
        <tr> <th class="dimgray-header">Sodium-glucose co-transporter 2 inhibitors (SGLT2):</th> <td><?php echo 'unknown' ?></td> </tr>
    <?php }?>
    <?php if ($patient['DrugAllergy']['praml'] == 'unknown' || $patient['DrugAllergy']['praml'] == null) { ?>
        <tr> <th class="dimgray-header">Pramlintide: </th> <td><?php echo 'unknown' ?></td> </tr>
    <?php }?>

</table>
 <p> NKDA – abbreviation for No Known Drug Allergies </p>