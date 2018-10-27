<script type="text/javascript" src="assets/data-tables/jquery.dataTables.js"></script>
<script type="text/javascript" src="assets/data-tables/DT_bootstrap.js"></script>
<script src="<?=base_url()?>assets/js/table-editable.js"></script>
<!-- <script type="text/javascript" src="<?=base_url()?>assets/chosen-bootstrap/chosen/chosen.jquery.min.js"></script> -->

<script>
   jQuery(document).ready(function() {       
       TableEditable.init();
   });
   $(document).ready(function(e){
   		// $('.select2').select2();
		$(document).on('click', '.add_type_unit', function(e){
			$('#modal_type_unit').modal();
			$('#kode_tipe_unit').attr('readonly', false);
			$('#aksitypeunit').val('tambah');
			$('#form_type_unit')[0].reset();
		});

		$(document).on('click', '.editdata', function(e){
			$('#modal_type_unit').modal();
			$('#aksitypeunit').val('edit');
			var id = $(this).attr('id');
			$.ajax({
				url: '<?=base_url()?>master_type_unit/get_type_unit',
				type: 'POST',
				data: 'kdunit='+id,
				dataType: 'JSON',
				success: function(msg){	
					$('#kode_tipe_unit').attr('readonly', true);
					$('#kode_tipe_unit').val(msg.kode_type);
					$('#merk_tipe_unit').val(msg.merk_type);
					$('#jenis_tipe_unit').val(msg.jenis_type);
					$('#idtypeunit').val(msg.id_type_unit);
				}
			});
		});

		$(document).on('submit', '#form_type_unit', function(e){
			e.preventDefault();
			$('#notif_type_unit').html('Loading...');
			var data = $('#form_type_unit').serialize();
			var aksi = $('#aksitypeunit').val();
			if(aksi == 'tambah'){
				$.ajax({
					url: '<?=base_url()?>master_type_unit/save_type_unit',
					type: 'POST',
					data: data,
					dataType: 'JSON',
					success: function(msg){
						if(msg.status == 'sukses'){
							$('#notif_type_unit').html(msg.txt);
							location.reload();
						}else if(msg.status == 'gagal'){
							$('#notif_type_unit').html(msg.txt);
						}
						
					}
				});
			}else if(aksi == 'edit'){
				$.ajax({
					url: '<?=base_url()?>master_type_unit/update_type_unit',
					type: 'POST',
					data: data,
					dataType: 'JSON',
					success: function(msg){
						if(msg.status == 'sukses'){
							$('#notif_type_unit').html(msg.txt);
							location.reload();
						}else if(msg.status == 'gagal'){
							$('#notif_type_unit').html(msg.txt);
						}
						
					}
				});
			}
			
		});

		$(document).on('click', '.deletedata', function(e){
			e.preventDefault();
			$('#modal_type_unit_hapus').modal();
			var id = $(this).attr('id');
			$(document).on('click', '.ya_hapus_type_unit', function(e){
				e.preventDefault();
				$('#notif_type_unit_hapus').html('Loading...');
				$.ajax({
					url: '<?=base_url()?>master_type_unit/delete_type_unit',
					type: 'POST',
					data: 'kdunit='+id,
					dataType: 'JSON',
					success: function(msg){
						if(msg.status == 'sukses'){
							$('#notif_type_unit_hapus').html(msg.txt);
							location.reload();
						}else if(msg.status == 'gagal'){
							$('#notif_type_unit_hapus').html(msg.txt);
						}
						
					}
				});
			});
		});

	});
</script>