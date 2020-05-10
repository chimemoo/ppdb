<html>
<head>
    <title>Cetak PDF</title>
<style type="text/css">
    table{
        width: 100%;
    }
    tr{
        padding: 10%;
    }
    .atas{
        font-size: 18px;
        padding: 10%;
    }
</style>
</head>
<body>
<h1 align="center">Laporan Siswa</h1>
<table class="atas" border="1" align="center">
	<thead>
	    <tr>
	        <th>No</th>
	        <th>No. Pendaftaran</th>
	        <th>Nama Lengkap</th>
	        <th>Alamat</th>
	        <th>No. Telp</th>
	        <th>Status Payment</th>
	        </tr>
	</thead>
    <tbody>
		<?php
			$no = 1;
			foreach ($cek as $c) {
				if($c['registration_status'] == "0")
		        {
		            $status = "Belum Lunas";
		        }
		        else {
		            $status = "Sudah Lunas";
		        }
				echo "<tr>";
				echo "<td>".$no."</td>";
				echo "<td>".$c['registration_code']."</td>";
				echo "<td>".$c['registration_full_name']."</td>";
				echo "<td>".$c['registration_address']."</td>";
				echo "<td>".$c['registration_numphone']."</td>";
				echo "<td>".$status."</td>";
				echo "</tr>";
				$no++;
			}
		?>
    </tbody>
</table>
</body>
</html>