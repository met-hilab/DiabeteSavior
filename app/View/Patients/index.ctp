
<br/>

<h1> List of Patients: </h1>

<br/>
<br/>


<table class="table table-hover">
<thead>
    <tr>
        <th>Patient Number</th>
        <th>First Name</th>
    <th>Last Name</th>
    <th>DOB</th>
        <th>Registered</th>
    </tr>
</thead>
<?php foreach($patients as $p) :?>
<tbody>
  <tr>
    <td><?php echo $this->Html->link($p['Patient']['patient_number'], array('controller' => 'patients', 'action' => 'show', $p['Patient']['id'])); ?></td>
    <td><?php echo $p['Patient']['patient_firstname'];?></td>
    <td><?php echo $p['Patient']['patient_lastname'];?></td>
    <td><?php echo $p['Patient']['dob'];?></td>
  <td><?php echo $date = date("F j, Y", strtotime($p['Patient']['created']));?></td>
  </tr>
  </tbody>
<?php endforeach; ?>
</table>


