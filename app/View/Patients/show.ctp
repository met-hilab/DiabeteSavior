
<div class='row' style='padding: 5px 0 25px 0;'>
  <h2 class="section-title col-xs-12 col-sm-12 col-md-8" style="margin-bottom: 2px; margin-top:0; padding-bottom: 0;"><div style='font-family: sans-serif; color: darkgray; display: inline-block;'><?php
                       echo $patient['Patient']['patient_number'].' '; ?> </div>
                       <?php
                       echo $patient['Patient']['patient_lastname'].", ";
                       echo $patient['Patient']['patient_firstname']." ";
                       echo $patient['Patient']['patient_middlename'];
                      ?></h2>
         <h4 class="col-xs-12 col-sm-12 col-md-4" style="margin-bottom: 0; font-family: sans-serif; font-style: italic; text-align:right;"><?php
                       echo $patient['Patient']['gender'].',    Age ';
                       echo $age = calculateAge( date("F j, Y", strtotime($patient['Patient']['dob'])));;
                      ?></h4>
<!--                         
          <h4 class="col-xs-6 col-sm-6 col-md-4" style="padding: 2px 0 2px 0; margin-top: 0; margin-bottom: 0; text-align: right;"><small><em>dob </em></small><?php
                       echo $date = date("F j, Y", strtotime($patient['Patient']['dob']));;
                      // echo "<h4>Doris Lewis</h4>"
                      ?></h4>-->
</div>				  
<!--		     
            <h1 >Patient Information </h1>
			
			</br/>-->
			

            <!-----Add Three Buttons------------------------------------------>
<!--            <div style="padding-bottom:10px;">
           <a href="/visits/add" class="btn btn-primary" style="padding-left:5px;"><span class="glyphicon glyphicon-plus"></span> Add Visit</a>
           &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
           <a href="/patients/edit" class="btn btn-primary" style="padding-left:5px;"><span class="glyphicon glyphicon-edit"></span> Update Patient</a>
           &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
           <a href="/patients/delete" data-confirm="Do you want to delete this patient record?" data-method="delete" class="btn btn-primary" style="padding-left:5px;"><span class="glyphicon glyphicon-trash"></span> Delete Patient</a>
            </div>-->

<div class='patient-tabs'>
<ul class="nav nav-tabs">
 <li id="patient-tab-information" class="active nav-tab" data-tab-index="information">
   <a href="#information" data-toggle="tab">Patient Information</a>
 </li>
  <li id="patient-tab-visits" class="nav-tab" data-tab-index="visits">
   <a href="#visits" data-toggle="tab">Visits</a>
 </li>
 <li id="patient-tab-vitals" class="nav-tab" data-tab-index="vitals">
   <a href="#vitals" data-toggle="tab">Vitals & Labs</a>
 </li>
 <li id="patient-tab-allergies" class="nav-tab" data-tab-index="allergies">
   <a href="#allergies" data-toggle="tab">Drug Allergies</a>
 </li>
 <li id="patient-tab-history" class="nav-tab" data-tab-index="history">
   <a href="#history" data-toggle="tab">Medical History</a>
 </li>
 <li id="patient-tab-medications" class="nav-tab" data-tab-index="medications">
   <a href="#medications" data-toggle="tab">Medications</a>
 </li>
 <li id="patient-tab-charts" class="nav-tab" data-tab-index="charts">
   <a href="#charts" data-toggle="tab">Charts</a>
 </li>
</ul><!-- end pt tab list -->


<!-- start patient information tab -->
<div id="patient-tab-content" class="tab-content" style="height:auto;overflow:visible;">
    <div id="information" class="tab-pane active">
