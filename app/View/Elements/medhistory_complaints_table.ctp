<!-- Medical History and Complaints -->

<table  class="table table-condensed">
	    
    <?php if ($visit['MedhistoryComplaint']['hypo'] == 'yes') { ?>
        <tr> <th class="dimgray-header">Hypoglycemia: </th> <td><?php echo 'yes' ?></td> </tr>
    <?php }?>
    <?php if ($visit['MedhistoryComplaint']['weight_gain'] == 'yes') { ?>
        <tr> <th class="dimgray-header">Weight gain: </th> <td><?php echo 'yes' ?></td> </tr>
    <?php }?>
    <?php if ($visit['MedhistoryComplaint']['hypo'] == 'yes') { ?>
        <tr> <th class="dimgray-header">Renal or Genitourinary symptoms: </th> <td><?php echo 'yes' ?></td> </tr>
    <?php }?>
    <?php if ($visit['MedhistoryComplaint']['gi_sx'] == 'yes') { ?>
        <tr> <th class="dimgray-header">Gastrointestinal symptoms: </th> <td><?php echo 'yes' ?></td> </tr>
    <?php }?>
    <?php if ($visit['MedhistoryComplaint']['chf'] == 'yes') { ?>
        <tr> <th class="dimgray-header">Coronary heart disease: </th> <td><?php echo 'yes' ?></td> </tr>
    <?php }?>
    <?php if ($visit['MedhistoryComplaint']['cvd'] == 'yes') { ?>
        <tr> <th class="dimgray-header">Cardiovascular disease: </th> <td><?php echo 'yes' ?></td> </tr>
    <?php }?>
    <?php if ($visit['MedhistoryComplaint']['bone'] == 'yes') { ?>
        <tr> <th class="dimgray-header">Osteoporosis: </th> <td><?php echo 'yes' ?></td> </tr>
    <?php }?>

    <?php if ($visit['MedhistoryComplaint']['hypo'] == 'no') { ?>
        <tr> <th class="dimgray-header">Hypoglycemia: </th> <td><?php echo 'no' ?></td> </tr>
    <?php }?>
    <?php if ($visit['MedhistoryComplaint']['weight_gain'] == 'no') { ?>
        <tr> <th class="dimgray-header">Weight gain: </th> <td><?php echo 'no' ?></td> </tr>
    <?php }?>
    <?php if ($visit['MedhistoryComplaint']['hypo'] == 'no') { ?>
        <tr> <th class="dimgray-header">Renal or Genitourinary symptoms: </th> <td><?php echo 'no' ?></td> </tr>
    <?php }?>
    <?php if ($visit['MedhistoryComplaint']['gi_sx'] == 'no') { ?>
        <tr> <th class="dimgray-header">Gastrointestinal symptoms: </th> <td><?php echo 'no' ?></td> </tr>
    <?php }?>
    <?php if ($visit['MedhistoryComplaint']['chf'] == 'no') { ?>
        <tr> <th class="dimgray-header">Coronary heart disease: </th> <td><?php echo 'no' ?></td> </tr>
    <?php }?>
    <?php if ($visit['MedhistoryComplaint']['cvd'] == 'no') { ?>
        <tr> <th class="dimgray-header">Cardiovascular disease: </th> <td><?php echo 'no' ?></td> </tr>
    <?php }?>
    <?php if ($visit['MedhistoryComplaint']['bone'] == 'no') { ?>
        <tr> <th class="dimgray-header">Osteoporosis: </th> <td><?php echo 'no' ?></td> </tr>
    <?php }?>

  </table>