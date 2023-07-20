<?php

	include("connection.php"); 	
	$result=mysqli_query($koneksi,"SELECT * FROM `data` ORDER BY `Date` DESC LIMIT 10");
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
								<tr class="info">
									<td><span class="glyphicon glyphicon-th-list" ></span><a href="./tables.php" style="text-decoration:none;">Histori</a></td>
								</tr>
								<tr>
									<td><span class="glyphicon glyphicon-stats"></span><a href="./stats.php" style="text-decoration:none;">Grafik</td>
								</tr>
							</tbody>
						</table>
  					</div>
				</div>	
			</div>
			<div class="col-md-6">
				<p class="tebel">Tabel Data Monitoring Api & Asap:</p>
				<table class="table table-striped table-bordered">
					<thead>
						<td><center><p class="tebel" style="margin-top:0px; margin-bottom:0px;">Date</p></center></td>
						<td><center><p class="tebel" style="margin-top:0px; margin-bottom:0px;">Status Api</p></center></td>
						<td><center><p class="tebel" style="margin-top:0px; margin-bottom:0px;">Status Asap</p></center></td>
						<td><center><p class="tebel" style="margin-top:0px; margin-bottom:0px;">Keterangan</p></center></td>
						<!-- <td><center><p class="tebel" style="margin-top:0px; margin-bottom:0px;"></p></center></td>
						<td><center><p class="tebel" style="margin-top:0px; margin-bottom:0px;"></p></center></td> -->
					</thead>
					<tbody>
						<?php 
		  					if($result!==FALSE){
							    while($row = mysqli_fetch_array($result)) 
								{
									//extract $row;
							        printf("<tr><td> &nbsp;%s </td><td> &nbsp;%s&nbsp; </td><td> &nbsp;%s&nbsp; </td>;<td> &nbsp;%s&nbsp; </td></tr>", 
						            $row["date"], $row["status"], $row["ppm"], $row["keterangan"]);
								    $value = $row['date'];
								    $value1= $row['status'];
								    $value2= $row['ppm'];
								    $value3= $row['keterangan'];
								    // $value4= $row['Sekam'];
									$timestamp = strtotime($row['date'])*1000;
								   	$data1[] = "[$timestamp, $value1]";
								   	$data2[] = "[$timestamp, $value2]";
							    }
								// json_encode($data);
							    mysqli_free_result($result);
							    // mysqli_close();
							}
      					?>
					</tbody>
				</table>
			</div>
		</div>
	</body>
</html>

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
	<script type="text/javascript" src="./js/modules/data.js"></script>
	<script type="text/javascript" src="./js/modules/exporting.js"></script>
	<script type="text/javascript" src="./js/highcharts.js"></script>
	<script type="text/javascript" src="./js/bootstrap.js"></script>