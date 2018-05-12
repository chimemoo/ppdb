<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/bootstrap-notify.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/sweetalert.min.js"></script>
<script type="text/javascript">
	var table;
    $(document).ready(function() {
	 
	        //datatables
    table = $('#tablepayment').DataTable({ 
	 
	            "processing": true, 
	            "serverSide": true, 
	            "order": [], 
	             
	            "ajax": {
	                "url": "<?php echo site_url('dashboard/payment_get_data')?>",
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
	function delete_payment(id)
	{
		swal({
      		title: "Kamu Serius?",
      		text: "Payment yang kamu pilih akan dihapus!",
      		type: "warning",
      		showCancelButton: true,
      		confirmButtonText: "Ya, Hapus!",
      		cancelButtonText: "Tidak, Batalkan!",
      		closeOnConfirm: false,
      		closeOnCancel: false
      	}, function(isConfirm) {
      		if (isConfirm) {
      			swal("Berhasil!", "Payment yang kamu pilih berhasil di hapus!", "success");
      			$.ajax({
				url  : "<?php echo site_url('dashboard/payment_drop') ?>?id="+id,
				type : "GET",
				dataType : "JSON",
				success  : function(data)
				{
					reload_table();
				}
				})
				reload_table();
      		} else {
      			swal("Batal!", "Payment yang kamu pilih batal dihapus:)", "error");
      		}
      	});

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
	function confirm_payment(confirm_id,status,regcode)
	{
		$.ajax({
			url:"<?php echo base_url(); ?>dashboard/payment_reg_data?code="+regcode,
			type:"GET",
			dataType:"JSON",
			success: function(data){
				$('[name="kodetransaksi"]').val(data[0].registration_code);
				var user_id = data[0].registration_user_id;
				$('#pengumuman').modal('show');
				$('#form').attr('action', '<?php echo base_url(); ?>dashboard/announce_send?user_id='+user_id);
				$('#kirim').click(function(){
					$.ajax({
						url:"<?php echo base_url(); ?>dashboard/change_status?id="+confirm_id+"&code="+regcode+"&status="+status,
						type:"GET",
						dataType:"JSON",
						success:function(data)
						{
							$('#pengumuman').modal('hide');
							reload_table();
						}
					})
				})
			}
		})
		
	}
</script>

<script type="text/javascript">
	function detail_confirm(id)
	{
		$.ajax({
			url : "<?php echo base_url(); ?>dashboard/detail_payment?id="+id,
			type:"GET",
			dataType:"JSON",
			success:function(data){
				$('#bukti').attr('src', '<?php echo base_url(); ?>uploads/Transfer/'+data[0].confirm_image);
				$('#detailconfirm').modal('show');
			}
		})
	}
</script>

<script type="text/javascript">
	$('#cek').click(function(){
		var tp = $('#tp').val();
		var status = $('#status').val();

		$.ajax({
			url:"<?php echo base_url(); ?>dashboard/siswa_report?tp="+tp+"&status="+status,
			type:"GET",
			dataType :"JSON",
			success: function(data){
				$('#tablelaporan > tbody').empty();
				$.each(data, function(i, row){
					if(row['registration_status'] == 1)
					{
						row['registration_status'] = "Verified";
					}
					else {

						row['registration_status'] = "Unverified";
					}

					$('#tablelaporan').append("<tr><td>"+(i+1)+"</td><td>"+row['registtration_code']+"</td><td>"+row['registration_full_name']+"</td><td>"+row['registration_address']+"</td><td>"+row['registration_numphone']+"</td><td>"+row['registration_status']+"</td></tr>");
					//ADA YG KURANG TABLE JADI BERHENTI
				$('#cetak').show();

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
		html2canvas($('#tablesiswa'),{
			onrendered:function(canvas){
				var img=canvas.toDataURL("./uploads/");
				doc.addImage(img,'JPEG',2,2);
				doc.save('datasiswa.pdf');
			}
		})
	})
</script>