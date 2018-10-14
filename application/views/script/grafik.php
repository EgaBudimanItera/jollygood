<script type="text/javascript" src="<?=base_url()?>assets_chart/canvasjs/canvasjs.min.js"></script>

<script>
window.onload = function () {

var chart = new CanvasJS.Chart("chartContainer", {
	animationEnabled: true,
	exportEnabled: true,
	theme: "light2", // "light1", "light2", "dark1", "dark2"
	title: {
		fontSize :20,
		text: "Laporan Pendapatan"
	},
	axisY: {
		title: "Jumlah Pendapatan (Rp)",
		interval: 100000,
		 valueFormatString: "#,###",
		 titleFontSize: 12,
		 labelFontSize: 10,
		// suffix: "%",
		// includeZero: false
	},
	axisX: {
		title: "Bulan",
		titleFontSize: 12,
		labelFontSize: 10,
	},
	data: [
	{
		type: "column",
		// yValueFormatString: "#,##0.0#\"%\"",
		showInLegend: true,
		name: "series1",
        legendText: "Pendaftaran",
		dataPoints: [
			<?php foreach($list as $data){?>
			{ label: "<?=$data->bulangabung?>", y: <?=$data->pendaftaran?> },
			<?php }?>	
		]
	},
	{
		type: "column",
		showInLegend: true,
		name: "series2",
        legendText: "SPP",
		// yValueFormatString: "#,##0.0#\"%\"",
		dataPoints: [
			<?php 
				
				foreach($list as $data){
					
			?>
			{ label: "<?=$data->bulangabung?>", y: <?=$data->spp?> },
			<?php }?>
		]
	}
	]
});
chart.render();

}
</script>