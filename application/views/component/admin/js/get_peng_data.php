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
	                "url": "<?php echo site_url('dashboard/peng_get_data')?>",
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
	function update_peng(id){
		save_method = "update";
		$('#form')[0].reset();

		$.ajax({
			url:"<?php echo base_url(); ?>dashboard/peng_update_get?id="+id,
			type:"GET",
			dataType :"JSON",
			success: function(data){

				$('[name="peng_name"]').val(data[0].peng_name);
				$('#ckeditor').html(data[0].peng_detail);
				$('#modal').modal('show');
				$('#form').attr('action', '<?php echo base_url(); ?>dashboard/peng_update_set?id='+id);
				$('.modal-title').text('Edit pengumuman');

			}
		})
		
	}
</script>

<script type="text/javascript">
	function delete_peng(id)
	{
		swal({
      		title: "Kamu Serius?",
      		text: "Pengumuman yang kamu pilih akan dihapus!",
      		type: "warning",
      		showCancelButton: true,
      		confirmButtonText: "Ya, Hapus!",
      		cancelButtonText: "Tidak, Batalkan!",
      		closeOnConfirm: false,
      		closeOnCancel: false
      	}, function(isConfirm) {
      		if (isConfirm) {
      			swal("Berhasil!", "Pengumuman yang kamu pilih berhasil di hapus!", "success");
      			$.ajax({
				url  : "<?php echo site_url('dashboard/peng_drop') ?>?id="+id,
				type : "GET",
				dataType : "JSON",
				success  : function(data)
				{
					reload_table();
				}
				})
				reload_table();
      		} else {
      			swal("Batal!", "Pengumuman yang kamu pilih batal dihapus:)", "error");
      		}
      	});

	}
</script>

<script type="text/javascript">
	$('#cek').click(function(){
		var tgl1 = $('#tgl1').val();
		var bln1 = $('#bln1').val();
		var thn1 = $('#thn1').val();
		var tgl2 = $('#tgl2').val();
		var bln2 = $('#bln2').val();
		var thn2 = $('#thn2').val();

		$.ajax({
			url:"<?php echo base_url(); ?>dashboard/peng_report?tgl1="+tgl1+"&bln1="+bln1+"&thn1="+thn1+"&tgl2="+tgl2+"&bln2="+bln2+"&thn2="+thn2,
			type:"GET",
			dataType :"JSON",
			success: function(data){
				$('#tablelaporan > tbody').empty();
				$.each(data, function(i, row){
					$('#tablelaporan').append("<tr><td>"+(i+1)+"</td><td>"+row['peng_name']+"</td><td>"+row['peng_date']+"</td></tr>");
				$('#cetak').show();
				$('#cetak').attr('href','<?php echo base_url(); ?>dashboard/peng_report?tgl1='+tgl1+'&bln1='+bln1+'&thn1='+thn1+'&tgl2='+tgl2+'&bln2='+bln2+'&thn2='+thn2+'&do=down');
				})
			}
		})
	});
</script>
