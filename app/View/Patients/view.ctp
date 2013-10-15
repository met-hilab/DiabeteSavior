
<!DOCTYPE html>
<html lang="en">

  <body>
    <div class="container">
      <div class="row row-offcanvas row-offcanvas-right">
  <!------Patient Information ------------------------------------------------------------------------------------------------------>
        <div class="col-xs-12 col-sm-9">
          <p class="pull-right visible-xs">
            <button type="button" class="btn btn-primary btn-xs" data-toggle="offcanvas">Toggle nav</button>
          </p>
          <div class="jumbotron">          
            <h2>View Patient</h2>
            <br>         
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
                                 echo $patient['Patient']['dob'];
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
                                 echo $patient['Patient']['occupation'];
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
                                 echo $patient['Patient']['race'];
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
                                 echo $patient['Patient']['gender'];
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
                                 echo $patient['Patient']['street'];
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
                                 echo $patient['Patient']['city'];
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
                                 echo $patient['Patient']['state'];
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
                                 echo $patient['Patient']['pastal_code'];
                               //  echo "<h4>02215</h4>";
                                ?>
                            </div>
                        </div>
                </div><!--/span-->
         
            
          </div><!--/row-->
         
            </div>
            <br> 
            
     <!-----Add Three Buttons------------------------------------------>
           <a href="#" class="btn btn-lg btn-primary"><span class="glyphicon glyphicon-plus"></span> Add Visit</a>
           &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
           <a href="#" class="btn btn-lg btn-primary"><span class="glyphicon glyphicon-edit"></span> Update Patient</a>
           &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
           <a href="#" class="btn btn-lg btn-primary"><span class="glyphicon glyphicon-trash"></span> Delete Patient</a>
          <?php
            ?>
          </div>
          
 <!--------------------Save For Further Information like Allegic etc-------------------------------------------------------------------------->
          <div class="row">
            <div class="col-6 col-sm-6 col-lg-12">
                <div class="col-1 col-lg-1">
                </div>
                <div class ="col-6 col-lg-6">
              <div class="row">
                            <div class ="col-6 col-lg-6">
                                <?php
                                 echo "<h4>Allergies  :</h4>"
                                ?>
                            </div>
                            <div class ="col-6 col-lg-6">
                                <?php
                                 echo $patient['Patient']['Patient_Allergic'];
                                 echo "<h4>None</h4>";
                                ?>
                            </div>
                        </div>
                <div class="row">
                            <div class ="col-6 col-lg-6">
                                <?php
                                 echo "<h4>Dignosis  :</h4>"
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
                                 echo $patient['Patient']['Patient_Medication'];
                                 echo "<h4>Medicine 1, 2,3</h4>";
                                ?>
                            </div>
                        </div>
            </div><!--/span-->
            </div>
            
          </div><!--/row-->
        </div><!--/span-->
        
<!-------------------------side bar --appointment history------------------------------------------------------------------------------->
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
        </div><!--/span-->
      </div><!--/row-->

      <hr>

    </div><!--/.container-->



    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="../../assets/js/jquery.js"></script>
    <script src="../../dist/js/bootstrap.min.js"></script>
    <script src="offcanvas.js"></script>
  </body>
</html>

