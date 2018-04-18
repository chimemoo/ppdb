<?php if(isset($eror))
    {
      echo $eror;
    } ?>
<br>
<main class="app-content">
  <div class="row">
    <div class="col-md-6">
      <div class="tile">
        <h3 class="tile-title">Action</h3>
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
          Tambah Event
        </button>

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
                <form action="">
                  <div class="form-group">
                    <label for="event">Nama Event</label>
                    <input type="email" class="form-control" id="event" aria-describedby="emailHelp" placeholder="Nama Event">
                  </div>
                  <div class="form-group">
                    <label for="demoDate">Tanggal Event</label>
                    <input class="form-control" id="demoDate" type="text" placeholder="Select Date">
                  </div>
                  <div class="form-group">
                    <script type="text/javascript" src="<?php echo base_url(); ?>vendor/ckeditor/ckeditor.js"></script>
                      <textarea class="ckeditor" name="event_content"><?php echo 'isi'; ?></textarea>
                      <script>
                       CKEDITOR.replace('editor1' ,{
                              filebrowserImageBrowseUrl : '<?php echo base_url('vendor/kcfinder');?>'
                          });
                      </script>
                  </div>
                </form>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12">
      <div class="tile">
        <h3 class="tile-title">Data Event</h3>
        <table id="table" class="table-responsive-sm table table-sm display" cellspacing="0" width="100%">
          <thead>
            <tr>
              <th>No</th>
              <th>Nama Event</th>
              <th>Tanggal Event</th>
              <th>Detail Event</th>
            </tr>
          </thead>
          <tbody>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</main>