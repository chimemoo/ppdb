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
	function delete_event(id)
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

<script type="text/javascript">
	function update_event(id){
		save_method = "update";
		$('#form')[0].reset();

		$.ajax({
			url:"<?php echo base_url(); ?>dashboard/event_update_get?id="+id,
			type:"GET",
			dataType :"JSON",
			success: function(data){

				$('[name="event_name"]').val(data[0].event_name);
				$('[name="event_date"]').val(data[0].event_date);
				$('#ckeditor').html(data[0].event_detail);
				$('#exampleModalCenter').modal('show');
				$('#form').attr('action', '<?php echo base_url(); ?>dashboard/event_update_set?id='+id);
				$('.modal-title').text('Edit Event');

			}
		})
		
	}
</script>

<script type="text/javascript">
	$('#buttontambah').click(function()
	{
		$('#form')[0].reset();
		$('#form').attr('action', '<?php echo base_url(); ?>dashboard/event_create');
		$('.modal-title').text('Tambah Event');
		$('#ckeditor').html(' ');
	})
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
			url:"<?php echo base_url(); ?>dashboard/event_report?tgl1="+tgl1+"&bln1="+bln1+"&thn1="+thn1+"&tgl2="+tgl2+"&bln2="+bln2+"&thn2="+thn2,
			type:"GET",
			dataType :"JSON",
			success: function(data){
				$('#tablelaporan > tbody').empty();
				$.each(data, function(i, row){
					$('#tablelaporan').append("<tr><td>"+(i+1)+"</td><td>"+row['event_name']+"</td><td>"+row['event_date']+"</td></tr>");
				$('#cetak').show();
				$('#cetak').attr('href', '<?php echo base_url(); ?>dashboard/event_report?tgl1='+tgl1+'&bln1='+bln1+'&thn1='+thn1+'&tgl2='+tgl2+'&bln2='+bln2+'&thn2='+thn2+'&do=down');
				})
			}
		})
	});
</script>

<script type="text/javascript" src="<?php echo base_url(); ?>vendor/html2canvas/html2canvas.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>vendor/jspdf/jspdf.min.js"></script>
<script type="text/javascript">
	var doc = new jsPDF();
	$('#cetak').click(function(){
		html2canvas($('#tablelaporan'),{
			onrendered:function(canvas){
				var img=canvas.toDataURL("./uploads/");
				doc.addImage(img,'JPEG',10,10);
				doc.save('dataevent.pdf');
			}
		})
	})
</script>