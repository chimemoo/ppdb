

<div class="container-fluid panel-group" style="background-color: #fff; height: 100vh; width: 80%;">
<div class="panel panel-success">
	<div class="panel-heading" style="margin-top: 10%;"">
		<h1 style="text-align: center;">Status Pendaftaran</h1>
	</div>
	<div class="panel-body">
		<table class="table table-hover">
			<thead>
				<tr>
					<th>Kode Pendaftaran</th>
					<th>Biaya Pendidikan</th>
					<th>Cetak</th>
					<th>Messages</th>
					<th>Status</th>
					<th>Aksi</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach($status as $s) { ?>
				<tr>
					<?php 
						if ($s['confirm_status'] == 0) {
							$stat = "Belum";
							$messages = "disabled";
						}elseif ($s['confirm_status'] == 1) {
							$stat = "Sudah";
							$messages = "";
						}

					?>
					<td><?php echo $s['confirm_registration_code'];?></td>
					<td><?php echo $s['confirm_price'];?></td>
					<td>
						<a href="<?php echo site_url()?>homepage/cetak/<?php echo $s['confirm_registration_code'];?>" class="btn btn-sm">
						<span class="glyphicon glyphicon-print"></span> Print
						</a>
					</td>
					<td>
						<a href="<?php echo site_url(); ?>homepage/messages/<?php echo $s['confirm_registration_code'];?>" class="btn btn-sm" <?php echo $messages; ?>>
						<span class="glyphicon glyphicon-envelope"></span> Messages
						</a>
					</td>
					<td>
					<?php 
						echo $stat;
					?>
					
					</td>
					<td>
						<a href="<?php echo site_url(); ?>homepage/transfer/<?php echo $s['registration_code'];?>" class="btn btn-sm">
						<span class="glyphicon glyphicon-envelope"></span> Konfirmasi Pembayaran
						</a>
					</td>
				</tr>
				<?php } ?>
			</tbody>
		</table>
	</div>
	
</div>		
</div>
<script src="<?php echo base_url(); ?>assets/homepage/js/jquery-1.11.2.min.js"></script>
