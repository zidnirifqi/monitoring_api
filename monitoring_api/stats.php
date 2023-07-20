<?php

	include("connection.php"); 	
	$result=mysqli_query($koneksi,"SELECT * FROM `data` ORDER BY `Date` DESC");
	// $result1=mysqli_query($koneksi,"SELECT * FROM `data` ORDER BY `Date` DESC");
?>
<html>
	<head>
		<title>Statistik Data Harian Rata-Rata</title>
		<link rel="stylesheet" href="./css/style.css">
		<link rel="stylesheet" href="./css/bootstrap.css">
	</head>
	<body>
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<center><h3 style="text-align:right;" class="hijau tebel">Monitoring Api & Asap</h3></center>
			</div>
			<div class="col-md-2">
				&nbsp;
			</div>
		</div>
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<center><h5 style="text-align:right;" class="miring">Data Monitoring Api & Asap</h5></center>
				<hr style="margin-top: 0px; margin-bottom:0px">
			</div>
			<div class="col-md-2">
				&nbsp;
			</div>
		</div>
		<br>
		<div class="row">
			<div class="col-md-2 col-md-offset-2">
				<div class="panel panel-primary">
  					<div class="panel-heading">
    					<h3 class="panel-title tengah">Navigasi</h3>
  					</div>
  					<div class="panel-body" style="padding:0px;">
    					<table class="table table-stripped table-hover" >
							<tbody>
								<tr>
									<td><span class="glyphicon glyphicon-home"></span><a href="./index.php" style="text-decoration:none;"> Home</a></td>
								</tr>
								<tr>
									<td><span class="glyphicon glyphicon-th-list" ></span><a href="./tables.php" style="text-decoration:none;">Histori</a></td>
								</tr>
								<tr  class="info">
									<td><span class="glyphicon glyphicon-stats"></span><a href="./stats.php" style="text-decoration:none;"> Grafik</td>
								</tr>
							</tbody>
						</table>
  					</div>
				</div>	
			</div>
			<div class="col-md-6">
			<div id="container1">
					<br>
				</div>
				<div id="container2">
						
				</div>
						<?php 
		  					if($result!==FALSE){
							    while($row = mysqli_fetch_array($result)) {
									// extract $row;
								    $value = $row['status'];
									$value1= $row['ppm'];
								   	$timestamp = strtotime($row['date'])*1000;
								   	$data1[] = "[$timestamp, $value]";
									$data2[] = "[$timestamp, $value1]";
							    }
								// json_encode($data);
							    mysqli_free_result($result);
							    // mysqli_close();
							}
      					?>
			</div>
		</div>
	</body>
</html>

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
	<script type="text/javascript" src="./js/modules/data.js"></script>
	<script type="text/javascript" src="./js/modules/exporting.js"></script>
	<script type="text/javascript" src="./js/highcharts.js"></script>
	<script type="text/javascript" src="./js/bootstrap.js"></script>
	<script>
		var chart = new Highcharts.Chart({
		      chart: {
		         renderTo: 'container1'
		      },
			  title: {
		            text: 'Grafik Data Status Harian'
		        },
				
			  xAxis: {
		    title: {
		        enabled: true,
		        text: 'Hours of the Day'
		    },
		    type: 'datetime',

		    dateTimeLabelFormats : {
		        hour: '%I %p',
		        minute: '%I:%M %p'
		    }
		},
		      series: [{
		         data: [<?php echo join($data1,',') ?>]
		      }]
		});
		</script>
		<script>
			var chart1 = new Highcharts.Chart({
		      chart: {
		         renderTo: 'container2'
		      },
			  title: {
		            text: 'Grafik Data Kelembaban Harian'
		        },
				
			  xAxis: {
		    title: {
		        enabled: true,
		        text: 'Hours of the Day'
		    },
		    type: 'datetime',

		    dateTimeLabelFormats : {
		        hour: '%I %p',
		        minute: '%I:%M %p'
		    }
		},
		      series: [{
		         data: [<?php echo join($data2,',') ?>]
		      }]
		});
		</script>