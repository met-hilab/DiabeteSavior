








<h2>hi garima <h2>
<h2>All users information <h2>
<table>
<tr>
<th>First name</th>
<th>Last name</th>
</tr>
<?php foreach($Medicines as $Medicine): ?>

<tr>
<td><?php echo $Medicine['Medicine']['medicine_name']; ?></td>
<td><?php echo $Medicine['Medicine']['min_dose']; ?></td>
</tr>

<?php endforeach ?>
</table>