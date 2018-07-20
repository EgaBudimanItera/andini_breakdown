<script type="text/javascript" src="assets/data-tables/jquery.dataTables.js"></script>
<script type="text/javascript" src="assets/data-tables/DT_bootstrap.js"></script>

<script src="<?=base_url()?>assets/js/table-editable.js"></script>

<script>
   jQuery(document).ready(function() {       
       TableEditable.init();
   });

   $(document).ready(function(e){
		$(document).on('click', '.add_komponen', function(e){
			$('#modal_komponen').modal();
		});

		$(document).on('click', '.editdata', function(e){
			$('#modal_komponen_edit').modal();
			var id = $(this).attr('id');
			$.ajax({
				url: '<?=base_url()?>master_komponen/get_komponen',
				type: 'POST',
				data: 'kdkomponen='+id,
				dataType: 'JSON',
				success: function(msg){					
					$('#kode_komponen_edit').val(msg.kdkomp);
					$('#nama_komponen_edit').val(msg.namakomp);
					$('#keterangan_komponen_edit').val(msg.ketkomp);
				}
			});
		});

		$(document).on('click', '.deletedata', function(e){
			e.preventDefault();
			$('#modal_komponen_hapus').modal();
			var id = $(this).attr('id');
			$(document).on('click', '.ya_hapus_komponen', function(e){
				e.preventDefault();
				$('#notif_komponen_hapus').html('Loading...');
				$.ajax({
					url: '<?=base_url()?>master_komponen/delete_komponen',
					type: 'POST',
					data: 'kdkomponen='+id,
					dataType: 'JSON',
					success: function(msg){
						if(msg.status == 'sukses'){
							$('#notif_komponen_hapus').html(msg.txt);
							location.reload();
						}else if(msg.status == 'gagal'){
							$('#notif_komponen_hapus').html(msg.txt);
						}
						
					}
				});
			});
		});

		$(document).on('submit', '#form_komponen', function(e){
			e.preventDefault();
			$('#notif_komponen').html('Loading...');
			var data = $('#form_komponen').serialize();
			$.ajax({
				url: '<?=base_url()?>master_komponen/save_komponen',
				type: 'POST',
				data: data,
				dataType: 'JSON',
				success: function(msg){
					if(msg.status == 'sukses'){
						$('#notif_komponen').html(msg.txt);
						location.reload();
					}else if(msg.status == 'gagal'){
						$('#notif_komponen').html(msg.txt);
					}
					
				}
			});
		});

		$(document).on('submit', '#form_komponen_edit', function(e){
			e.preventDefault();
			$('#notif_komponen_edit').html('Loading...');
			var data = $('#form_komponen_edit').serialize();
			$.ajax({
				url: '<?=base_url()?>master_komponen/update_komponen',
				type: 'POST',
				data: data,
				dataType: 'JSON',
				success: function(msg){
					if(msg.status == 'sukses'){
						$('#notif_komponen_edit').html(msg.txt);
						location.reload();
					}else if(msg.status == 'gagal'){
						$('#notif_komponen_edit').html(msg.txt);
					}
					
				}
			});
		});

   });
</script>