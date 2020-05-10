<main class="app-content">
	<div class="row">
	    <div class="col-md-12">
	      	<div class="tile">
	        	<div class="cf">
	          		<h3 class="tile-title" style="float: left;">Data Pengumuman</h3>
	          		<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal" style="float: right;" id="buttontambah">
	          		Tambah Pengumuman
	          		</button>
	        	</div>
	        	<table id="table" class="table-responsive-sm table table-sm display" cellspacing="0" width="100%">
	          		<thead>
	            		<tr>
	              			<th>No</th>
	              			<th>Judul Pengumuman</th>
	              			<th>Tanggal Post</th>
	              			<th>Detail Pengumuman</th>
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
    	<div class="col-md-8">
      		<div class="tile">
        		<div class="cf">
          			<h2 style="float: left">Laporan Pengumuman</h2><a type="button" class="btn btn-sm btn-primary ml-1" style="float: right; display: none;" id="cetak">Cetak</a>
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
      <table id="tablelaporan" class="table" cellspacing="0" width="100%">
        <thead>
          <tr>
            <th>No</th>
            <th>Judul Pengumuman</th>
            <th>Tanggal Posting</th>
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

<div class="modal fade bd-example-modal-lg" id="modal" tabindex="-1" role="dialog" aria-labelledby="modal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Tambah Pengumuman</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  	<span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form enctype="multipart/form-data" action="<?php echo base_url(); ?>dashboard/peng_create" method="POST" id="form">
                  	<div class="form-group">
                    	<label for="event">Judul</label>
                    	<input type="text" class="form-control" id="peng" placeholder="Judul" name="peng_name">
                  	</div>
                  	<div class="form-group">
                      	<textarea class="form-control" name="peng_detail" id="ckeditor" rows="20" ></textarea>
                  	</div>
                  	<div class="input-group mb-3">
                    	<div class="input-group-prepend">
                      		<span class="input-group-text"><i class="fa fa-image"></i> Gambar</span>
                    	</div>
                    	<div class="custom-file">
                      		<input type="file" class="custom-file-input" id="inputGroupFile02" name="peng_picture" required>
                      		<label class="custom-file-label" for="inputGroupFile02">Pilih file</label>
                    	</div>
                	</div>
              	</div>
              	<div class="modal-footer">
                	<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                	<button type="submit" class="btn btn-primary">Simpan</button></form>
              	</div>
            </div>
        </div>
    </div>
