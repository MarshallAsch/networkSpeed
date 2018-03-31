<?php

	include_once "networkSql.php";

	$hermes = getEntries("hermes");
	$hades = getEntries("hades");
	$apollo = getEntries("apollo");


	$upload = array(array(),array(),array());
	$download = array(array(),array(),array());
	$ping = array(array(),array(),array());


	// hermes results
	if ($hermes->num_rows > 0) {
		// output data of each row
		while($row = $hermes->fetch_assoc()) {

			$y1 = floatval(substr($row["download"], 0, strlen($row["download"]) - 7));
			$y2 = floatval(substr($row["upload"], 0, strlen($row["upload"]) - 7));
			$y3 = floatval(substr($row["ping"], 0, strlen($row["ping"]) - 3));


			$x = strtotime($row["time"]);

			array_push($download[0], array("x" => $x, "y" => $y1));
			array_push($upload[0], array("x" => $x, "y" => $y2));
			array_push($ping[0], array("x" => $x, "y" => $y3));

		}
	} else {
		echo "0 results";
	}


	// hades results
	if ($hades->num_rows > 0) {
		// output data of each row
		while($row = $hades->fetch_assoc()) {

			$y1 = floatval(substr($row["download"], 0, strlen($row["download"]) - 7));
			$y2 = floatval(substr($row["upload"], 0, strlen($row["upload"]) - 7));
			$y3 = floatval(substr($row["ping"], 0, strlen($row["ping"]) - 3));


			$x = strtotime($row["time"]);

			array_push($download[1], array("x" => $x, "y" => $y1));
			array_push($upload[1], array("x" => $x, "y" => $y2));
			array_push($ping[1], array("x" => $x, "y" => $y3));

		}
	} else {
		echo "0 results";
	}

	// apollo results
	if ($apollo->num_rows > 0) {
		// output data of each row
		while($row = $apollo->fetch_assoc()) {

			$y1 = floatval(substr($row["download"], 0, strlen($row["download"]) - 7));
			$y2 = floatval(substr($row["upload"], 0, strlen($row["upload"]) - 7));
			$y3 = floatval(substr($row["ping"], 0, strlen($row["ping"]) - 3));


			$x = strtotime($row["time"]);

			array_push($download[2], array("x" => $x, "y" => $y1));
			array_push($upload[2], array("x" => $x, "y" => $y2));
			array_push($ping[2], array("x" => $x, "y" => $y3));

		}
	} else {
		echo "0 results";
	}
?>


<!DOCTYPE HTML>
<html>
<head>
<script>
window.onload = function () {


var chartA = new CanvasJS.Chart("download", {
	animationEnabled: true,
	title:{
		text: "Download Speed"
	},
	axisY: {
		title: "Mbit/s",
		suffix: " Mbit/s"
	},
	data: [{
		name: "Hermes",
		showInLegend: true,
		legendText: "Hermes",
		type: "spline",
		markerSize: 5,
		xValueFormatString: "HH:mm",
		yValueFormatString: "#,##0.## Mbit/s",
		xValueType: "dateTime",
		dataPoints: <?php echo json_encode($download[0], JSON_NUMERIC_CHECK); ?>
	},
	{
		name: "Hades",
		showInLegend: true,
		legendText: "Hades",
		type: "spline",
		markerSize: 5,
		xValueFormatString: "HH:mm",
		yValueFormatString: "#,##0.## Mbit/s",
		xValueType: "dateTime",
		dataPoints: <?php echo json_encode($download[1], JSON_NUMERIC_CHECK); ?>
	},
	{
		name: "Apollo",
		showInLegend: true,
		legendText: "Apollo",
		type: "spline",
		markerSize: 5,
		xValueFormatString: "HH:mm",
		yValueFormatString: "#,##0.## Mbit/s",
		xValueType: "dateTime",
		dataPoints: <?php echo json_encode($download[2], JSON_NUMERIC_CHECK); ?>
	}]
});


var chartB = new CanvasJS.Chart("upload", {
	animationEnabled: true,
	title:{
		text: "Upload Speed"
	},
	axisY: {
		title: "Mbit/s",
		suffix: " Mbit/s"
	},
	data: [{
		name: "Hermes",
		showInLegend: true,
		legendText: "Hermes",
		type: "spline",
		markerSize: 5,
		xValueFormatString: "HH:mm",
		yValueFormatString: "#,##0.## Mbit/s",
		xValueType: "dateTime",
		dataPoints: <?php echo json_encode($upload[0], JSON_NUMERIC_CHECK); ?>
	},
	{
		name: "Hades",
		showInLegend: true,
		legendText: "Hades",
		type: "spline",
		markerSize: 5,
		xValueFormatString: "HH:mm",
		yValueFormatString: "#,##0.## Mbit/s",
		xValueType: "dateTime",
		dataPoints: <?php echo json_encode($upload[1], JSON_NUMERIC_CHECK); ?>
	},
	{
		name: "Apollo",
		showInLegend: true,
		legendText: "Apollo",
		type: "spline",
		markerSize: 5,
		xValueFormatString: "HH:mm",
		yValueFormatString: "#,##0.## Mbit/s",
		xValueType: "dateTime",
		dataPoints: <?php echo json_encode($upload[2], JSON_NUMERIC_CHECK); ?>
	}]
});


var chartC = new CanvasJS.Chart("ping", {
	animationEnabled: true,
	title:{
		text: "Ping Times"
	},
	axisY: {
		title: "ms",
		suffix: " ms"
	},
	data: [{
		name: "Hermes",
		showInLegend: true,
		legendText: "Hermes",
		type: "spline",
		markerSize: 5,
		xValueFormatString: "HH:mm",
		yValueFormatString: "#,##0.### ms",
		xValueType: "dateTime",
		dataPoints: <?php echo json_encode($ping[0], JSON_NUMERIC_CHECK); ?>
	},
	{
		name: "Hades",
		showInLegend: true,
		legendText: "Hades",
		type: "spline",
		markerSize: 5,
		xValueFormatString: "HH:mm",
		yValueFormatString: "#,##0.## Mbit/s",
		xValueType: "dateTime",
		dataPoints: <?php echo json_encode($ping[1], JSON_NUMERIC_CHECK); ?>
	},
	{
		name: "Apollo",
		showInLegend: true,
		legendText: "Apollo",
		type: "spline",
		markerSize: 5,
		xValueFormatString: "HH:mm",
		yValueFormatString: "#,##0.## Mbit/s",
		xValueType: "dateTime",
		dataPoints: <?php echo json_encode($ping[2], JSON_NUMERIC_CHECK); ?>
	}]
});


chartA.render();
chartB.render();
chartC.render();

}
</script>
</head>
<body>

<br>

<div id="download" style="height: 370px; width: 100%;"></div>
<br>
<div id="upload" style="height: 370px; width: 100%;"></div>
<br>
<div id="ping" style="height: 370px; width: 100%;"></div>


<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
</body>
</html>