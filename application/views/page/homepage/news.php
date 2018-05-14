
<div class="container-fluid">
	<div class="row" style="padding-top: 10%;">
	  <?php foreach ($news->result() as $baris) {?>
	  <div class="col-sm-12 col-md-6">
	    <div class="thumbnail">
	      <div class="caption">
	      	<h3 style="text-align: center;"><b><?php echo $baris->news_title;?></b></h3>	        	
		    <p style="font-size: 20px; text-align: center; padding-top: -30px;">Date News : <i><?php echo $baris->news_datestamp;?></i></p>
		   </div>
	        <p style="font-size: 15px; margin-right: 3%; margin-left: 3%; text-align: justify;">C<?php echo word_limiter($baris->news_content, 50);?></p>
	        <p style="text-align: right;"><a href="<?php echo site_url(); ?>homepage/detailnews/<?php echo $baris->news_id;?>" class="btn btn-success" role="button">Lihat Selengkapnya</a> </p>
	      </div>
	    </div>
	      <?php } ?>

	</div>
</div>
<script src="<?php echo base_url(); ?>assets/homepage/js/jquery-1.11.2.min.js"></script>
