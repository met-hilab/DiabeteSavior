<h2>Add Visit</h2>  

       
<h3>Demographics</h3>                  
  <table  class="table table-condensed">      
    <tr>
      <th>Patient Number: </th> 
      <td> <?php echo $patient['Patient']['patient_number']; ?> </td>
    </tr>
    <tr> 
      <th>First Name: </th>
      <td><?php echo $patient['Patient']['patient_firstname']." ";
                echo $patient['Patient']['patient_middlename']; ?></td>
    </tr>
    <tr> 
      <th>Last Name: </th>
      <td><?php echo $patient['Patient']['patient_lastname'] ?></td>
    </tr>
    <tr>
      <th>DOB: </th>
      <td><?php echo $patient['Patient']['dob']?></td>
    </tr>
  </table> 
  
<hr>


<?php echo $this->element('visit_form'); ?>
