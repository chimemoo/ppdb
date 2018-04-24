<?php if(isset($eror))
    {
      echo $eror;
    } ?>
<br>
<main class="app-content">
  <div class="row">
    <div class="col-md-6">
      <div class="tile">
        <h3 class="tile-title">Data User</h3>
        <table id="table" class="table-responsive-sm table table-sm display" cellspacing="0" width="100%">
          <thead>
            <tr>
              <th>No</th>
              <th>Username</th>
              <th>Email</th>
            </tr>
          </thead>
          <tbody>
          </tbody>
        </table>
      </div>
    </div>
    <div class="col-md-6">
      <div class="tile">
        <div class="cf">
          <h3 class="tile-title" style="float: left;">Data Admin</h3>
          <button type="button" style="float: right;" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#addadmin">
            Tambah Admin
          </button>
        </div>
        <table id="tableadmin" class="table-responsive-sm table table-sm display" cellspacing="0" width="100%">
          <thead>
            <tr>
              <th>No</th>
              <th>Username</th>
              <th>Email</th>
            </tr>
          </thead>
          <tbody>
          </tbody>
        </table>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-sm-12">
      <div class="tile">
        <h3 class="tile-title">Posting Berita</h3>
        <form action="<?php echo base_url(); ?>dashboard/news_create" method="POST">
          <div class="form-group">
            <label for="title">Judul</label>
            <input type="text" class="form-control" id="title" placeholder="Masukkan Judul" name="news_title">
          </div>
          <script type="text/javascript" src="<?php echo base_url(); ?>vendor/ckeditor/ckeditor.js"></script>
            <textarea class="ckeditor" name="news_content"><?php echo 'isi'; ?></textarea>
            <script>
             CKEDITOR.replace('editor1' ,{
                    filebrowserImageBrowseUrl : '<?php echo base_url('vendor/kcfinder');?>'
                });
            </script>
            <br>
            <div class="form-group">
              <input type="submit" value="Posting" class="btn btn-primary">
            </div>
        </form>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-sm-12">
      <div class="tile">
        <h3 class="tile-title">Daftar Berita</h3>
        <table id="tablenews" class="table-responsive-sm table table-sm display" cellspacing="0" width="100%">
          <thead>
            <tr>
              <th>No</th>
              <th>Judul Artikel</th>
              <th>Tanggal</th>
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
<!-- MODAL -->
<div class="modal fade bd-example-modal-lg" id="addadmin" tabindex="-1" role="dialog" aria-labelledby="addadmin" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Tambah Admin</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form enctype="multipart/form-data" action="<?php echo base_url(); ?>dashboard/admin_create" method="POST" id="form">
          <div class="form-group">
            <label for="username">Username :</label>
            <input type="text" id="username" class="form-control" name="username">
          </div>
          <div class="form-group">
            <label for="email">Email :</label>
            <input type="email" id="email" class="form-control" name="email">
          </div>
          <div class="form-group">
            <label for="password">Password :</label>
            <input type="password" id="password" class="form-control" name="password">
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button></form>
      </div>
    </div>
  </div>
</div>
