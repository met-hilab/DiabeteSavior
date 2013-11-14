<h2>Glycemic Control Algorithm Results</h2>

<div class="col-md-9">
<form id="algorithm_results" class="form-horizontal" role="form" action="/visits/gcalgorithm" method="post">
 <table  class="table table-condensed">      
    <tr>
      <th>Algorithm Decision: </th> 
      <td> <?php echo $decision; ?> </td>
    </tr>
    <tr> 
      <th>Therapy: </th>
      <td><?php echo $therapy; ?></td>
    </tr>
    <?php if ($medicine1 != 'none') { ?>
    <tr> 
      <th>Medicine1: </th>
      <td><?php echo $medicine1; ?></td>
    </tr>
     <?php }?>
    <?php if ($medicine2 != 'none') { ?>
    <tr> 
      <th>Medicine2: </th>
      <td><?php echo $medicine2; ?></td>
    </tr>
     <?php }?>
    <?php if ($medicine3 != 'none') { ?>
    <tr> 
      <th>Medicine3: </th>
      <td><?php echo $medicine3; ?></td>
    </tr>
     <?php }?>
    <tr> 
      <th>Alert Message: </th>
      <td><?php echo $medalert; ?></td>
    </tr>
  </table>
<div class="control-group">
  <label class="" for="Accept"></label>
  <div class="">
    <button id="Accept" name="Accept" class="btn btn-primary">Accept</button>&nbsp;&nbsp;
    <a href="/visits/edit" class="btn btn-primary" style="padding-left:10px;">
		<span class="glyphicon glyphicon-edit"></span>Edit</a>
  </div>
</div>
</form>
</div>


