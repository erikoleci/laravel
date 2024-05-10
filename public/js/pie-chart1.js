$(document).ready(function(){
	'use strict';

	am4core.useTheme(am4themes_animated);
	var chart = am4core.create("piechart", am4charts.PieChart3D);

	chart.data = [{
		"type": "Promo",
		"accounts": 501.9
	}, {
		"type": "Black Panther",
		"accounts": 301.9
	}, {
		"type": "Bull Bear",
		"accounts": 201.1
	}, {
		"type": "Phoenix",
		"accounts": 165.8
	}, {
		"type": "Kings",
		"accounts": 139.9
	}];
	chart.innerRadius = am4core.percent(0);
	chart.depth = 50;

	chart.legend = new am4charts.Legend();
	chart.legend.position = "bottom";

	var series = chart.series.push(new am4charts.PieSeries3D());
	series.dataFields.value = "accounts";
	series.dataFields.depthValue = "accounts";
	series.dataFields.category = "type";
});