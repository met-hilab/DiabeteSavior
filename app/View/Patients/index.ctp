
<h1> List of Patients: </h1>
<!-- DO NOT USE BR TO LAYOUT, USE CSS -->
<?php echo $this->Paginator->numbers(array('first' => 2, 'last' => 2)); ?>
<table class="table table-hover" >
<thead>
  <tr>
    <th>#</th>
    <th>Patient ID</th> <!-- refers to patient_number field in database -->
    <th>First Name</th>
    <th>Middle Name</th>
    <th>Last Name</th>
    <th>DOB</th>
    <th>Registered</th>
    <th>Created by</th>
  </tr>
</thead>
<tbody>
<?php $counter = 1;?>
<?php foreach($patients as $p) :?>
  <tr>
    <td><?php echo $counter; ?></td>
    <td><?php echo $this->Html->link($p['Patient']['patient_number'], array('controller' => 'patients', 'action' => 'show'), array('data-id' => $p['Patient']['id'], 'class' => 'btn btn-default link-to-patient')); ?></td>
    <td><?php echo $p['Patient']['patient_firstname'];?></td>
  	<td><?php echo $p['Patient']['patient_middlename'];?></td>
    <td><?php echo $p['Patient']['patient_lastname'];?></td>
    <td><?php echo $date = date("F j, Y", strtotime($p['Patient']['dob']));?></td>
  	<td><?php echo $date = date("F j, Y", strtotime($p['Patient']['created']));?></td>
	<td><?php echo $p['User']['email'];?></td>
  </tr>
 <?php $counter++;?> 
<?php endforeach; ?>
</tbody>
</table>
<?php echo $this->Paginator->numbers(array('first' => 2, 'last' => 2)); ?>

<script>
$(document).ready(function(){
$('.link-to-patient').click(function(){
  id = $(this).data('id');
  $.post(webroot + 'patients/set_patient_id', {'id':id}, function(res){
    if(res.status) {
      window.location.href = webroot + 'patients/show';
    } else {
      alert('Wrong patient id!');
    }
  }, 'json');
  return false;
});
});
</script>