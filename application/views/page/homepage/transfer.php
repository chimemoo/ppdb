

<div class="container-fluid">
	<div class="row" style="background-color: #eff2f4; padding-top: 15%; padding-bottom: 10%; margin-bottom: 1%;">
		<div class="col-md-8" style="text-align: center;">
			<div class="panel-heading" >
				<h1>Transfer Bank</h1>
			</div>
			<?php echo form_open_multipart('homepage/transfer_create/'.$biaya->registration_code); ?>
			<div class="panel-body">
				<h3>Nominal Transfer : 
					<?php 
						if ($biaya->registration_edu_level == 'SD') {
							echo "Rp. 50.000";
						}elseif ($biaya->registration_edu_level == 'SMP') {
							echo "RP. 75.000";
						}elseif ($biaya->registration_edu_level == 'SMA') {
							echo "RP. 100.000";
						}
					?>
				</h3>
				<h3><b>Bank <?php echo $bank;?></b></h3>
				<h3><?php echo $rekening;?></h4>
				<h5><b><i>a/n : <?php echo $atasnama;?></i></b></h5>
			</div>
		</div>

		<div class="col-md-4">
			<div class="form-group">
				<label>Jumlah Transfer</label>
				<input type="text" name="confirm_price" class="form-control">
			</div>
			<div class="form-group">
				<label>No. Rekening</label>
				<input type="text" name="confirm_user_account" class="form-control">
			</div>
			<div class="form-group">
				<label>No. Rekening Tujuan</label>
				<input type="text" name="confirm_admin_account" class="form-control">
			</div>
			<div class="form-group">
				<label>Upload Bukti Transfer</label>
				<input type="file" class="form-control" name="confirm_image">
			</div>
			<input type="submit" class="btn btn-success btn-lg" name="m_confirm" value="Konfirmasi Pembayaran" style="margin-top: 10%; float: right;">
		</div>
	</div>
	<?php echo form_close(); ?>	
</div>
<script src="<?php echo base_url(); ?>assets/homepage/js/jquery-1.11.2.min.js"></script>