<!--
    <div class="container">
      <div class="row row-offcanvas row-offcanvas-right">
  ----Patient Information ----------------------------------------------------------------------------------------------------
        <div class="col-xs-12 col-sm-9">
          <p class="pull-right visible-xs">
            <button type="button" class="btn btn-primary btn-xs" data-toggle="offcanvas">Toggle nav</button>
          </p>
                  -->
            <h2 class="section-title" style="padding-bottom: 0;">View Patient</h2>
            <!-----Add Three Buttons------------------------------------------>
            <div style="padding-bottom:10px;">
           <a href="/visits/add" class="btn btn-primary" style="padding-left:5px;"><span class="glyphicon glyphicon-plus"></span> Add Visit</a>
<!--           &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-->
           <a href="/patients/edit" class="btn btn-primary" style="padding-left:5px;"><span class="glyphicon glyphicon-edit"></span> Update Patient</a>
<!--           &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-->
           <a href="/patients/delete" data-confirm="Do you want to delete this patient record?" date-method="delete" class="btn btn-primary" style="padding-left:5px;"><span class="glyphicon glyphicon-trash"></span> Delete Patient</a>
            </div>
           <!--            <br> -->
            <div class="jumbotron" style="padding-bottom:0;">  
            <div class ="col-2">
                
                <!---First Column----------------------------------------->
                <div class="row">
                    <div class="col-6 col-sm-6 col-lg-6">
                        <div class="row">
                            <div class ="col-6 col-lg-6">
                                <?php
                                 echo "<h4>ID  :</h4>"
                                ?>
                            </div>
                            <div class ="col-6 col-lg-6">
                                <?php
                                 echo $patient['Patient']['patient_number'];
                                // echo "<h4>9527(TestID)</h4>"
                                ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class ="col-6 col-lg-6">
                                <?php
                                 echo "<h4>Name  :</h4>"
                                ?>
                            </div>
                            <div class ="col-6 col-lg-6">
                                <?php
                                 echo $patient['Patient']['patient_firstname'];
                                 echo $patient['Patient']['patient_middlename'];
                                 echo $patient['Patient']['patient_lastname'];
                                // echo "<h4>Doris Lewis</h4>"
                                ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class ="col-6 col-lg-6">
                                <?php
                                 echo "<h4>Birthdate  :</h4>"
                                ?>
                            </div>
                            <div class ="col-6 col-lg-6">
                                <?php
                                 echo $patient['Patient']['dob'] ?: 'N/A';
                                // echo "<h4>08/06/1990</h4>"
                                ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class ="col-6 col-lg-6">
                                <?php
                                 echo "<h4>Occupation  :</h4>"
                                ?>
                            </div>
                            <div class ="col-6 col-lg-6">
                                <?php
                                 echo $patient['Patient']['occupation'] ?: 'N/A';
                                // echo "<h4>Student</h4>"
                                ?>
                            </div>
                        </div>
                         <div class="row">
                            <div class ="col-6 col-lg-6">
                                <?php
                                 echo "<h4>Race  :</h4>"
                                ?>
                            </div>
                            <div class ="col-6 col-lg-6">
                                <?php
                                 echo $patient['Patient']['race'] ?: 'N/A';
                                // echo "<h4>Native American</h4>";
                                ?>
                            </div>
                        </div>
                    </div><!--/span-->
                    
                    
                <!-----------Second Column--------------------->
                <div class="col-6 col-sm-6 col-lg-6">
                        <div class="row">
                            <div class ="col-6 col-lg-6">
                                <?php
                                 echo "<h4>Gender  :</h4>"
                                ?>
                            </div>
                            <div class ="col-6 col-lg-6">
                                <?php
                                 echo $patient['Patient']['gender'] ?: 'N/A';
                                 //echo "<h4>Female</h4>";
                                ?>
                            </div>
                        </div>
                       <div class="row">
                            <div class ="col-6 col-lg-6">
                                <?php
                                 echo "<h4>Street Address  :</h4>"
                                ?>
                            </div>
                            <div class ="col-6 col-lg-6">
                                <?php
                                 echo $patient['Patient']['street'] ?: 'N/A';
                                // echo "<h4>44 Cummington St</h4>";
                                ?>
                            </div>
                        </div>
                    
                    <div class="row">
                            <div class ="col-6 col-lg-6">
                                <?php
                                 echo "<h4>City  :</h4>"
                                ?>
                            </div>
                            <div class ="col-6 col-lg-6">
                                <?php
                                 echo $patient['Patient']['city'] ?: 'N/A';
                                // echo "<h4>Boston</h4>";
                                ?>
                            </div>
                        </div>
                    <div class="row">
                            <div class ="col-6 col-lg-6">
                                <?php
                                 echo "<h4>State  :</h4>"
                                ?>
                            </div>
                            <div class ="col-6 col-lg-6">
                                <?php
                                 echo $patient['Patient']['state'] ?: 'N/A';
                                // echo "<h4>Massachusetts</h4>";
                                ?>
                            </div>
                        </div>
                    <div class="row">
                            <div class ="col-6 col-lg-6">
                                <?php
                                 echo "<h4>Postal code  :</h4>"
                                ?>
                            </div>
                            <div class ="col-6 col-lg-6">
                                <?php
                                 echo $patient['Patient']['postal_code'] ?: 'N/A';
                               //  echo "<h4>02215</h4>";
                                ?>
                            </div>
                        </div>
                </div><!--/span-->
         
            
          </div><!--/row-->
         
            </div>
            <br> 
            
     
          <?php
            ?>
          </div>
          
 <!--------------------Save For Further Information like Allegic etc-------------------------------------------------------------------------->
          <div class="row">
            <div class="col-6 col-sm-6 col-lg-12">
