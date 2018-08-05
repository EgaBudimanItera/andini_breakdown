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
</script>
