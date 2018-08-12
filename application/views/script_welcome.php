<script type="text/javascript" src="<?=base_url()?>assets_chart/canvasjs/canvasjs.min.js"></script>

<script>
window.onload = function () {

var chart = new CanvasJS.Chart("chartContainer", {
	animationEnabled: true,
	theme: "light2", // "light1", "light2", "dark1", "dark2"
	title: {
		text: "Jumlah Rata - Rata Kerusakan 5 Unit Teratas"
	},
	axisY: {
		title: "Rata - Rata",
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
			{ label: "<?=$data->namajenis?>-<?=$data->namamerk?>", y: <?=number_format($data->jumlah/$jumlah_hari, 2, '.', ',')?> },
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

}
</script>