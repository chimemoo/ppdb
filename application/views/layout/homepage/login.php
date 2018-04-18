<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/homepage/css/bootstrap.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/homepage/fonts/font-awesome-4.3.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/homepage/css/all.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/homepage/css/style.css">
	<link href="<?php echo base_url(); ?>assets/homepage/css/slider.css" rel="stylesheet">
	<link href='http://fonts.googleapis.com/css?family=Montserrat:400,700|Source+Sans+Pro:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
</head>
<body>
<header id="header">
	<div class="container">
		<div class="logo"><a href="#"><img src="<?php echo base_url(); ?>assets/homepage/images/logo.svg" alt="FORKIO"></a></div>
		<nav id="nav">
			<div class="opener-holder">
				<a href="#" class="nav-opener"><span></span></a>
			</div>
			<a href="http://tympanus.net/codrops/?p=23525" class="btn btn-primary rounded">Login</a>
			<div class="nav-drop">
				<ul>
					<li class="active visible-sm visible-xs"><a href="#">Home</a></li>
					<li><a href="#">Profile</a></li>
					<li><a href="#">Events</a></li>
					<li><a href="#">Contact</a></li>
					<li><a href="#">Pengumuman</a></li>
					<li><a href="#">PSB</a></li>
				</ul>
				<div class="drop-holder visible-sm visible-xs">
					<span>Follow Us</span>
					<ul class="social-networks">
						<li><a class="fa fa-github" href="#"></a></li>
						<li><a class="fa fa-twitter" href="#"></a></li>
						<li><a class="fa fa-facebook" href="#"></a></li>
					</ul>
				</div>
			</div>
		</nav>
	</div>
</header>




<div class="container-fluid" style="background-image: url('<?php echo base_url(); ?>assets/homepage/images/home2.jpg');  height: 120%; ">
	<div class="row" style=" background-color:rgba(0, 0, 0, 0.5); padding-top:10%;  height: 100%; text-decoration: center;">
		<div class="col-md-8 col-xs-12">
			<h5 style="color : #fff; text-align: justify; ">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</h5>
		</div>
		<div class="col-md-3 col-xs-12">
			<div class="panel panel-primary">
				<div class="panel-heading"><h3 style="color:#fff;"><b><center> Login</center></b></h3></div>
				<div class="panel-body abu2">
						<div class="form-group">
							<input type="text" class="form-control" placeholder="Username" name="username">
						</div>
						<div class="form-group">
							<input type="text" class="form-control" placeholder="Password" name="password">
						</div>
						<button type="submit" class="btn btn-primary form-control">Masuk</button><br><br>					
						<a href=""><button class="btn btn-primary form-control">Register</button></a>
				</div>	
			<div class="panel-footer"></div>
			</div><!--panel-->
		</div><!--col-md-4-->
	</div><!--row-->
</div>

</body>
</html>