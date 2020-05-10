<?php if(isset($eror))
    {
      echo $eror;
    } ?>
<br>
<main class="app-content">
  <div class="row">
    <div class="col-md-6">
 

        <!-- Modal -->
        <div class="modal fade bd-example-modal-lg" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Tambah Event</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <form enctype="multipart/form-data" action="<?php echo base_url(); ?>dashboard/event_create" method="POST" id="form">
                  <div class="form-group">
                    <label for="event">Nama Event</label>
                    <input type="text" class="form-control" id="event" aria-describedby="emailHelp" placeholder="Nama Event" name="event_name">
                  </div>
                  <div class="form-group">
                    <label for="demoDate">Tanggal Event</label>
                    <input class="form-control" id="demoDate" type="text" placeholder="Select Date" name="event_date">
                  </div>
                  <div class="form-group">
                      <textarea class="form-control" name="event_detail" id="ckeditor" rows="20" ></textarea>
                  </div>
                  <div class="input-group mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fa fa-image"></i> Gambar</span>
                    </div>
                    <div class="custom-file">
                      <input type="file" class="custom-file-input" id="inputGroupFile02" name="event_picture" required>
                      <label class="custom-file-label" for="inputGroupFile02">Pilih file</label>
                    </div>
                </div>
                
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button></form>
              </div>
            </div>
          </div>
        </div>

    </div>
  </div>
  <div class="row">
    <div class="col-md-12">
      <div class="tile">
        <div class="cf">
          <h3 class="tile-title" style="float: left;">Data Event</h3>
          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter" style="float: right;" id="buttontambah">
          Tambah Event
          </button>
        </div>
        <table id="table" class="table-responsive-sm table table-sm display" cellspacing="0" width="100%">
          <thead>
            <tr>
              <th>No</th>
              <th>Nama Event</th>
              <th>Tanggal Event</th>
              <th>Detail Event</th>
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
          <h2 style="float: left">Laporan Event</h2><a class="btn btn-sm btn-primary ml-1" style="float: right; display: none;" id="cetak">Cetak</a>
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
