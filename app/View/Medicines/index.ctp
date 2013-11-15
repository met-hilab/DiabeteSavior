




<h1> List of Medicines: </h1>
<!-- DO NOT USE BR TO LAYOUT, USE CSS -->
    <div style="padding:5px; display: inline-block;">
      <a href="/medicines/add" class="btn btn-primary" style="padding-left:5px; float: right;"><span class="glyphicon glyphicon-plus"></span> Add Medicine</a>
    </div>

<table class="table table-hover" >
<thead>
    <tr>
	   <th>#</th>
       <th>Name</th>
       <th>min_dose</th>
	   <th>max_dose</th>
	   <th>unit</th>
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
  <td><?php echo $this->Html->link($m['Medicine']['medicine_name'], array('controller' => 'medicines', 'action' => 'show', $m['Medicine']['id']), array('data-id' => $p['Medicine']['id'])); ?></td>
	  <td><?php echo $m['Medicine']['min_dose'];?></td>
    <td><?php echo $m['Medicine']['max_dose'];?></td>
    <td><?php echo $m['Medicine']['unit'];?></td>
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
