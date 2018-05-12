
<div class="container-fluid panel-group" style="text-align: center;">

	<div class="panel panel-default" style=" text-align: center;">
	<img src="<?php echo base_url(); ?>uploads/images/<?php echo $detail->event_img; ?>" style="margin-top: 15%; width: 60%; height: 60%;">
		 <div class="panel-body">
		  	<!-- <hr style="overflow: visible; padding: 0; border: none; border-top: medium double #333; color: #333; text-align: center"> -->
		  	<h1 style="text-align: center;"><?php echo $detail->event_name;?></h1>
		  	<p style="font-size: 20px; text-align: center; padding-bottom: 30px;">Tanggal Event : <i><?php echo $detail->event_date;?></i></p>

			 <p style="font-size: 18px; margin-right: 3%; margin-left: 3%; text-align: justify;">
			 	<?php echo $detail->event_detail;?>
			 </p>
		 </div>
	</div>
</div>
<script src="<?php echo base_url(); ?>assets/homepage/js/jquery-1.11.2.min.js"></script>
