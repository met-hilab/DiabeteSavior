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

<table class="table table-striped">
<?php foreach($users as $u) :?>
  <tr>
    <td><?php echo $u['User']['email'];?></td>
    <td><?php echo $u['User']['firstname'] . ' ' . $u['User']['lastname'];?></td>
    <td><a class="btn btn-danger" href="/users/delete/<?php echo $u['User']['id'];?>" data-method="delete" data-confirm="Are you sure to delete this user and all the data related to this user?"><span class="glyphicon glyphicon-trash"></span> Delete</a></td>
  </tr>
<?php endforeach; ?>
</table>

<hr>

<a type="button" class="btn btn-primary" href="/users/add">New User</a>