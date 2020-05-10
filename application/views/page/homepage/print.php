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
    .kiri{
        float: left;
        width: 500px;
        height: 70px;

    }
    .kanan{
        float: right;
        width: 500px;
        height: 70px;
    }
</style>
</head>
<body>
<div align="center"><hr><hr>
<h1>HOME SCHOOLING</h1>
<h4>Karawang Pangkal Bumi Perjuangan Telp : (082210414362)</h4><hr><hr>
</div>
<h2 align="center">No Pendaftaran : <?php echo $struk->registration_code;?></h2><hr>
<div class="kiri">
<br>
<table class="atas">
    <tr>
        <td><b>Nama</b></td>
        <td>:</td>
        <td><?php echo $struk->registration_full_name;?></td>
    </tr>
    <tr>
        <td><b>Tempat/ Tanggal Lahir</b></td>
        <td>:</td>
        <td><?php echo $struk->registration_place_birthdate;?></td>
    </tr>
    <tr>
        <td><b>Telp</b></td>
        <td>:</td>
        <td><?php echo $struk->registration_numphone;?></td>
    </tr>
    <tr>
        <td><b>Nama Ayah</b></td>
        <td>:</td>
        <td><?php echo $struk->registration_father_name;?></td>
    </tr>
    <tr>
        <td><b>Nama Ibu</b></td>
        <td>:</td>
        <td><?php echo $struk->registration_mother_name;?></td>
    </tr>
     <tr>
        <td><b>Tingkat Pendidikan</b></td>
        <td>:</td>
        <td><?php echo $struk->registration_edu_level;?></td>
    </tr>
    <tr>
        <td><b>Asal Sekolah</b></td>
        <td>:</td>
        <td><?php echo $struk->registration_school;?></td>
    </tr>
    <tr>
        <td><b>Nomor Ijazah</b></td>
        <td>:</td>
        <td><?php echo $struk->registration_ijasah_number;?></td>
    </tr>
</table>
</div>
<div class="kanan">
<br> 
<table class="atas">
   
</table>
</div>

  
</body>
</html>
