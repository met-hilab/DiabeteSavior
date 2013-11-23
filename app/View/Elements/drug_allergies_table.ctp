 <!-- Drug Allergies or Contraindications -->

 <table  class="table table-condensed">

    <?php 
        if ($patient['DrugAllergy']['met'] == 'NKDA' &&
            $patient['DrugAllergy']['dpp_4i'] == 'NKDA' &&
            $patient['DrugAllergy']['glp_1ra'] == 'NKDA' &&
            $patient['DrugAllergy']['tzd'] == 'NKDA' &&
            $patient['DrugAllergy']['agi'] == 'NKDA' &&
            $patient['DrugAllergy']['colsvl'] == 'NKDA' &&
            $patient['DrugAllergy']['bcr_or'] == 'NKDA' &&
            $patient['DrugAllergy']['su_gln'] == 'NKDA' &&
            $patient['DrugAllergy']['insulin'] == 'NKDA' &&
            $patient['DrugAllergy']['sglt_2'] == 'NKDA' &&
            $patient['DrugAllergy']['praml'] == 'NKDA' ) {
    ?>
     <tr><td><?php echo 'NKDA - no known drug allergies' ?></td> </tr>
    <?php }?>
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

</table>
