<script type="text/javascript" src="assets/data-tables/jquery.dataTables.js"></script>
<script type="text/javascript" src="assets/data-tables/DT_bootstrap.js"></script>

<script src="<?=base_url()?>assets/js/table-editable.js"></script>

<script>
   jQuery(document).ready(function() {       
       TableEditable.init();
   });

   $(document).ready(function(e){
		$(document).on('click', '.add_merk', function(e){
			$('#modal_merk').modal();
		});

		$(document).on('click', '.editdata', function(e){
			$('#modal_merk_edit').modal();
			var id = $(this).attr('id');
			$.ajax({
				url: '<?=base_url()?>master_merk/get_merk',
				type: 'POST',
				data: 'kdmerk='+id,
				dataType: 'JSON',
				success: function(msg){					
					$('#kode_merk_edit').val(msg.kdmerk);
					$('#nama_merk_edit').val(msg.namamerk);
				}
			});
		});

		$(document).on('click', '.deletedata', function(e){
			e.preventDefault();
			$('#modal_merk_hapus').modal();
			var id = $(this).attr('id');
			$(document).on('click', '.ya_hapus_merk', function(e){
				e.preventDefault();
				$('#notif_merk_hapus').html('Loading...');
				$.ajax({
					url: '<?=base_url()?>master_merk/delete_merk',
					type: 'POST',
					data: 'kdmerk='+id,
					dataType: 'JSON',
					success: function(msg){
						if(msg.status == 'sukses'){
							$('#notif_merk_hapus').html(msg.txt);
							location.reload();
						}else if(msg.status == 'gagal'){
							$('#notif_merk_hapus').html(msg.txt);
						}
						
					}
				});
			});
		});

		$(document).on('submit', '#form_merk', function(e){
			e.preventDefault();
			$('#notif_merk').html('Loading...');
			var data = $('#form_merk').serialize();
			$.ajax({
				url: '<?=base_url()?>master_merk/save_merk',
				type: 'POST',
				data: data,
				dataType: 'JSON',
				success: function(msg){
					if(msg.status == 'sukses'){
						$('#notif_merk').html(msg.txt);
						location.reload();
					}else if(msg.status == 'gagal'){
						$('#notif_merk').html(msg.txt);
					}
					
				}
			});
		});

		$(document).on('submit', '#form_merk_edit', function(e){
			e.preventDefault();
			$('#notif_merk_edit').html('Loading...');
			var data = $('#form_merk_edit').serialize();
			$.ajax({
				url: '<?=base_url()?>master_merk/update_merk',
				type: 'POST',
				data: data,
				dataType: 'JSON',
				success: function(msg){
					if(msg.status == 'sukses'){
						$('#notif_merk_edit').html(msg.txt);
						location.reload();
					}else if(msg.status == 'gagal'){
						$('#notif_merk_edit').html(msg.txt);
					}
					
				}
			});
		});

   });
</script>