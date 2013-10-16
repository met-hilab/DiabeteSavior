<h2>Index</h2>

<table>
	<tr>
		<th>visit_id</th>
		<th>patient_id</th>
		<th>created</th>
		<th>modified</th>
		<th>patient_number</th>
	</tr>
	
	<?php foreach($visits as $visits): ?>  
	
	<tr>
		<th><?php echo $visits['Visit']['id']; ?></th> 
		<th><?php echo $visits['Visit']['patient_id']; ?></th>
		<th><?php echo $visits['Visit']['created']; ?></th>
		<th><?php echo $visits['Visit']['modified']; ?></th>
		<th><?php echo $visits['Patient']['patient_number']; ?></th> 
	</tr>

    <?php endforeach ?>

</table>