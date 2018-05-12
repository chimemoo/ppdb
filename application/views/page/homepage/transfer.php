

<div class="container-fluid" style="text-align: center; background-color: #eff2f4; height: 100vh;">
	<div class="panel-heading" style="margin-top: 6%; margin-bottom: 2%">
		<h1>Transfer Bank</h1>
	</div>
	<?php echo form_open_multipart('homepage/transfer_create/'.$biaya->registration_code); ?>
	<div class="panel-body">
		<input type="text" name="confirm_price" value="<?php 
				if ($biaya->registration_edu_level == 'SD') {
					echo "50000";
				}elseif ($biaya->registration_edu_level == 'SMP') {
					echo "75000";
				}elseif ($biaya->registration_edu_level == 'SMA') {
					echo "100000";
				}
			?>" hidden>
		<h3>Nominal Transfer : 
			<?php 
				if ($biaya->registration_edu_level == 'SD') {
					echo "RP. 1.000.000";
				}elseif ($biaya->registration_edu_level == 'SMP') {
					echo "RP. 2.000.000";
				}elseif ($biaya->registration_edu_level == 'SMA') {
					echo "RP. 3.500.000";
				}
			?>
		</h3>
		<h3><b>Bank <?php echo $bank;?></b></h3>
		<h3><?php echo $rekening;?></h4>
		<h5><b><i>a/n : <?php echo $atasnama;?></i></b></h5>
	</div>
	
	<div style="margin-top: 6%; margin-bottom: 2%;">
		<div class="form-group" style="width: 20%; margin-left: 40%;">
			<label>Upload Bukti Transfer</label>
			<input type="file" class="form-control" name="confirm_image">
		</div>
		<h5>Setelah anda melakukan pembayaran, lakukanlah konfirmasi pembayaran telah selesai</h5>
		<h5>Silahkan transfer dalam waktu <b>2 x 24 jam</b></h5>
		<input type="submit" class="btn btn-success btn-lg" name="m_confirm" value="Konfirmasi Pembayaran">
	</div>
	<?php echo form_close(); ?>	
</div>
<script src="<?php echo base_url(); ?>assets/homepage/js/jquery-1.11.2.min.js"></script>