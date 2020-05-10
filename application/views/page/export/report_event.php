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
<h1 align="center">Laporan Event</h1>
<table class="atas" border="1" align="center" width="80">
	<thead>
	    <tr>
	        <th>No</th>
	        <th>Nama Event</th>
            <th>Tanggal Event</th>
	    </tr>
	</thead>
    <tbody>
		<?php
			$no = 1;
			foreach ($cek as $c) {
				echo "<tr>";
					echo "<td>".$no."</td>";
					echo "<td>".$c['event_name']."</td>";
					echo "<td>".$c['event_date']."</td>";
				echo "</tr>";
				$no++;
			}
		?>
    </tbody>
</table>
</body>
</html>