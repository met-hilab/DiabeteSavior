
<table class="table table-striped">
<?php foreach($patients as $p) :?>
  <tr>
    <td><?php echo $p['Patient']['first_name'];?></td>
    <td><?php echo $p['Patient']['last_name'];?></td>
    <td><?php echo $p['Patient']['dob'];?></td>
    <td><?php echo $p['Patient']['gender'];?></td>
  </tr>
<?php endforeach; ?>
</table>