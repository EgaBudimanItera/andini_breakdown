<script type="text/javascript" src="assets/data-tables/jquery.dataTables.js"></script>
<script type="text/javascript" src="assets/data-tables/DT_bootstrap.js"></script>

<script src="<?=base_url()?>assets/js/table-editable.js"></script>

<script>
   jQuery(document).ready(function() {       
       TableEditable.init();
   });

   $(document).ready(function(e){
		$(document).on('click', '.add_kerusakan', function(e){
			$('#modal_kerusakan').modal();
		});

		$(document).on('click', '.editdata', function(e){
			$('#modal_kerusakan_edit').modal();
			var id = $(this).attr('id');
			$.ajax({
				url: '<?=base_url()?>master_kerusakan/get_kerusakan',
				type: 'POST',
				data: 'kdkerusakan='+id,
				dataType: 'JSON',
				success: function(msg){					
					$('#kode_kerusakan_edit').val(msg.kdkerusakan);
					$('#nama_kerusakan_edit').val(msg.keterangan);
				}
			});
		});

		$(document).on('click', '.deletedata', function(e){
			e.preventDefault();
			$('#modal_kerusakan_hapus').modal();
			var id = $(this).attr('id');
			$(document).on('click', '.ya_hapus_kerusakan', function(e){
				e.preventDefault();
				$('#notif_kerusakan_hapus').html('Loading...');
				$.ajax({
					url: '<?=base_url()?>master_kerusakan/delete_kerusakan',
					type: 'POST',
					data: 'kdkerusakan='+id,
					dataType: 'JSON',
					success: function(msg){
						if(msg.status == 'sukses'){
							$('#notif_kerusakan_hapus').html(msg.txt);
							location.reload();
						}else if(msg.status == 'gagal'){
							$('#notif_kerusakan_hapus').html(msg.txt);
						}
						
					}
				});
			});
		});

		$(document).on('submit', '#form_kerusakan', function(e){
			e.preventDefault();
			$('#notif_kerusakan').html('Loading...');
			var data = $('#form_kerusakan').serialize();
			$.ajax({
				url: '<?=base_url()?>master_kerusakan/save_kerusakan',
				type: 'POST',
				data: data,
				dataType: 'JSON',
				success: function(msg){
					if(msg.status == 'sukses'){
						$('#notif_kerusakan').html(msg.txt);
						location.reload();
					}else if(msg.status == 'gagal'){
						$('#notif_kerusakan').html(msg.txt);
					}
					
				}
			});
		});

		$(document).on('submit', '#form_kerusakan_edit', function(e){
			e.preventDefault();
			$('#notif_kerusakan_edit').html('Loading...');
			var data = $('#form_kerusakan_edit').serialize();
			$.ajax({
				url: '<?=base_url()?>master_kerusakan/update_kerusakan',
				type: 'POST',
				data: data,
				dataType: 'JSON',
				success: function(msg){
					if(msg.status == 'sukses'){
						$('#notif_kerusakan_edit').html(msg.txt);
						location.reload();
					}else if(msg.status == 'gagal'){
						$('#notif_kerusakan_edit').html(msg.txt);
					}
					
				}
			});
		});

   });
</script>