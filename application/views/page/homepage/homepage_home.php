<section class="atas">
	<div class="container">
		<div class="text-block">
			<div class="heading-holder">
				<h1>Welcome to Our Website</h1>
			</div>
		</div>
	</div>
</section>
<section class="main">
	<a name="profile"></a>
	<div class="container">
		<div id="cta">
			<a href="http://tympanus.net/codrops/?p=23525" class="btn btn-info rounded">Daftar Sekarang</a>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div id="jssor_1" style="position: relative; margin: 0 auto; top: 0px; left: 0px; width: 800px; height: 456px; overflow: hidden; visibility: hidden; background-color: #24262e;">
			        <!-- Loading Screen -->
			        <div data-u="loading" style="position: absolute; top: 0px; left: 0px;">
		            <div style="filter: alpha(opacity=70); opacity: 0.7; position: absolute; display: block; top: 0px; left: 0px; width: 100%; height: 100%;"></div>
		            <div style="position:absolute;display:block;background:url('<?php echo base_url(); ?>assets/homepage/images/loading.gif') no-repeat center center;top:0px;left:0px;width:100%;height:100%;"></div>
		        </div>
		        <div data-u="slides" style="cursor: default; position: relative; top: 0px; left: 0px; width: 800px; height: 356px; overflow: hidden;">
		            <div data-p="144.50" style="display: none;">
		                <img data-u="image" src="<?php echo base_url(); ?>assets/homepage/images/home.jpg" />
		                <img data-u="thumb" src="<?php echo base_url(); ?>assets/homepage/images/home.jpg" />
		            </div>
		            <div data-p="144.50" style="display: none;">
		                <img data-u="image" src="<?php echo base_url(); ?>assets/homepage/images/home.jpg" />
		                <img data-u="thumb" src="<?php echo base_url(); ?>assets/homepage/images/home.jpg" />
		            </div>
		            <div data-p="144.50" style="display: none;">
		                <img data-u="image" src="<?php echo base_url(); ?>assets/homepage/images/home.jpg" />
		                <img data-u="thumb" src="<?php echo base_url(); ?>assets/homepage/images/home.jpg" />
		            </div>
		            <div data-p="144.50" style="display: none;">
		                <img data-u="image" src="<?php echo base_url(); ?>assets/homepage/images/home.jpg" />
		                <img data-u="thumb" src="<?php echo base_url(); ?>assets/homepage/images/home.jpg" />
		            </div>
		            <div data-p="144.50" style="display: none;">
		                <img data-u="image" src="<?php echo base_url(); ?>assets/homepage/images/home.jpg" />
		                <img data-u="thumb" src="<?php echo base_url(); ?>assets/homepage/images/home.jpg" />
		            </div>
		            <div data-p="144.50" style="display: none;">
		                <img data-u="image" src="<?php echo base_url(); ?>assets/homepage/images/home.jpg" />
		                <img data-u="thumb" src="<?php echo base_url(); ?>assets/homepage/images/home.jpg" />
		            </div>
		        
		        </div>
		        <!-- Thumbnail Navigator -->
		        <div data-u="thumbnavigator" class="jssort01" style="position:absolute;left:0px;bottom:0px;width:800px;height:100px;" data-autocenter="1">
		            <!-- Thumbnail Item Skin Begin -->
		            <div data-u="slides" style="cursor: default;">
		                <div data-u="prototype" class="p">
		                    <div class="w">
		                        <div data-u="thumbnailtemplate" class="t"></div>
		                    </div>
		                    <div class="c"></div>
		                </div>
		            </div>
		            <!-- Thumbnail Item Skin End -->
		        </div>
		        <!-- Arrow Navigator -->
		        <span data-u="arrowleft" class="jssora05l" style="top:158px;left:8px;width:40px;height:40px;"></span>
		        <span data-u="arrowright" class="jssora05r" style="top:158px;right:8px;width:40px;height:40px;"></span>
		    </div>
		    </div>
			    <div class="text-box col-md-12">
					
				</div>
			</div>
			<!-- <div class="row visimisi text-box">
				<div class="col-md-6">
					<h1>Visi</h1>
					<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
				</div>
				<div class="col-md-6">
					<h1>Misi</h1>
					<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
				</div>
			</div> -->
		</div>


	</div>
