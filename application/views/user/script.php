<script type="text/javascript" src="assets/data-tables/jquery.dataTables.js"></script>
<script type="text/javascript" src="assets/data-tables/DT_bootstrap.js"></script>

<script src="<?=base_url()?>assets/js/table-editable.js"></script>

<script>
   jQuery(document).ready(function() {       
       TableEditable.init();
   });

   $(document).ready(function(e){
		$(document).on('click', '.add_user', function(e){
			$('#modal_user').modal();
		});

		$(document).on('click', '.editdata', function(e){
			$('#modal_user_edit').modal();
			var id = $(this).attr('id');
			$.ajax({
				url: '<?=base_url()?>master_user/get_user',
				type: 'POST',
				data: 'kduser='+id,
				dataType: 'JSON',
				success: function(msg){					
					$('#kode_user_edit').val(msg.id_user);
					$('#nama_user_edit').val(msg.nama);
					$('#username_edit').val(msg.username);
					$('#hak_akses_edit').val(msg.hak_akses);
					$('#password_edit').val(msg.password);
				}
			});
		});

		$(document).on('click', '.deletedata', function(e){
			e.preventDefault();
			$('#modal_user_hapus').modal();
			var id = $(this).attr('id');
			$(document).on('click', '.ya_hapus_user', function(e){
				e.preventDefault();
				$('#notif_user_hapus').html('Loading...');
				$.ajax({
					url: '<?=base_url()?>master_user/delete_user',
					type: 'POST',
					data: 'kduser='+id,
					dataType: 'JSON',
					success: function(msg){
						if(msg.status == 'sukses'){
							$('#notif_user_hapus').html(msg.txt);
							location.reload();
						}else if(msg.status == 'gagal'){
							$('#notif_user_hapus').html(msg.txt);
						}
						
					}
				});
			});
		});

		$(document).on('submit', '#form_user', function(e){
			e.preventDefault();
			$('#notif_user').html('Loading...');
			var data = $('#form_user').serialize();
			$.ajax({
				url: '<?=base_url()?>master_user/save_user',
				type: 'POST',
				data: data,
				dataType: 'JSON',
				success: function(msg){
					if(msg.status == 'sukses'){
						$('#notif_user').html(msg.txt);
						location.reload();
					}else if(msg.status == 'gagal'){
						$('#notif_user').html(msg.txt);
					}
					
				}
			});
		});

		$(document).on('submit', '#form_user_edit', function(e){
			e.preventDefault();
			$('#notif_user_edit').html('Loading...');
			var data = $('#form_user_edit').serialize();
			$.ajax({
				url: '<?=base_url()?>master_user/update_user',
				type: 'POST',
				data: data,
				dataType: 'JSON',
				success: function(msg){
					if(msg.status == 'sukses'){
						$('#notif_user_edit').html(msg.txt);
						location.reload();
					}else if(msg.status == 'gagal'){
						$('#notif_user_edit').html(msg.txt);
					}
					
				}
			});
		});

   });
</script>