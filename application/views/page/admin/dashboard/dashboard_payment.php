<?php if(isset($eror))
    {
      echo $eror;
    } ?>
<br>
<main class="app-content">
  	<div class="row">
    	<div class="col-md-12">
    		<div class="tile">
		        <h3 class="tile-title" >Data Payment</h3>
		        <table id="tablepayment" class="table-responsive-sm table table-sm display" cellspacing="0" width="100%">
		          <thead>
		            <tr>
		              <th>No</th>
		              <th>Kode Pendaftaran</th>
		              <th>Rek. Pengirim</th>
		              <th>Rek. Tujuan</th>
		              <th>Total</th>
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
</main>

<div class="modal fade bd-example-modal-lg" id="pengumuman" tabindex="-1" role="dialog" aria-labelledby="pengumuman" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Kirim Pesan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form enctype="multipart/form-data" action="<?php echo base_url(); ?>dashboard/announce_send" method="POST" id="form">
          <div class="form-group">
            <label for="kodetransaksi">Kode transaksi :</label>
            <input type="text" id="kodetransaksi" class="form-control" name="kodetransaksi">
          </div>
          <div class="form-group">
            <label for="judul">Judul :</label>
            <input type="text" id="judul" class="form-control" name="judul">
          </div>
          <div class="form-group">
            <label for="password">Pesan :</label>
            <textarea name="pesan" id="pesan" class="form-control"></textarea>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" id="kirim">Kirim</button></form>
      </div>
    </div>
  </div>
</div>

<div class="modal fade bd-example-modal-lg" id="detailconfirm" tabindex="-1" role="dialog" aria-labelledby="detailconfirm" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Detail Pembayaran</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Foto Bukti Transaksi</p>
        <img src="" alt="" id="bukti" style="max-width: 300px;">
      </div>
    </div>
  </div>
</div>