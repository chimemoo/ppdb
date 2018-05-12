<?php

	if($this->session->flashdata('loginfailed'))
	{
		echo '<script type="text/javascript">alert("'.$this->session->flashdata('loginfailed').'");</script>';
	}

?>
<div class="container-fluid" style="background-image: url('<?php echo base_url(); ?>assets/homepage/images/home2.jpg');  height: 100vh; ">
	<div class="row" style=" background-color:rgba(0, 0, 0, 0.5); padding-top:15%;  height: 100%;">
		<div class="col-md-8 col-xs-12">
			<h3 style="color : #fff; text-align: center;">Selamat datang di website kami, kami adalah salah satu penyalur tenaga pengajar Homeschooling terpercaya di Jakarta.</h3>
		</div>
		<div class="col-md-3 col-xs-12">
			<div class="panel panel-primary">
				<div class="panel-heading"><h3 style="color:#fff;"><b><center> Login</center></b></h3></div>
				<div class="panel-body abu2">
						<?php echo form_open('HomePage/aksi')?>
						<div class="form-group">
							<input type="text" class="form-control" placeholder="Username" name="user_name">
						</div>
						<div class="form-group">
							<input type="password" class="form-control" placeholder="Password" name="user_password">
						</div>
						<button type="submit" class="btn btn-primary form-control">Masuk</button><br><br>					
						<?php echo form_close()?>
						
						<a href="<?php echo site_url() ?>homepage/register"><button class="btn btn-primary form-control">Register</button></a>
				</div>	
			<div class="panel-footer"></div>
			</div><!--panel-->
		</div><!--col-md-4-->
	</div><!--row-->
</div>
