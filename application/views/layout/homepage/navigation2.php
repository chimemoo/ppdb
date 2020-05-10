<body>
<div id="wrapper">
		<header id="header">
			<div class="container">
				<div class="logo"><a href="<?php echo base_url(); ?>"><img src="<?php echo base_url(); ?>assets/homepage/images/logo.svg" alt="PSB"></a></div>
				<nav id="nav">
					<div class="opener-holder">
						<a href="#" class="nav-opener"><span></span></a>
					</div>
					<a href="<?php echo site_url()?>homepage/logout" class="btn btn-primary rounded">Log Out</a>
					<div class="nav-drop">
						<ul>
							<li class="active visible-sm visible-xs"><a href="<?php echo site_url()?>homepage">Home</a></li>
							<li><a href="<?php echo site_url()?>homepage/profile_school">Profile</a></li>
							<li><a href="<?php echo base_url(); ?>homepage/news">News</a></li>
							<li><a href="<?php echo base_url(); ?>homepage/event">Events</a></li>
							<li><a href="<?php echo site_url()?>homepage#contact">Contact</a></li>
							<li><a href="<?php echo site_url()?>homepage/pengumuman">Pengumuman <span class="badge badge-light"><?php echo $notif; ?></span><span class="sr-only">unread messages</span></a></li>
							<li><a href="<?php echo site_url()?>homepage/psb">PSB</a></li>
						</ul>
					</div>
				</nav>
			</div>
		</header>
	

