<script type="text/javascript" src="assets/data-tables/jquery.dataTables.js"></script>
<script type="text/javascript" src="assets/data-tables/DT_bootstrap.js"></script>

<script src="<?=base_url()?>assets/js/table-editable.js"></script>

<script>
   jQuery(document).ready(function() {       
       TableEditable.init();
   });

   $(document).ready(function(e){
		$(document).on('click', '.add_jenis', function(e){
			$('#modal_jenis').modal();
		});

		$(document).on('click', '.editdata', function(e){
			$('#modal_jenis_edit').modal();
			var id = $(this).attr('id');
			$.ajax({
				url: '<?=base_url()?>master_jenis/get_jenis',
				type: 'POST',
				data: 'kdjenis='+id,
				dataType: 'JSON',
				success: function(msg){					
					$('#kode_jenis_edit').val(msg.kdjenis);
					$('#nama_jenis_edit').val(msg.namajenis);
				}
			});
		});

		$(document).on('click', '.deletedata', function(e){
			e.preventDefault();
			$('#modal_jenis_hapus').modal();
			var id = $(this).attr('id');
			$(document).on('click', '.ya_hapus_jenis', function(e){
				e.preventDefault();
				$('#notif_jenis_hapus').html('Loading...');
				$.ajax({
					url: '<?=base_url()?>master_jenis/delete_jenis',
					type: 'POST',
					data: 'kdjenis='+id,
					dataType: 'JSON',
					success: function(msg){
						if(msg.status == 'sukses'){
							$('#notif_jenis_hapus').html(msg.txt);
							location.reload();
						}else if(msg.status == 'gagal'){
							$('#notif_jenis_hapus').html(msg.txt);
						}
						
					}
				});
			});
		});

		$(document).on('submit', '#form_jenis', function(e){
			e.preventDefault();
			$('#notif_jenis').html('Loading...');
			var data = $('#form_jenis').serialize();
			$.ajax({
				url: '<?=base_url()?>master_jenis/save_jenis',
				type: 'POST',
				data: data,
				dataType: 'JSON',
				success: function(msg){
					if(msg.status == 'sukses'){
						$('#notif_jenis').html(msg.txt);
						location.reload();
					}else if(msg.status == 'gagal'){
						$('#notif_jenis').html(msg.txt);
					}
					
				}
			});
		});

		$(document).on('submit', '#form_jenis_edit', function(e){
			e.preventDefault();
			$('#notif_jenis_edit').html('Loading...');
			var data = $('#form_jenis_edit').serialize();
			$.ajax({
				url: '<?=base_url()?>master_jenis/update_jenis',
				type: 'POST',
				data: data,
				dataType: 'JSON',
				success: function(msg){
					if(msg.status == 'sukses'){
						$('#notif_jenis_edit').html(msg.txt);
						location.reload();
					}else if(msg.status == 'gagal'){
						$('#notif_jenis_edit').html(msg.txt);
					}
					
				}
			});
		});

   });
</script>