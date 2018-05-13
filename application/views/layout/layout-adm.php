<?php

    $this->load->view('layout/admin/header');
    if($title != "Admin Dashboard - Login")
    {
    	$this->load->view('layout/admin/navigation');
    }
    $this->load->view($content);
    $this->load->view('layout/admin/footer');

?>
<?php

	if(null!==$this->session->flashdata('failed')){

	?>
		<script type="text/javascript">
			$(document).ready(function(){
		      	$.notify({
		      	title: "Gagal",
		      	message: "<?php echo $this->session->flashdata('failed'); ?>",
		      	icon: 'fa fa-close' 
		      	},{
		      		type: "danger"
		     	});
		    });
		</script>
	<?php
		
		}

?>

<?php

	if(null!==$this->session->flashdata('sukses')){

	?>
		<script type="text/javascript">
			$(document).ready(function(){
		      	$.notify({
		      	title: "Sukses",
		      	message: "<?php echo $this->session->flashdata('sukses'); ?>",
		      	icon: 'fa fa-close' 
		      	},{
		      		type: "primary"
		     	});
		    });
		</script>
	<?php
		
		}

?>