<!--                <div class="col-1 col-lg-1">
                </div>-->
                <div class ="col-6 col-lg-6">
              <div class="row">
                            <div class ="col-6 col-lg-6">
                                <?php
                                 echo "<h4>Allergies  :</h4>"
                                ?>
                            </div>
                            <div class ="col-6 col-lg-6">
                                <?php
                                 echo '<h4>';
                                 echo $patient['Patient']['Patient_Allergic'] ?: 'N/A';
                                 echo '</h4>';
//                                 echo "<h4>None</h4>";
                                ?>
                            </div>
                        </div>
                <div class="row">
                            <div class ="col-6 col-lg-6">
                                <?php
                                 echo "<h4>Diagnosis  :</h4>"
                                ?>
                            </div>
                            <div class ="col-6 col-lg-6">
                                <?php
                                 echo $patient['Patient']['Patient_Dignosis'];
                                 echo "<h4>Diabetes</h4>";
                                ?>
                            </div>
                        </div>
                <div class="row">
                            <div class ="col-6 col-lg-6">
                                <?php
                                 echo "<h4>Medication  :</h4>"
                                ?>
                            </div>
                            <div class ="col-6 col-lg-6">
                                <?php
                                echo '<h4>';
                                 echo $patient['Patient']['Patient_Medication'] ?: 'N/A';
                                 echo '</h4>';
//                                 echo "<h4>Medicine 1, 2,3</h4>";
                                ?>
                            </div>
                        </div>
            </div><!--/span-->
            </div>
            
          </div><!--/row-->
        <!--</div><!--/span-->
        
<!-------------------------side bar --appointment history------------------------------------------------------------------------------->
<!--
        <div class="col-xs-6 col-sm-3 sidebar-offcanvas" id="sidebar" role="navigation">
          <div class="well sidebar-nav">
              <h4>Appointment History</h4>
              <p>First</p>
              <p>Second</p>
              <p>Third</p>
              <p>Fourth</p>
              <p>Fifth</p>
              <p>Sixth</p>
              <p>Seventh</p>
              <p>Eighth</p>
              <p>Ninth</p>
              <p>Tenth</p>
             
          </div><!--/.well -->
        <!--</div><!--/span-->
     <!-- </div><!--/row-->
      

<!--      <hr>-->

   <!-- </div><!--/.container-->



    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="../../assets/js/jquery.js"></script>
    <script src="../../dist/js/bootstrap.min.js"></script>
    <script src="offcanvas.js"></script>

