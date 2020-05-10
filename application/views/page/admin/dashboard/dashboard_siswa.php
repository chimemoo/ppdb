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
        <table id="tablesiswa" class="table-responsive-sm table table-sm display" cellspacing="0" width="100%">
          <thead>
            <tr>
              <th>No</th>
              <th>Kode Pendaftaran</th>
              <th>Nama Siswa</th>
              <th>Tingkat Pendidikan</th>
              <th>Status payment</th>
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
          <h3 class="tile-title" style="float: left">Laporan Siswa</h3><a class="btn btn-sm btn-primary ml-1" style="float: right; display: none;" id="cetak">Cetak</a>
        </div>
        <form id="form1" name="form1" method="post">
          <div class="input-group form-group">
            <select name="tingkatpendidikan" id="tp" class="form-control mr-2">
              <option selected="true" disabled="disabled">-- Tingkat Pendidikan --</option>
              <option value="SD">SD</option>
              <option value="SMP">SMP</option>
              <option value="SMA">SMA</option>
            </select>
            <select name="status" id="status" class="form-control mr-2">
              <option selected="true" disabled>-- Status Pembayaran --</option>
              <option value="verified">Verified</option>
              <option value="unverified">Unverified</option>
            </select>
            <input type="button" class="btn btn-sm btn-primary" value="CEK" id="cek">
          </div>
        </form>
      <br>
      <table id="tablelaporan" class="table-responsive-sm table table-sm display" cellspacing="0" width="100%">
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

        </tbody>
      </table>
      <div id="tablelaporann"></div>
    </div>
    </div>
  </div>
</main>


<div class="modal fade bd-example-modal-lg" id="downloaddata" tabindex="-1" role="dialog" aria-labelledby="downloaddata" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Data Siswa</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <a class="btn btn-sm btn-primary" id="formsiswa" target="_blank">Download Form Pendaftaran</a>
        <a class="btn btn-sm btn-primary" id="formscan" target="_blank">Download Scan Ijazah</a>
        <a class="btn btn-sm btn-primary" id="formdoc" target="_blank">Download Dokumen</a>
      </div>
    </div>
  </div>
</div>
