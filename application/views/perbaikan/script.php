<script type="text/javascript" src="assets/data-tables/jquery.dataTables.js"></script>
<script type="text/javascript" src="assets/data-tables/DT_bootstrap.js"></script>

<script src="<?=base_url()?>assets/js/table-editable.js"></script>

<script>
   jQuery(document).ready(function() {       
       TableEditable.init();
   });

   $(document).ready(function(e){
		$(document).on('click', '.add_perbaikan', function(e){
			$('#modal_perbaikan').modal();
		});

		$(document).on('click', '.editdata', function(e){
			$('#modal_perbaikan_edit').modal();
			var id = $(this).attr('id');
			$.ajax({
				url: '<?=base_url()?>master_perbaikan/get_perbaikan',
				type: 'POST',
				data: 'kdperbaikan='+id,
				dataType: 'JSON',
				success: function(msg){					
					$('#kode_perbaikan_edit').val(msg.kdperbaikan);
					$('#nama_perbaikan_edit').val(msg.keterangan);
				}
			});
		});

		$(document).on('click', '.deletedata', function(e){
			e.preventDefault();
			$('#modal_perbaikan_hapus').modal();
			var id = $(this).attr('id');
			$(document).on('click', '.ya_hapus_perbaikan', function(e){
				e.preventDefault();
				$('#notif_perbaikan_hapus').html('Loading...');
				$.ajax({
					url: '<?=base_url()?>master_perbaikan/delete_perbaikan',
					type: 'POST',
					data: 'kdperbaikan='+id,
					dataType: 'JSON',
					success: function(msg){
						if(msg.status == 'sukses'){
							$('#notif_perbaikan_hapus').html(msg.txt);
							location.reload();
						}else if(msg.status == 'gagal'){
							$('#notif_perbaikan_hapus').html(msg.txt);
						}
						
					}
				});
			});
		});

		$(document).on('submit', '#form_perbaikan', function(e){
			e.preventDefault();
			$('#notif_perbaikan').html('Loading...');
			var data = $('#form_perbaikan').serialize();
			$.ajax({
				url: '<?=base_url()?>master_perbaikan/save_perbaikan',
				type: 'POST',
				data: data,
				dataType: 'JSON',
				success: function(msg){
					if(msg.status == 'sukses'){
						$('#notif_perbaikan').html(msg.txt);
						location.reload();
					}else if(msg.status == 'gagal'){
						$('#notif_perbaikan').html(msg.txt);
					}
					
				}
			});
		});

		$(document).on('submit', '#form_perbaikan_edit', function(e){
			e.preventDefault();
			$('#notif_perbaikan_edit').html('Loading...');
			var data = $('#form_perbaikan_edit').serialize();
			$.ajax({
				url: '<?=base_url()?>master_perbaikan/update_perbaikan',
				type: 'POST',
				data: data,
				dataType: 'JSON',
				success: function(msg){
					if(msg.status == 'sukses'){
						$('#notif_perbaikan_edit').html(msg.txt);
						location.reload();
					}else if(msg.status == 'gagal'){
						$('#notif_perbaikan_edit').html(msg.txt);
					}
					
				}
			});
		});

   });
</script>