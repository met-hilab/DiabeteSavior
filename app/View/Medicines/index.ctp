




<h1> List of Medicines: </h1>
<!-- DO NOT USE BR TO LAYOUT, USE CSS -->
<table class="table table-hover" >
<thead>
    <tr>
	   <th>#</th>
       <th>Name</th>
       <th>min_dose</th>
	   <th>max_dose</th>
	   <th>metric</th>
	   <th>hypo</th>
       <th>weight</th>
	   <th>renal_gu</th>
	   <th>gi_sx</th>
	   <th>chf</th>
	   <th>cvd</th>
	   <th>bone</th>
    </tr>
</thead>
<tbody>

<?php $counter = 1;?>
<?php foreach($medicines as $m) :?>
  <tr>
     <td><?php echo $counter; ?></td>
    <td><?php echo $this->Html->link($m['Medicine']['medicine_name'], array('controller' => 'medicines', 'action' => 'show'), array('data-id' => $m['Medicine']['id'], 'class' => 'btn btn-default link-to-medicine')); ?></td>
	<td><?php echo $m['Medicine']['min_dose'];?></td>
    <td><?php echo $m['Medicine']['max_dose'];?></td>
    <td><?php echo $m['Medicine']['metric'];?></td>
    <td><?php echo $m['Medicine']['hypo'];?></td>
    <td><?php echo $m['Medicine']['weight'];?></td>
	<td><?php echo $m['Medicine']['renal_gu'];?></td>
    <td><?php echo $m['Medicine']['gi_sx'];?></td>
    <td><?php echo $m['Medicine']['chf'];?></td>
    <td><?php echo $m['Medicine']['cvd'];?></td>
    <td><?php echo $m['Medicine']['bone'];?></td>

	<td><?php echo $p['User']['email'];?></td>
  </tr>
 <?php $counter++;?> 
<?php endforeach; ?>
</tbody>
</table>

<script>
$(document).ready(function(){
$('.link-to-patient').click(function(){
  id = $(this).data('id');
  $.post('/medicines/set_medicine_id', {'id':id}, function(res){
    if(res.status) {
      window.location.href = '/medicines/show';
    } else {
      alert('Wrong medicine id!');
    }
    
  }, 'json');
  return false;
});
});
</script>