</section>
<section class="area">
	<div class="container">
	<h2 style="text-align: center; padding-bottom: 80px;">Event Our School</h2>
		<div class="row">
		  <?php foreach ($event->result() as $baris) {?>
		  <div class="col-sm-12 col-md-4">
		  	<a href="<?php echo site_url(); ?>homepage/detailEvent/<?php echo $baris->event_id;?>">
		  		<div class="thumbnail">
		  		<h4><span class="label label-info">Event</span></h4>
			      <div class="caption">
			      	<h3 style="text-align: center;">
			      		<b><?php echo $baris->event_name;?></b>
			      	</h3>	        	
				    <p style="font-size: 20px; text-align: center; padding-top: -30px;">
				    	Date Event : <i><?php echo $baris->event_date;?></i>
				    </p>
			       	<img src="<?php echo base_url(); ?>uploads/images/<?php echo $baris->event_img;?>" style="width: 100%; height: 200px;">
				  </div>
			     </div>
			 </a>
		    </div>
		      <?php } ?>
		</div>
	</div>
</section>

<section class="main"  style="background-color: #fcfdff;">
	<div class="container">
		<div class="row">
			<div class="col-sm-12 col-md-8">
			<h1 style="margin-bottom: 80px;"><span class="glyphicon glyphicon-bullhorn"></span> Pengumuman</h1>
					<?php
						foreach ($pengumuman->result() as $baris) {?>
						<div style="border: 2px solid #000;border-radius: 5px; padding: 10px;">
							<h2 style="text-align: center; color: #000;">
								<?php echo $baris->peng_name;?>
							</h2>
							<p style="float: right; font-size: 20px; margin: 8px;">
								<span class="glyphicon glyphicon-time"></span> <?php echo $baris->peng_date;?>
							</p>
							<hr style="overflow: visible; padding: 0; margin-top: 10px; border: none; border-top: medium double #333; color: #333; text-align: center;">
							<img src="<?php echo site_url(); ?>uploads/images/<?php echo $baris->peng_img;?>" style="width: 100%; height: 30%;">
						</div>
					<?php		
						}
					?>
			</div>
			 <div class="col-sm-12 col-md-4" style="background-color: grey; margin-top: 150px;">
				<h2 style="text-align: center; padding-bottom: 50px; color: #fff;">News in School</h2>
				<?php foreach ($news->result() as $baris) {?>
			  <a href="<?php echo site_url(); ?>homepage/detailEvent/<?php echo $baris->news_id;?>">
			    <div class="thumbnail">
			    <div class="row">
			    	<div class="col-md-6">
				      	<h4><span class="label label-warning">News</span></h4>
				      	<h4 style="text-align: left; margin-left: 5px; color: #000;">
				      		<b><?php echo $baris->news_title;?></b>
				      	</h4>
				    </div>	
				    <div class="col-md-6">
					    <p style="font-size: 15px; text-align: right; padding: 5%;">
					    	Date : <i><?php echo $baris->news_datestamp;?></i>
					    </p>
					</div>
			    </div>
			      <div class="caption">
			      	<p style="font-size: 16px; text-align: justify;">
				    	<?php
				    	$limitContent = word_limiter($baris->news_content,30); 
				    		echo $limitContent;
				    	?>
				    </p>	
				  </div>
			     </div>
			   </a>
			<?php } ?>
			    </div>
	</div>
</section>

<a name="contact"></a>
<section class="area" style="background-color: #000;">
	<div class="container">
		<h2>Our Contact</h2>
		<div class="row" style="padding-top: 10px;">
			<div class="col-md-4">
				<div class="col-md-2">
					<img src="<?php echo site_url(); ?>assets/images/whatsapp.png" style="width:50px; height:50px;">
				</div>
				<div class="col-md-10" style="text-align: left; color: #fff;">
					<h4><?php echo $contactWA;?></h4>
				</div>
			</div>

			<div class="col-md-4">
				<div class="col-md-2">
					<img src="<?php echo site_url(); ?>assets/images/line.png" style="width:50px; height:50px;">
				</div>
				<div class="col-md-10" style="text-align: left;">
					<h4><?php echo $contactLine;?></h4>
				</div>
			</div>
		</div>

		<div class="row"  style="padding-top: 10px;">
			<div class="col-md-4">
				<div class="col-md-2">
					<img src="<?php echo site_url(); ?>assets/images/line.png" style="width:50px; height:50px;">
				</div>
				<div class="col-md-10" style="text-align: left;">
					<h4><?php echo $contactIG;?></h4>
				</div>
			</div>

			<div class="col-md-4">
				<div class="col-md-2">
					<img src="<?php echo site_url(); ?>assets/images/facebook.png" style="width:50px; height:50px;">
				</div>
				<div class="col-md-10" style="text-align: left;">
					<h4><?php echo $contactFB;?></h4>
				</div>
			</div>
		</div>

	</div>
</section>
	
</div>