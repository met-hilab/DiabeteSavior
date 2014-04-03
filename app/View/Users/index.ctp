<style>
.user-table td.actions, .user-table th.actions {
  width: 300px;
}
.user-table a.btn {
  /* width: 120px; */ 

}
</style>
<table class="table table-striped user-table">
<?php foreach($users as $u): ?>
  <tr>
    <td><?php echo $u['User']['email'];?></td>
    <td>
      <?php echo $u['Profile']['firstname'] . ' ' . $u['Profile']['lastname'];?>
      <?php if ($u['User']['role'] > 0): ?>
      <span class="label label-info pull-right">
        <span class="glyphicon glyphicon-star"></span> Admin
      </span>
      <?php endif; ?>
    </td>
    <td class="actions">
      <a class="btn btn-primary" href="<?php echo $this->webroot; ?>users/edit/<?php echo $u['User']['id'];?>"><span class="glyphicon glyphicon-edit"></span> Edit</a>

      <?php if($u['User']['id'] != 1): ?>
        <?php if(!$u['User']['activated']):?>
        <a class="btn btn-default" href="<?php echo $this->webroot; ?>users/activate/<?php echo $u['User']['id'];?>" data-method="patch"><span class="glyphicon glyphicon-ok-circle"></span> Activate</a>
        <?php else: ?>
        <a class="btn btn-warning" href="<?php echo $this->webroot; ?>users/deactivate/<?php echo $u['User']['id'];?>" data-method="patch"><span class="glyphicon glyphicon-remove-circle"></span> Dectivate</a>
        <?php endif; ?>
        <a class="btn btn-danger" href="<?php echo $this->webroot; ?>users/delete/<?php echo $u['User']['id'];?>" data-method="delete" data-confirm="Are you sure to delete this user and all the data related to this user?"><span class="glyphicon glyphicon-trash"></span> Delete</a>
      <?php endif; ?>
    </td>
  </tr>
<?php endforeach; ?>
</table>

<hr>

<a type="button" class="btn btn-primary" href="<?php echo $this->webroot; ?>users/new_user">New User</a>