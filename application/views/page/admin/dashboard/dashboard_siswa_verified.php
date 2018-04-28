<?php if(isset($eror))
    {
      echo $eror;
    } ?>
<br>
<main class="app-content">
  <div class="row">
    <div class="col-md-12">
      <div class="tile">
        <h3 class="tile-title" >Data Siswa</h3>
        <table id="tablesiswaverified" class="table-responsive-sm table table-sm display" cellspacing="0" width="100%">
          <thead>
            <tr>
              <th>No</th>
              <th>Kode Pendaftaran</th>
              <th>Nama Siswa</th>
              <th>Tingkat Pendidikan</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
          </tbody>
        </table>
      </div>
    </div>
  </div>
  

  <div class="row">
    <div class="col-md-12">
      <div class="tile">
        <div class="cf">
          <h2 style="float: left">Laporan Event</h2><button type="button" class="btn btn-sm btn-primary ml-1" style="float: right; display: none;" id="cetak">Cetak</button>
        </div>
        <form id="form1" name="form1" method="post">
        <div class="input-group form-group">
          <select class="form-control" id="tgl1" name="tgl1">
            <?php for($i=1;$i<=31;$i++)
              echo '<option value="'.$i.'">'.$i.'</option>'
            ?>
          </select>
          <select class="form-control" name="bln1" id="bln1">
            <option value="01">Januari</option>
            <option value="02">Februari</option>
            <option value="03">Maret</option>
            <option value="04">April</option>
            <option value="05">Mei</option>
            <option value="06">Juni</option>
            <option value="07">Juli</option>
            <option value="08">Agustus</option>
            <option value="09">September</option>
            <option value="10">Oktober</option>
            <option value="11">November</option>
            <option value="12">Desember</option>
          </select>
          <select class="form-control" name="thn1" id="thn1">
            <?php
              for($i=2012;$i<=date("Y");$i++)
              {
                echo '<option value="'.$i.'">'.$i.'</option>';
              }
            ?>
          </select>
            <h4 class="m-1">To</h4>
              <select class="form-control" id="tgl2" name="tgl2">
                <?php for($i=1;$i<=31;$i++)
                  echo '<option value="'.$i.'">'.$i.'</option>'
                ?>
              </select>
              <select class="form-control" name="bln2" id="bln2">
                <option value="01">Januari</option>
                <option value="02">Februari</option>
                <option value="03">Maret</option>
                <option value="04">April</option>
                <option value="05">Mei</option>
                <option value="06">Juni</option>
                <option value="07">Juli</option>
                <option value="08">Agustus</option>
                <option value="09">September</option>
                <option value="10">Oktober</option>
                <option value="11">November</option>
                <option value="12">Desember</option>
              </select>
              <select class="form-control" name="thn2" id="thn2">
                <?php
                  for($i=2012;$i<=date("Y");$i++)
                  {
                    echo '<option value="'.$i.'">'.$i.'</option>';
                  }
                ?>
              </select>
              <button type="button" class="btn btn-primary ml-1" id="cek">CEK</button>
        </div>
      </form>
      <br>
      <table id="tablelaporan" class="table-responsive-sm table table-sm display" cellspacing="0" width="100%">
        <thead>
          <tr>
            <th>No</th>
            <th>Nama Event</th>
            <th>Tanggal Event</th>
          </tr>
        </thead>
        <tbody>

        </tbody>
      </table>
      <div id="tablelaporann"></div>
    </div>
    </div>
  </div>
</main>
