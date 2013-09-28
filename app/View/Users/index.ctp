<table>
<?php foreach($users as $u) :?>
  <tr>
    <td><?php echo $u['email'];?></td>
    <td><?php echo $u['firtstname'];?></td>
    <td><?php echo $u['lastname'];?></td>
  </tr>
<?php endforeach; ?>
</table>