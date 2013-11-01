
<h1> List of Patients: </h1>
<!-- DO NOT USE BR TO LAYOUT, USE CSS -->
<table class="table table-hover">
<thead>
    <tr>
    <th>Patient Number</th>
    <th>First Name</th>
		<th>Last Name</th>
		<th>DOB</th>
    <th>Registered</th>
    </tr>
</thead>
<tbody>
<?php foreach($patients as $p) :?>
  <tr>
    <td><?php echo $this->Html->link($p['Patient']['patient_number'], array('controller' => 'patients', 'action' => 'show'), array('data-id' => $p['Patient']['id'], 'class' => 'btn btn-default link-to-patient')); ?></td>
    <td><?php echo $p['Patient']['patient_firstname'];?></td>
    <td><?php echo $p['Patient']['patient_lastname'];?></td>
    <td><?php echo $p['Patient']['dob'];?></td>
  	<td><?php echo $date = date("F j, Y", strtotime($p['Patient']['created']));?></td>
  </tr>
<?php endforeach; ?>
</tbody>
</table>

<script>
$(document).ready(function(){
$('.link-to-patient').click(function(){
  id = $(this).data('id');
  $.post('/patients/set_patient_id', {'id':id}, function(res){
    if(res.status) {
      window.location.href = '/patients/show';
    } else {
      alert('Wrong patient id!');
    }
    
  }, 'json');
  return false;
});
});
</script>