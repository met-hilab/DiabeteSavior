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
		echo $this->Html->css('main');

		echo $this->Html->script('jquery-1.10.2.min');
		echo $this->Html->script('jquery-ui-1.10.3.custom.min');
		echo $this->Html->script('bootstrap');

		//echo $this->Html->css('cake.generic');

		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
</head>
<body>

	<div id="container" class="container">

		<header id="header" class="header">
			<h1><?php echo $this->Html->link($cakeDescription, '/'); ?></h1>
		</header>
		<nav class="navbar navbar-default" role="navigation">
  <!-- Brand and toggle get grouped for better mobile display -->
  <div class="navbar-header">
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
      <span class="sr-only">Toggle navigation</span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </button>
    <?php echo $this->Html->link(
						$this->Html->image('bu-logo.gif', array('alt' => $cakeDescription, 'border' => '0', 'style' => 'height:50px;')),
						'/',
						array('class' => 'navbar-brand', 'escape' => false, 'style' => 'padding:0;')
					);
		?>
  </div>

  <!-- Collect the nav links, forms, and other content for toggling -->
  <div class="collapse navbar-collapse navbar-ex1-collapse">
    <ul class="nav navbar-nav">
      <li class="active"><a href="/announcements">Announcement</a></li>
      <li class="dropdown">
      	<a href="#" class="dropdown-toggle" data-toggle="dropdown">Calculators <b class="caret"></b></a>
      	<ul class="dropdown-menu">
          <li><a href="/calculators/bmi">Body Mass Index</a></li>
          <li><a href="/calculators/bsa">Body Surface Area</a></li>
          <li><a href="/calculators/bgl">Blood Glucose Level</a></li>
        </ul>
      </li>
      <li><a href="#">Patients</a></li>
      
    </ul>
    
    <ul class="nav navbar-nav navbar-right">
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
						      <input type="checkbox"> Remember me
						    </label>
						  </div>
						  <button type="submit" class="btn btn-default">Submit</button>
						</form>
    			</li>
    		</ul>
    	</li>
      <?php else: ?>

      <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">My Account <b class="caret"></b></a>
        <ul class="dropdown-menu">
          <li><a href="#">Change password</a></li>
          <li><a href="#">Update profile</a></li>
          <li><a href="/logout">Logout</a></li>
        </ul>
      </li>
      <?php endif; ?>
    </ul>
  </div><!-- /.navbar-collapse -->
</nav>
		<div id="content">

			<?php echo $this->Session->flash(); ?>

			<?php echo $this->fetch('content'); ?>
		</div>
		<footer id="footer" class="footer">
			<div class="bs-social">
  <ul class="bs-social-buttons">
    <li class="follow-btn">
      <a href="https://twitter.com/BU_Tweets" class="twitter-follow-button" data-show-count="false" data-show-screen-name="false">Follow @BU_Tweets</a>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
    </li>
    <li class="tweet-btn">
      <a href="https://twitter.com/share" class="twitter-share-button" data-via="BU_Tweets">Tweet</a>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
    </li>
  </ul>
</div>
			<?php echo $this->Html->link(
					'Copyright © 2013 Boston University',
					'http://www.bu.edu/',
					array('target' => '_blank', 'escape' => false)
				);
			?>
		</footer>
	</div>
	<?php echo $this->element('sql_dump'); ?>
</body>
</html>
