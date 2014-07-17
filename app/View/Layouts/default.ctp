<?php
/**
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
$cakeDescription = __d('cake_dev', 'Diabetes Savior: Type II Diabetes Infomatic System');
?>
<!DOCTYPE html>
<html lang="en" ng-app>
<head>
  <?php echo $this->Html->charset(); ?>
  <title>
    <?php echo $cakeDescription ?>:
    <?php echo $title_for_layout; ?>
  </title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <?php
    echo $this->Html->meta('icon');
    echo $this->Html->css('bootstrap');
    echo $this->Html->css('ui-lightness/jquery-ui-1.10.3.custom.min');
    echo $this->Html->css('screen');
    echo $this->Html->css('font-awesome');
    echo $this->Html->css('ui-lightness/formvalidation');
    
    echo $this->Html->script('jquery-1.10.2.min.js');
    echo $this->Html->script('jquery-ujs.js');
    echo $this->Html->script('jquery-ui-1.10.3.custom.min');
    echo $this->Html->script('jquery.validate.min');
    echo $this->Html->script('flot/jquery.flot');
    echo $this->Html->script('flot/jquery.flot.time');
    echo $this->Html->script('flot/jquery.flot.navigate');
    echo $this->Html->script('moment.min');
		echo $this->Html->script('bootstrap');
    echo $this->Html->script('modernizr');
    echo $this->Html->script('main');
    echo $this->Html->script('jqBootstrapValidation');
    echo $this->Html->script('FormValidation');

    echo $this->fetch('meta');
    echo $this->fetch('css');
    echo $this->fetch('script');
  ?>
  <script>
    window.webroot="<?php echo $this->webroot; ?>";
  </script>
</head>
<body>
  <div id="container" class="container" style="min-height: 100%;">
    <nav class="navbar navbar-default" role="navigation" style="padding-top: 15px; border:none; background-color: #FFFFFF;">
      <!-- Brand and toggle get grouped for better mobile display -->
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a href="http://www.met-hilab.org/"><?php echo $this->Html->image('hilab-logo.png', array('alt' => 'MET HiLab')); ?></a>
      </div>

      <!-- Collect the nav links, forms, and other content for toggling -->
      <div class="collapse navbar-collapse navbar-ex1-collapse navbar-right">
        <ul class="nav navbar-nav">
          <li id="nav-home" <?php if($currentSelection == 'home'){echo "class='active'";}?>>

            <a href="<?php echo $this->webroot; ?>" data-toggle="tooltip" title="home">
              <span class="hidden-lg hidden-md">Home</span>
              
              <svg class="hidden-sm hidden-xs svg-normal" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="43px" height="33px" viewBox="0 0 43 33" enable-background="new 0 0 43 33" xml:space="preserve">
                <path fill="#999999" d="M26.449,11.963L23,8.492V2.67C23,2.118,22.508,2,21.955,2h-3C18.402,2,18,2.118,18,2.67v0.825l-2.289-2.266
                c-0.391-0.39-1.035-0.39-1.426,0L3.541,11.962c-0.286,0.286-0.375,0.881-0.22,1.255C3.476,13.591,3.838,14,4.242,14H7v5.67
                C7,20.223,7.403,21,7.955,21h14C22.508,21,23,20.223,23,19.67V14h2.72c0.404,0,0.78-0.409,0.935-0.782
                C26.81,12.844,26.735,12.248,26.449,11.963z M16,19h-2v-6h2V19z M21.955,12C21.402,12,21,12.117,21,12.67V19h-4v-7h-4v7H9v-6.33
                C9,12.117,8.507,12,7.955,12H6.657l8.324-8.485l3.267,3.183c0.287,0.286,0.74,0.33,1.112,0.175C19.734,6.719,20,6.312,20,5.908V4h1
                v4.907c0,0.265,0.083,0.685,0.271,0.872L23.305,12H21.955z" />
              </svg>
              
            </a>
          </li>
          <li><a href="<?php echo $this->webroot ?>pages/help">Help</a></li>
          <?php if(isset($current_user)): ?>
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Patients <b class="caret"></b></a>
            <ul class="dropdown-menu">
              <li><a href="<?php echo $this->webroot; ?>patients/add">Add Patient</a></li>
              <li><a href="<?php echo $this->webroot; ?>patients/search">Search Patient</a></li>
                <li><a href="<?php echo $this->webroot; ?>patients/">List Patients</a></li>
            </ul>
          </li>
          <?php endif; ?>
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Calculators <b class="caret"></b></a>
            <ul class="dropdown-menu">
              <li><a href="<?php echo $this->webroot; ?>calculators/bmi">Body Mass Index</a></li>
              <!--<li><a href="<?php echo $this->webroot; ?>calculators/bsa">Body Surface Area</a></li>-->
              <li><a href="<?php echo $this->webroot; ?>calculators/bgl">A1C to eAG Calculator</a></li>
              <li><a href="<?php echo $this->webroot; ?>calculators/diabetesrisk">Diabetes Risk</a></li>
            </ul>
          </li>

          <?php if(!isset($current_user)): ?>
          <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="<?php echo $this->webroot; ?>login">Login <b class="caret"></b></a>
            <ul class="dropdown-menu">
              <li>
                <form role="form" class="login-form" action="<?php echo $this->webroot; ?>do_login" method="post">
                  <div class="form-group">
                    <label for="email">Email address</label>
                    <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
                  </div>
                  <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="password" placeholder="Password" name="password">
                  </div>
                  <div class="checkbox">
                    <label>
                      <input type="checkbox" name="remember_me" value="yes"> Remember me for 90 days
                    </label>
                  </div>
                  <button type="submit" class="btn btn-default">Submit</button>
                </form>
                <a href="<?php echo $this->webroot; ?>forgot_password">Forgot password?</a>
              </li>
            </ul>
          </li>
          <li><a href="<?php echo $this->webroot; ?>sign_up">sign up</a></li>
          <?php else: ?>
            <?php if($current_user['role'] > 0): ?>
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Admin <b class="caret"></b></a>
            <ul class="dropdown-menu">
              <li><a href="<?php echo $this->webroot; ?>users/">User management</a></li>
              <li><a href="<?php echo $this->webroot; ?>medicines/">List Medicines</a></li>
              <li><a href="<?php echo $this->webroot; ?>patients/admin/">List All Patients</a></li>
              <!-- <li><a href="<?php echo $this->webroot; ?>announcements/">News & Announcements</a></li> -->
            </ul>
          </li>
            <?php endif; ?>
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">My Account <b class="caret"></b></a>
            <ul class="dropdown-menu">
              <li><a href="<?php echo $this->webroot; ?>my/change_password">Change password</a></li>
              <li><a href="<?php echo $this->webroot; ?>my/profile">Update profile</a></li>
              <li><a href="<?php echo $this->webroot; ?>logout">Logout</a></li>
            </ul>
          </li>
          <?php endif; ?>
        </ul>
      </div><!-- /.navbar-collapse -->
    </nav>
    <hr style="padding-top:0;">
    <div id="content" style="padding-bottom:45px; min-height: 500px;">
      <?php echo $this->Session->flash(); ?>
      <!-- The main content from controller / view START -->
      <?php echo $this->fetch('content'); ?>
      <!-- The main content from controller / view END -->
    </div>

    <footer id="footer">
      <ul class="list-inline bu-logo">
        <li><?php echo $this->Html->image('bu-logo-small.gif', array('alt' => 'BU Logo')); ?></li>
        <li><a href="http://www.met-hilab.org/" target="_blank">MET HI Lab</a></li>
      </ul>
      <!-- DISCLAIMER -->
        <p class="text-center disclaimer">
          DISCLAIMER:The patient records in this system are simplified simulations of
          Electronic Health Records (EHRs) for research and teaching purpose only. They
          are different from EHRs and do not comply with HIPAA. All patient data are
          fictional and no actual patient data are used.
        </p>
    </footer>
  </div>
</body>
</html>
