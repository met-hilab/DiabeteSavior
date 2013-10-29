<div class="row">
  <div class="col-lg-6 pull-right">
    <div class="input-group">
      <input type="text" class="form-control">
      <span class="input-group-btn">
        <button class="btn btn-default" type="button">Search</button>
      </span>
    </div><!-- /input-group -->
  </div><!-- /.col-lg-6 -->
</div><!-- /.row -->

<hr>
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
    <td><?php echo $u['Profile']['firstname'] . ' ' . $u['Profile']['lastname'];?></td>
    <td class="actions">
      <a class="btn btn-primary" href="/users/edit/<?php echo $u['User']['id'];?>"><span class="glyphicon glyphicon-edit"></span> Edit</a>

      <?php if(!$u['User']['activated']):?>
      <a class="btn btn-default" href="/users/activate/<?php echo $u['User']['id'];?>" data-method="patch"><span class="glyphicon glyphicon-ok-circle"></span> Activate</a>
      <?php else: ?>
      <a class="btn btn-warning" href="/users/deactivate/<?php echo $u['User']['id'];?>" data-method="patch"><span class="glyphicon glyphicon-remove-circle"></span> Dectivate</a>
      <?php endif; ?>
      <a class="btn btn-danger" href="/users/delete/<?php echo $u['User']['id'];?>" data-method="delete" data-confirm="Are you sure to delete this user and all the data related to this user?"><span class="glyphicon glyphicon-trash"></span> Delete</a>
    </td>
  </tr>
<?php endforeach; ?>
</table>

<hr>

<a type="button" class="btn btn-primary" href="/sign_up">New User</a>