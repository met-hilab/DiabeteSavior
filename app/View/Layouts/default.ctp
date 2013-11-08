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
<html lang="en">
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
                echo $this->Html->css('main');
                echo $this->Html->css('ui-lightness/formvalidation');

		echo $this->Html->script('jquery-1.10.2.min');
                echo $this->Html->script('jquery-ujs.js');
		echo $this->Html->script('jquery-ui-1.10.3.custom.min');
                echo $this->Html->script('jquery.validate.min');
		echo $this->Html->script('bootstrap');
                echo $this->Html->script('modernizr');
                echo $this->Html->script('main');
                echo $this->Html->script('jqBootstrapValidation'); //form validation
                echo $this->Html->script('FormValidation'); //newly added form validation



		//echo $this->Html->css('cake.generic');

		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
</head>
<body>

	<div id="container" class="container">

		<header id="header" class="header">
			<!--<h1><?php echo $this->Html->link($cakeDescription, '/'); ?></h1>-->
		</header>
		<nav class="navbar navbar-default" role="navigation" style="padding-top: 15px; border:none; background-color: #FFFFFF;">
  <!-- Brand and toggle get grouped for better mobile display -->
  <div class="navbar-header">
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse" 
      <span class="sr-only">Toggle navigation</span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </button>
      <img src="/img/hilab-logo.png"/>
  
  </div>

  <!-- Collect the nav links, forms, and other content for toggling -->
<!--  <div class="collapse navbar-collapse navbar-ex1-collapse">-->
<div class="nav container navbar-right">
    <ul class="nav navbar-nav">
<!--      <li class="active"><a href="/announcements">Home</a></li>-->
                        <li id="nav-home" <?php if($currentSelection == 'home')
                                                       {echo "class='active'";}?>>
                            <a href="/" data-toggle="tooltip" title="home">
                                          <svg class="svg-normal" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                                   width="43px" height="33px" viewBox="0 0 43 33" enable-background="new 0 0 43 33" xml:space="preserve">
                                                  <path fill="#999999" d="M26.449,11.963L23,8.492V2.67C23,2.118,22.508,2,21.955,2h-3C18.402,2,18,2.118,18,2.67v0.825l-2.289-2.266
                                                          c-0.391-0.39-1.035-0.39-1.426,0L3.541,11.962c-0.286,0.286-0.375,0.881-0.22,1.255C3.476,13.591,3.838,14,4.242,14H7v5.67
                                                          C7,20.223,7.403,21,7.955,21h14C22.508,21,23,20.223,23,19.67V14h2.72c0.404,0,0.78-0.409,0.935-0.782
                                                          C26.81,12.844,26.735,12.248,26.449,11.963z M16,19h-2v-6h2V19z M21.955,12C21.402,12,21,12.117,21,12.67V19h-4v-7h-4v7H9v-6.33
                                                          C9,12.117,8.507,12,7.955,12H6.657l8.324-8.485l3.267,3.183c0.287,0.286,0.74,0.33,1.112,0.175C19.734,6.719,20,6.312,20,5.908V4h1
                                                          v4.907c0,0.265,0.083,0.685,0.271,0.872L23.305,12H21.955z"/>
                                          </svg>
<!--                                          <svg class="svg-active" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                                   width="43px" height="33px" viewBox="0 0 43 33" enable-background="new 0 0 43 33" xml:space="preserve">
                                                  <path fill="#231F20" d="M26.492,11.981L23,8.002V2.644C23,2.091,22.508,2,21.955,2h-3C18.402,2,18,2.091,18,2.644v0.432
                                                          l-2.312-2.145c-0.396-0.371-1.03-0.359-1.41,0.03L3.533,11.944c-0.282,0.288-0.365,0.894-0.21,1.265C3.479,13.58,3.84,14,4.242,14H7
                                                          v5.644C7,20.196,7.402,21,7.955,21h14C22.508,21,23,20.196,23,19.644V14h2.72c0.394,0,0.761-0.408,0.923-0.768
                                                          C26.805,12.875,26.752,12.276,26.492,11.981z M17,19h-1.045H13v-6.356V12h4V19z"/>
                                          </svg>-->
                             </a>
                          </li>

      <?php if(isset($current_user)): ?>
      <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Patients <b class="caret"></b></a>
        <ul class="dropdown-menu">
          <li><a href="/patients/add">Add Patient</a></li>
          <li><a href="/patients/search">Search Patient</a></li>
            <li><a href="/patients/">List Patients</a></li>
        </ul>
      </li>
      <?php endif; ?>
      <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Calculators <b class="caret"></b></a>
        <ul class="dropdown-menu">
          <li><a href="/calculators/bmi">Body Mass Index</a></li>
