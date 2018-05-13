
<div class="container-fluid" style="background-color: #d4d6d8;">
	<div class="row" style="padding-top: 10%;">
	  <?php foreach ($event->result() as $baris) {?>
	  <div class="col-sm-6 col-md-4">
	    <div class="thumbnail">
	      <img src="<?php echo base_url(); ?>uploads/images/<?php echo $baris->event_img;?>" alt="..." style="width: 100%; height: 320px;">
	      <div class="caption">
	      	<h3 style="text-align: center;"><b><?php echo $baris->event_name;?></b></h3>	        	
		    <p style="font-size: 20px; text-align: center; padding-top: -30px;">Tanggal Event : <i><?php echo $baris->event_date;?></i></p>
		   </div>
	        <p style="text-align: right;"><a href="<?php echo site_url(); ?>homepage/detailEvent/<?php echo $baris->event_id;?>" class="btn btn-success" role="button">Lihat Selengkapnya</a> </p>
	      </div>
	    </div>
	      <?php } ?>

	</div>
</div>
<script src="<?php echo base_url(); ?>assets/homepage/js/jquery-1.11.2.min.js"></script>