<!--      <button type="button" class="btn btn-primary btn-update-patient" 
              style="padding:5px; float: right;">
        <span class="glyphicon glyphicon-edit"></span>
        Update Patient</button>
      <button type="submit" class="btn btn-primary btn-delete-patient"
              style="padding:5px; float: right;" method="POST">
        <span class="glyphicon glyphicon-trash"></span> 
        Delete Patient</button>-->
      <div style="padding:5px; display: inline-block;">
            <a href="/patients/edit" class="btn btn-primary" style="padding:5px; float: right;"><span class="glyphicon glyphicon-trash"></span> Update Patient</a>
      </div>
      <div style="padding:5px; display: inline-block;">
            <a href="/patients/delete" data-confirm="Do you want to delete this patient record?" data-method="delete" class="btn btn-primary" style="padding:5px; float: right;"><span class="glyphicon glyphicon-trash"></span> Delete Patient</a>
      </div>
        <div class='col-md-8'>
        <div style="padding: 15px 15px 15px 0;"class="col-md-6">
          <div style="font-size: large; font-family: sans-serif; font-weight: bold;">DOB 
            <div style="display: inline-block; font-weight: normal; font-size: medium; font-family: sans-serif;"><?php echo $date = date("F j, Y", strtotime($patient['Patient']['dob']));; ?></div>
          </div>
          <div style="font-size: large; font-family: sans-serif; font-weight: bold;">Race 
            <div style="display: inline-block; font-weight: normal; font-size: medium; font-family: sans-serif;"><?php echo $patient['Patient']['race']?: 'N/A';?></div>
          </div>
           <?php if ($patient['Patient']['occupation']!=null) {?>
              <div style="font-size: large; font-family: sans-serif; font-weight: bold;">Occupation 
                <div style="display: inline-block; font-weight: normal; font-size: medium; font-family: sans-serif;"><?php echo $patient['Patient']['occupation']; ?></div>
              </div>
          <?php }?>
        </div>
         <?php if ($patient['Patient']['street']!=null && $patient['Patient']['city'] != null) {?>
            <div style="padding: 15px 15px 15px 0;"class="col-md-6">
              <div style="font-size: large; font-family: sans-serif; font-weight: bold;">Address</div>
              <div style="font-size: medium; font-family: sans-serif;">
                <?php echo $patient['Patient']['street'];?>
              </div>
              <div style="font-size: medium; font-family: sans-serif;">
                <?php echo $patient['Patient']['city'],", ";
                      echo $patient['Patient']['state']." ";
                      echo $patient['Patient']['postal_code'];?>
              </div>
           </div>
          <?php }?>
          

        </div>
                   
                    <!-- Patient Diagnoses -->
                                    
        <div class="col-md-8">
          <h3>Diagnosis </h3> 
          <?php if ($patient[ 'Diagnosis' ] == null) {?>
          <div style='font-family: sans-serif; color: dimgray;'>Type II Diabetes Mellitus</div>
          <?php } ?>
          <?php if ($patient[ 'Diagnosis' ] != null) {?>
          <table class="table table-condensed">
            <thead>
                <tr>
                    <th>Diagnosis</th>
                    <th>ICD-9</th>
                    <th>ICD-10</th>
                    </tr>
            </thead>
            <?php foreach($patient[ 'Diagnosis' ] as $diagnosis ) :?>
            <tbody>
              <tr>
                <td><?php echo $diagnosis['dxname']?>
                <td><?php echo $diagnosis['icd9code']?>
                <td><?php echo $diagnosis['icd10code']?>
              </tr>
             </tbody>
              <?php endforeach; ?>
          </table>
          <?php } ?>
        </div>
        <br clear="all">               
  </div><!-- end patient diagnosis tab -->
  
  
  <!-- start visits tab -->       
  <div id="visits" class="tab-pane">
    <div style="padding:5px; display: inline-block;">
      <a href="/visits/add" class="btn btn-primary" style="padding-left:5px; float: right;"><span class="glyphicon glyphicon-plus"></span> Add Visit</a>
    </div>
    <div class="col-md-8">
      <h3>Visit history </h3> 
        <table class="table table-hover">
        <?php 
        if ($patient['Visit']==null)
            echo 'This patient does not have visit history';
        foreach($patient[ 'Visit' ] as $visit ):?>
        <tbody>
          <tr>
            <td>
              <?php echo $this->Html->link($date = date("F j, Y", strtotime($visit['created'])), array('controller' => 'visits', 'action' => 'show', $visit['id'])); ?>
            </td>
          </tr>
          </tbody>
        <?php endforeach;?> 
        </table>
      </div>         
    </div><!-- end visits tab -->
  
  
    <!-- start vitals tab -->
    <div id="vitals" class="tab-pane">
       <div class="col-md-8">


      <h3>Vitals and Lab Results <?php if ($lastVisit['Visit']!=null) { ?>as of last visit on <?php echo $lastVisitDate; }?></h3> 
           <table  class="table table-condensed">
                  <?php 
                  if ($lastVisit['Visit']==null){
                  echo 'This patient does not have any Vitals or Lab Results recorded.';} 
                  else{ ?>
	
	    <tr>
            <th class="dimgray-header">Weight: </th> 
            <td> <?php echo $lastVisit['VitalsLab']['weight']?: 'unknown'; ?> </td>
			<td>  </td>
        </tr>

        <tr> 
            <th class="dimgray-header">Height: </th>
            <td><?php echo $lastVisit['VitalsLab']['height']?: 'unknown'; ?> </td>
			<td>  </td>
        </tr>
        <tr>  
            <th class="dimgray-header">BMI: </th>
            <td><?php echo $lastVisit['VitalsLab']['bmi']?: 'unknown'; ?> kg/m<sup>2</sup> </td>
			<td> (18.5 - 25.0 kg/m<sup>2</sup>) </td>
        </tr>
        <tr>  
            <th class="dimgray-header">Weight Classification: </th>
            <td><?php echo $lastVisit['VitalsLab']['bmi_status']?: 'unknown'; ?></td>
			<td>  </td>
        </tr>
        <tr> 
            <th class="dimgray-header">Glycated Hemoglobin (A1C): </th>
            <td><?php echo $lastVisit['VitalsLab']['A1c']?: 'unknown'; ?> %</td>
			<td> (4.5 - 5.7%) </td>
        </tr>

        <tr>
             <th class="dimgray-header">Systolic Blood Pressure: </th>
             <td><?php echo $lastVisit['VitalsLab']['bps']?: 'unknown';?>  mmHg</td>
		     <td> (90 - 120 mmHg)</td>
        </tr>

        <tr>
            <th class="dimgray-header">Diastolic Blood Pressure: </th>
            <td><?php echo $lastVisit['VitalsLab']['bpd']?: 'unknown';?> mmHg</td>
			<td> (60 - 80 mmHg)</td>
        </tr>
                  <?php } ?>
		