<!--          <li><a href="/calculators/bsa">Body Surface Area</a></li>-->
          <li><a href="/calculators/bgl">Blood Glucose Level</a></li>
        </ul>
      </li>
      
  
    	<?php if(!isset($current_user)): ?>
    	<li class="dropdown">
    		<a class="dropdown-toggle" data-toggle="dropdown" href="/login">Login <b class="caret"></b></a>
    		<ul class="dropdown-menu">
    			<li>
						<form role="form" class="login-form" action="/do_login" method="post">
						  <div class="form-group">
						    <label for="exampleInputEmail1">Email address</label>
						    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email" name="email">
						  </div>
						  <div class="form-group">
						    <label for="exampleInputPassword1">Password</label>
						    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="password">
						  </div>
						  <div class="checkbox">
						    <label>
						      <input type="checkbox" name="remember_me"> Remember me
						    </label>
						  </div>
						  <button type="submit" class="btn btn-default">Submit</button>
						</form>
    			</li>
    		</ul>
    	</li>
      <li><a href="/sign_up">sign up</a></li>
      <?php else: ?>
      <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Admin <b class="caret"></b></a>
        <ul class="dropdown-menu">
          <li><a href="/users/">User management</a></li>
<!--          <li><a href="/patients/">Patient management</a></li>
          <li><a href="/announcements/">News & Announcements</a></li> -->
        </ul>
      </li>
      <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">My Account <b class="caret"></b></a>
        <ul class="dropdown-menu">
          <li><a href="/my/change_password">Change password</a></li>
          <li><a href="/my/profile">Update profile</a></li>
          <li><a href="/logout">Logout</a></li>
        </ul>
      </li>
      <?php endif; ?>
    </ul>
  </div><!-- /.navbar-collapse -->
</nav>
<hr style="padding-top:0;"/>
		<div id="content" style="padding-bottom:45px;">

			<?php echo $this->Session->flash(); ?>
<!-- The main content from controller / view START -->
			<?php echo $this->fetch('content'); ?>
<!-- The main content from controller / view END -->

		</div>
		<footer id="footer" style ="padding: 75px 0px 20px 0px;">
                    <div class="row" style="height:75%;">
                      <div class="col-lg-offset-4 col-lg-4" style="display: inline-block; height:75%; text-align: center;">
                        <div class="container">
                          <img src="/img/bu-logo-small.gif"/>
                             <div style="display: inline-block; vertical-align: bottom;">
                                
								 <ul class="list-inline">
                                  <li>								 
                                  <?php echo $this->Html->link(
                                                     'MET HI Lab',
                                                     'http://sites.bu.edu/met-hilab/',
                                                     array('target' => '_blank', 'escape' => false)
                                             );
                                             ?>
								  </li>
                                  </ul>								  
                             
<!--                               <ul class="bs-social-buttons">
                                <li class="follow-btn" style="display: inline-block;">
                                   <a href="https://twitter.com/BU_Tweets" class="twitter-follow-button" data-show-count="false" data-show-screen-name="false">Follow @BU_Tweets</a>
                                   <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
                                </li>
                                <li class="tweet-btn" style="display: inline-block;">
                                   <a href="https://twitter.com/share" class="twitter-share-button" data-via="BU_Tweets">Tweet</a>
                                   <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
                                </li>
                               </ul>  -->
                            </div>
                        </div>
                      </div>
                     </div>
<!--                     <div class="col-lg-offset-4 col-lg-4" style="text-align:center;">
                        <a href="http://www.bu.edu/" style="font-size:11px; color: gray;">Copyright © 2013 Boston University</a>
                     </div>	-->
		</footer>
	</div>
	<?php // echo $this->element('sql_dump'); ?>
</body>
</html>
