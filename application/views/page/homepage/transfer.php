

<div class="container-fluid" style="text-align: center; background-color: #eff2f4; height: 100vh;">
	<div class="panel-heading" style="margin-top: 10%; margin-bottom: 2%">
		<h1>Transfer Bank</h1>
	</div>
	<div class="panel-body">
		<h3><b>Bank <?php echo $bank;?></b></h3>
		<h4><?php echo $rekening;?></h4>
		<h5><b><i>a/n : <?php echo $atasnama;?></i></b></h5>
	</div>
	<!-- 
	<div class="row">
		<div class="col-md-4">
			<div class="panel-body">
				<h3><b>Bank BCA</b></h3>
				<h4 style="margin-top: 5%;">No rekening</h4>
				<h5><b><i>a/n : Fulan</i></b></h5>
			</div>
		</div>
		<div class="col-md-4">
			<div class="panel-body">
				<h3><b>Bank Mandiri</b></h3>
				<h4 style="margin-top: 5%;">No rekening</h4>
				<h5><b><i>a/n : Fulan</i></b></h5>
			</div>
		</div>
		<div class="col-md-4">
			<div class="panel-body">
				<h3><b>Bank Muamalat</b></h3>
				<h4 style="margin-top: 5%;">No rekening</h4>
				<h5><b><i>a/n : Fulan</i></b></h5>
			</div>
		</div>
	</div>row -->
	<div style="margin-top: 8%; margin-bottom: 2%;">
		<h5>Setelah anda melakukan pembayaran, lakukanlah konfirmasi pembayaran telah selesai</h5>
		<h5>Silahkan transfer dalam waktu <b>2 x 24 jam</b></h5>
		<input type="submit" class="btn btn-success btn-lg" name="" value="Konfirmasi Pembayaran">
	</div>
</div>
<script src="<?php echo base_url(); ?>assets/homepage/js/jquery-1.11.2.min.js"></script>
<script type="text/javascript">
	$("#pendidikan").change(function() {
		if (this.value=="SD") {
			$("#asalSekolah").attr("disabled", true);
    		$("#nomorIjazah").attr("disabled", true);	
		} else{
			$("#asalSekolah").attr("disabled", false);
    		$("#nomorIjazah").attr("disabled", false);
		}
    	
});
</script>