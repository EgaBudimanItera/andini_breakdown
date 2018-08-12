<script type="text/javascript" src="<?=base_url()?>assets/data-tables/jquery.dataTables.js"></script>
<script type="text/javascript" src="<?=base_url()?>assets/data-tables/DT_bootstrap.js"></script>

<script src="<?=base_url()?>assets/js/table-editable.js"></script>
<script type="text/javascript" src="<?=base_url()?>assets/bootstrap-inputmask/bootstrap-inputmask.min.js"></script>
<script src="<?=base_url()?>assets/fancybox/source/jquery.fancybox.pack.js"></script>
<script type="text/javascript" src="<?=base_url()?>assets/bootstrap-daterangepicker/date.js"></script>
<script type="text/javascript" src="<?=base_url()?>assets/bootstrap-daterangepicker/daterangepicker.js"></script> 

<script>
   jQuery(document).ready(function() {       
       TableEditable.init();
   });

   
   function konfirmasihapus(){
   	if(confirm("Apakah anda yakin akan menghapus data ini?")){
		return true;
	} else { return false; }
   }

   $(document).ready(function(e){
    	$(document).on('click', '.lihat_laporan', function(e){
    		e.preventDefault();
    		$('#result_laporan').html('Loading...');
        var data = $('#form_laporan').serialize();
        $.ajax({
          url: '<?=base_url()?>laporan_grafik/lihat_grafik_periode',
          type: 'POST',
          data: data,
          success: function(msg){
            $('#result_laporan').html(msg);
          }
        });
    	});
   });
</script>
