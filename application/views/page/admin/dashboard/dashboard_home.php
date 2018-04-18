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
       
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-sm-12">
      <div class="tile">
        <script type="text/javascript" src="<?php echo base_url(); ?>vendor/ckeditor/ckeditor.js"></script>
        <textarea class="ckeditor" name="news_content"><?php echo 'isi'; ?></textarea>
        <script>
         CKEDITOR.replace('editor1' ,{
                filebrowserImageBrowseUrl : '<?php echo base_url('vendor/kcfinder');?>'
            });
        </script>
      </div>
    </div>
  </div>
</main>
