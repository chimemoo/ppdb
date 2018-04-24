<script type="text/javascript">
	var table;
    $(document).ready(function() {
	 
	        //datatables
    table = $('#tableadmin').DataTable({ 
	 
	            "processing": true, 
	            "serverSide": true, 
	            "order": [], 
	             
	            "ajax": {
	                "url": "<?php echo site_url('dashboard/admin_get_data')?>",
	                "type": "POST"
	            },
	 
	            buttons: [
		            'pdfHtml5'
		        ],

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
	function reload_table()
	{
		table.ajax.reload(null,false);
	}
</script>



<script type="text/javascript">
	function delete_vendor(id)
	{
		if(confirm('Apakah anda yakin menghapus data ini?')){

			$.ajax({
				url  : "<?php echo site_url('adminpanel/dropvendor') ?>/"+id,
				type : "POST",
				dataType : "JSON",
				success  : function(data)
				{
					reload_table();
				},
				error : function(jqXHR, textStatus,errorThrown)
				{
					alert('Eror Hapus data');
				}
			})
		}
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