</table>
</div> 

    </div><!-- end vitals tab -->
  
  
    <!-- start allergies tab -->
    <div id="allergies" class="tab-pane">
      <!-- Patient Drug Allergies -->
      <div class="col-md-8">
      <h3>Drug Allergies or Contraindications</h3> 
        <?php echo $this->element('drug_allergies_table'); ?>
      </div>
     </div><!-- end allergies tab -->
  
  
  
      <!-- start med history tab -->
     <div id="history" class="tab-pane">
      <!-- Medical History and Complaints -->
      <div class="col-md-8">
        <h3>Medical History and Complaints <?php if ($lastVisit['Visit']!=null) { ?>as of last visit on <?php echo $lastVisitDate; }?></h3> 
                <?php 
                  if ($lastVisit['Visit']==null){
                  echo 'This patient does not have any Medical History or Complaints recorded.';} 
                  else{ 
                    echo $this->element('medhistory_complaints_table'); 
                } ?>
      </div> 
    </div><!-- end med history tab -->
    
    
  <!-- start medications tab -->
    <div id="medications" class="tab-pane">
      
<!--       <div style="padding:5px; display: inline-block;">
                       <a href="/visits/gcalgorithm" class="btn btn-primary" style="padding-left:5px;">
         <span class=""></span>Run Algorithm</a>
        <button class="btn btn-primary btn-run-algorithm col-md-offset-8" style="padding-left:5px; float: right;">Run Algorithm</button
       </div>-->
      <div class="col-md-8">
        <h3>Treatment <?php if ($lastTDate) { ?>from decision on <?php echo $lastTDate; }?></h3> 
          <table  class="table table-condensed">
            <?php 
            if ($lastTDate == null){
            echo 'Therapy and medications have not been recommended yet.';} 
            else{ ?>  
        
<!--        <form id="algorithm_results" class="form-horizontal" role="form" action="/visits/gcalgorithm" method="post">-->
            
            <tr>
              <th>Therapy: </th>
              <td><?php echo $lastTreatmentRunAlg['TreatmentRunAlgorithm']['type']; ?></td>
            </tr>
            <?php if ($lastTreatmentRunAlg['TreatmentRunAlgorithm']['medicine_name_one'] != 'none') { ?>
            <tr> 
              <th>Medicine1: </th>
              <td><?php echo $lastTreatmentRunAlg['TreatmentRunAlgorithm']['medicine_name_one']; ?></td>
            </tr>
            <?php }?>
            <?php if ($lastTreatmentRunAlg['TreatmentRunAlgorithm']['medicine_name_two'] != 'none') { ?>
            <tr> 
              <th>Medicine2: </th>
              <td><?php echo $lastTreatmentRunAlg['TreatmentRunAlgorithm']['medicine_name_two']; ?></td>
            </tr>
            <?php }?>
            <?php if ($lastTreatmentRunAlg['TreatmentRunAlgorithm']['medicine_name_three'] != 'none') { ?>
            <tr> 
              <th>Medicine3: </th>
              <td><?php echo $lastTreatmentRunAlg['TreatmentRunAlgorithm']['medicine_name_three']; ?></td>
            </tr>
            <?php }?>
            <?php } ?>
          </table>
<!--        <div class="control-group">
          <label class="" for="Accept"></label>
          <div class="">
            <button id="Accept" name="Accept" class="btn btn-primary">Accept</button>&nbsp;&nbsp;
            <a href="/visits/edit" class="btn btn-primary" style="padding-left:10px;">
               <span class="glyphicon glyphicon-edit"></span>Edit</a>
          </div>
        </div>-->
      </form>
    </div>
    </div><!-- end medications tab -->
    
    
    <!-- start charts tab -->
    <div id="charts" class="tab-pane">
     
    </div><!-- end charts tab -->
    
    
  </div><!-- end pt tab content -->
</div><!-- end patient-tabs -->		   


<script>
  $('.btn-update-patient').click(function () {
    window.location.href = '/patients/edit';
    });//end .click
    $('.btn-delete-patient').click(function () {
      var result = confirm("Are you sure you want to delete this patient?");
      if (result==true) {
         
          window.location.href = '/patients/delete';
      }
    });//end .click
    
     $('.btn-run-algorithm').click(function () {
       
          window.location.href = '/visits/';
      
    });//end .click
    
    
 </script>
 