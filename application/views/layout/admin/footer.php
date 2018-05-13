	
<!-- Essential javascripts for application to work-->
    <script src="<?php echo base_url(); ?>assets/js/jquery-3.2.1.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/popper.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/main.js"></script>
	<script src="<?php echo base_url(); ?>assets/js/plugins/pace.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>vendor/datatables/datatables.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/js/plugins/bootstrap-notify.min.js"></script>
	<?php if(isset($datatable)) {$this->load->view($datatable);} ?>
  <?php if(isset($datatable2)) {$this->load->view($datatable2);} ?>
  <?php if(isset($datatable3)) {$this->load->view($datatable3);} ?>
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


	<!-- Page specific javascripts-->
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/bootstrap-datepicker.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/select2.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/bootstrap-datepicker.min.js"></script>
    <script type="text/javascript">
      $('#sl').click(function(){
      	$('#tl').loadingBtn();
      	$('#tb').loadingBtn({ text : "Signing In"});
      });
      
      $('#el').click(function(){
      	$('#tl').loadingBtnComplete();
      	$('#tb').loadingBtnComplete({ html : "Sign In"});
      });
      
      $('#demoDate').datepicker({
      	format: "dd/mm/yyyy",
      	autoclose: true,
      	todayHighlight: true
      });
      
      $('#demoSelect').select2();
    </script>
    <!-- Google analytics script-->
    <script type="text/javascript">
      if(document.location.hostname == 'pratikborsadiya.in') {
      	(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      	(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      	m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      	})(window,document,'script','//www.google-analytics.com/analytics.js','ga');
      	ga('create', 'UA-72504830-1', 'auto');
      	ga('send', 'pageview');
      }
    </script>

    
  </body>
</html>