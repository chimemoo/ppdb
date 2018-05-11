

<div class="container-fluid panel-group" style="background-color: #fff; height: 100vh; width: 80%;">
<div class="panel panel-success">
	<div class="panel-heading" style="margin-top: 10%; margin-bottom: 2% background-color: ">
		<h1 style="text-align: center;">Status Pendaftaran</h1>
	</div>
	<div class="panel-body">
		<table class="table table-hover">
			<thead>
				<tr>
					<th>Confirm ID</th>
					<th>Kode Pendaftaran</th>
					<th>Biaya Pendidikan</th>
					<th>Cetak</th>
					<th>Status</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td><?php echo $status->confirm_id;?></td>
					<td><?php echo $status->confirm_registration_code;?></td>
					<td><?php echo $status->confirm_price;?></td>
					<td>
						<a href="<?php site_url();?>homepage/preview/<?php echo $status->confirm_registration_code;?>" class="btn btn-sm">
						<span class="glyphicon glyphicon-print"></span> Print
						</a>
					</td>
					<td>
					<?php 
						if ($status->confirm_registration_code == 0) {
							echo "Belum";
						}elseif ($status->confirm_registration_code == 1) {
							echo "Sudah";
						}
					?>
					
					</td>
				</tr>
			</tbody>
		</table>
	</div>
	
</div>		
</div>
<script src="<?php echo base_url(); ?>assets/homepage/js/jquery-1.11.2.min.js"></script>
