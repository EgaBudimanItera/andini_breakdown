<script type="text/javascript" src="assets/data-tables/jquery.dataTables.js"></script>
<script type="text/javascript" src="assets/data-tables/DT_bootstrap.js"></script>

<script src="<?=base_url()?>assets/js/table-editable.js"></script>

<script>
   jQuery(document).ready(function() {       
       TableEditable.init();
   });

   $(document).ready(function(e){
		$(document).on('click', '.add_unit', function(e){
			$('#modal_unit').modal();
			$('#kode_unit').attr('readonly', false);
			$('#aksiunit').val('tambah');
			$('#form_unit')[0].reset();
		});

		$(document).on('click', '.editdata', function(e){
			$('#modal_unit').modal();
			$('#aksiunit').val('edit');
			var id = $(this).attr('id');
			$.ajax({
				url: '<?=base_url()?>master_unit/get_unit',
				type: 'POST',
				data: 'kdunit='+id,
				dataType: 'JSON',
				success: function(msg){	
					$('#kode_unit').attr('readonly', true);
					$('#kode_unit').val(msg.kdunit);
					$('#tipe_unit').val(msg.tipeunit);
					$('#kode_jenis').val(msg.kdjenis);
					$('#kode_merk').val(msg.kdmerk);
					$('#wilayah_unit').val(msg.wilayahunit);
					$('#hmawal').val(msg.hmawal);
					$('#hmakhir').val(msg.hmakhir);			
					// $('#kode_unit_edit').val(msg.kdunit);
					// $('#tipe_unit_edit').val(msg.tipeunit);
					// $('#kode_jenis_edit').val(msg.kdjenis);
					// $('#kode_merk_edit').val(msg.kdmerk);
					// $('#wilayah_unit_edit').val(msg.wilayahunit);
					// $('#hmawal_edit').val(msg.hmawal);
					// $('#hmakhir_edit').val(msg.hmakhir);
				}
			});
		});

		$(document).on('click', '.deletedata', function(e){
			e.preventDefault();
			$('#modal_unit_hapus').modal();
			var id = $(this).attr('id');
			$(document).on('click', '.ya_hapus_unit', function(e){
				e.preventDefault();
				$('#notif_unit_hapus').html('Loading...');
				$.ajax({
					url: '<?=base_url()?>master_unit/delete_unit',
					type: 'POST',
					data: 'kdunit='+id,
					dataType: 'JSON',
					success: function(msg){
						if(msg.status == 'sukses'){
							$('#notif_unit_hapus').html(msg.txt);
							location.reload();
						}else if(msg.status == 'gagal'){
							$('#notif_unit_hapus').html(msg.txt);
						}
						
					}
				});
			});
		});

		$(document).on('change', '#tipe_unit', function(e){
			e.preventDefault();
			var id = $(this).val();
			$.ajax({
				url: '<?=base_url()?>master_unit/get_type_unit',
				type: 'POST',
				data: 'kdunit='+id,
				dataType: 'JSON',
				success: function(msg){
					$('#kode_jenis').val(msg.jenis_type);
					$('#kode_merk').val(msg.merk_type);		
					$('#nama_jenis').val(msg.namajenis);
					$('#nama_merk').val(msg.namamerk);				
				}
			});
		});

		$(document).on('submit', '#form_unit', function(e){
			e.preventDefault();
			$('#notif_unit').html('Loading...');
			var data = $('#form_unit').serialize();
			var aksi = $('#aksiunit').val();
			if(aksi == 'tambah'){
				$.ajax({
					url: '<?=base_url()?>master_unit/save_unit',
					type: 'POST',
					data: data,
					dataType: 'JSON',
					success: function(msg){
						if(msg.status == 'sukses'){
							$('#notif_unit').html(msg.txt);
							location.reload();
						}else if(msg.status == 'gagal'){
							$('#notif_unit').html(msg.txt);
						}
						
					}
				});
			}else if(aksi == 'edit'){
				$.ajax({
					url: '<?=base_url()?>master_unit/update_unit',
					type: 'POST',
					data: data,
					dataType: 'JSON',
					success: function(msg){
						if(msg.status == 'sukses'){
							$('#notif_unit').html(msg.txt);
							location.reload();
						}else if(msg.status == 'gagal'){
							$('#notif_unit').html(msg.txt);
						}
						
					}
				});
			}
			
		});

		$(document).on('submit', '#form_unit_edit', function(e){
			e.preventDefault();
			$('#notif_unit_edit').html('Loading...');
			var data = $('#form_unit_edit').serialize();
			$.ajax({
				url: '<?=base_url()?>master_unit/update_unit',
				type: 'POST',
				data: data,
				dataType: 'JSON',
				success: function(msg){
					if(msg.status == 'sukses'){
						$('#notif_unit_edit').html(msg.txt);
						location.reload();
					}else if(msg.status == 'gagal'){
						$('#notif_unit_edit').html(msg.txt);
					}
					
				}
			});
		});

   });
</script>