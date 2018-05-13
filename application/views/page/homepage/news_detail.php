<br><br><br><br><br>
<div class="container-fluid panel-group" style="text-align: center;">

	<div class="panel panel-default" style=" text-align: center;">
		 <div class="panel-body">
		  	<!-- <hr style="overflow: visible; padding: 0; border: none; border-top: medium double #333; color: #333; text-align: center"> -->
		  	<h1 style="text-align: center;"><?php echo $detail->news_title;?></h1>
		  	<p style="font-size: 20px; text-align: center; padding-bottom: 30px;">Diposkan tanggal : <i><?php echo $detail->news_datestamp;?></i></p>

			 <p style="font-size: 18px; margin-right: 3%; margin-left: 3%; text-align: justify;">
			 	<?php echo $detail->news_content;?>
			 </p>
		 </div>
	</div>
</div>
<script src="<?php echo base_url(); ?>assets/homepage/js/jquery-1.11.2.min.js"></script>
