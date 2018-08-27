<center>
	<h3>Aplikasi Breakdown</h3>
	<p>Grafik <br/> tanggal <?='01 '.date('F').' '.date('Y')?> s/d <?=date('d', strtotime($tanggal_akhir)).' '.date('F').' '.date('Y')?></p>
</center>

<hr/>
<div id="chartContainer" style="height: 370px; max-width: 920px; margin: 0px auto;"></div>
<script type="text/javascript" src="<?=base_url()?>assets/js/jquery-1.8.3.min.js"></script>
<script type="text/javascript" src="<?=base_url()?>assets_chart/canvasjs/canvasjs.min.js"></script>

<script>
$(document).ready(function(e){
var chart = new CanvasJS.Chart("chartContainer", {
	animationEnabled: true,
	exportEnabled: true,
	theme: "light2", // "light1", "light2", "dark1", "dark2"
	title: {
		text: "Grafik Kerusakan komponen"
	},
	axisY: {
		title: "Jumlah",
		// suffix: "%",
		// includeZero: false
	},
	axisX: {
		title: "Unit"
	},
	data: [{
		type: "column",
		// yValueFormatString: "#,##0.0#\"%\"",
		dataPoints: [
			<?php foreach($row->result() as $data){?>
			{ label: "<?=$data->kdkomponen?>-<?=$data->namakomp?>", y: <?=number_format($data->jumlah, 2, '.', ',')?> },
			<?php }?>
				
			// { label: "China", y: 6.70 },	
			// { label: "Indonesia", y: 5.00 },
			// { label: "Australia", y: 2.50 },	
			// { label: "Mexico", y: 2.30 },
			// { label: "UK", y: 1.80 },
			// { label: "United States", y: 1.60 },
			// { label: "Japan", y: 1.60 }
			
		]
	}]
});
chart.render();

});
</script>
