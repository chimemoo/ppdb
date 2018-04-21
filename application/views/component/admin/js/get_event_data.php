<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/bootstrap-notify.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/sweetalert.min.js"></script>
<script type="text/javascript">
	var table;
    $(document).ready(function() {
	 
	        //datatables
    table = $('#table').DataTable({ 
	 
	            "processing": true, 
	            "serverSide": true, 
	            "order": [], 
	             
	            "ajax": {
	                "url": "<?php echo site_url('dashboard/event_get_data')?>",
	                "type": "POST"
	            },
	 
	             
	            "columnDefs": [
	            { 
	                "targets": [ 0 ], 
	                "orderable": false, 
	            },
	            ],
	 
	    });
	 
	});
</script>


<script type="text/javascript">
	function delete_vendor(id)
	{
		swal({
      		title: "Kamu Serius?",
      		text: "Event yang kamu pilih akan dihapus!",
      		type: "warning",
      		showCancelButton: true,
      		confirmButtonText: "Ya, Hapus!",
      		cancelButtonText: "Tidak, Batalkan!",
      		closeOnConfirm: false,
      		closeOnCancel: false
      	}, function(isConfirm) {
      		if (isConfirm) {
      			swal("Berhasil!", "Event yang kamu pilih berhasil di hapus!", "success");
      			$.ajax({
				url  : "<?php echo site_url('dashboard/event_drop') ?>?id="+id,
				type : "GET",
				dataType : "JSON",
				success  : function(data)
				{
					reload_table();
				}
				})
				reload_table();
      		} else {
      			swal("Batal!", "Event yang kamu pilih batal dihapus:)", "error");
      		}
      	});

	}
</script>

<script type="text/javascript">
	function reload_table()
	{
		table.ajax.reload(null,false);
	}
</script>

<script type="text/javascript">
	$(window).bind("load", function(){
		window.setTimeout(function(){
			$(".alert").fadeTo(500,0).slideUp(500, function(){
				$(this).remove();
			});
		}, 500);
	});
</script>

<script type="text/javascript">
      function add_success(){
      	$.notify({
      		title: "Berhasil : ",
      		message: "Data Berhasil Ditambahkan",
      		icon: 'fa fa-check' 
      	},{
      		type: "info"
      	});
      };
</script>