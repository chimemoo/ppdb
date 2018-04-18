	
<!-- Essential javascripts for application to work-->
    <script src="<?php echo base_url(); ?>assets/js/jquery-3.2.1.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/popper.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/main.js"></script>
	<script src="<?php echo base_url(); ?>assets/js/plugins/pace.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>vendor/datatables/datatables.min.js"></script>
	<?php if(isset($datatable)) {$this->load->view($datatable);} ?>
    <script type="text/javascript">

 
	    $(document).ready(function() {
	 
		//here first get the contents of the div with name class copy-fields and add it to after "after-add-more" div class.
	      $(".add-more").click(function(){ 
	          var html = $(".copy-fields").html();
	          $(".after-add-more").after(html);
	      });
	//here it will remove the current value of the remove button which has been pressed
	      $("body").on("click",".remove",function(){ 
	          $(this).parents(".control-group").remove();
	      });
	 
	    });
	 
	</script>
    
  </body>
</html>