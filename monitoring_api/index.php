<?php

	include("connection.php"); 	
	$result=mysqli_query($koneksi,"SELECT * FROM `data` ORDER BY `Date` DESC");
	$result2=mysqli_query($koneksi,"SELECT * FROM `data` ORDER BY `Date` DESC LIMIT 1");
?>
<html>
	<head>
		<title>Monitoring Api & Asap</title>
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
				<center><h5 style="text-align:right;" class="miring">Data Monitoring</h5></center>
				<hr style="margin-top: 0px; margin-bottom:0px">
			</div>
			<div class="col-md-2">
				&nbsp;
			</div>
		</div>
		<br>
		<?php 
			if($result2!==FALSE){
				$ndata=mysqli_num_rows($result);
			    while($lastrow = mysqli_fetch_array($result2)) {
			    	$api=$lastrow["status"];
			    	$gas=$lastrow["ppm"];
			    	$update_date=$lastrow["date"];
			    }
			}
				// mysql_free_result($result2);
			// mysql_close();
		?>
		<div class="row">
			<div class="col-md-2 col-md-offset-2">
				<div class="panel panel-primary">
  					<div class="panel-heading">
    					<h3 class="panel-title tengah">Navigasi</h3>
  					</div>
  					<div class="panel-body" style="padding:0px;">
    					<table class="table table-stripped table-hover" >
							<tbody>
								<tr class="info">
									<td><span class="glyphicon glyphicon-home"></span><a href="./index.php" style="text-decoration:none;"> Home</a></td>
								</tr>
								<tr>
									<td><span class="glyphicon glyphicon-th-list"></span><a href="./tables.php" style="text-decoration:none;">Histori</a></td>
								</tr>
								<tr>
									<td><span class="glyphicon glyphicon-stats"></span><a href="./stats.php" style="text-decoration:none;"> Statistik</td>
								</tr>
							</tbody>
						</table>
  					</div>
				</div>
			</div>
			<div class="col-md-3">
				<table class="table table-bordered">
					<thead>
						<td><center><p class="tebel" style="margin-top:0px; margin-bottom:0px; font-size:18px">Status Api</p></center></td>
					</thead>
					<tr class="success">
						
						<td><center><p class="tebel gede" style="margin-top:5px"><?php echo "$api";?></p></center></td>
					</tr>
				</table>
			</div>
			<div class="col-md-3">
				<table class="table table-bordered">
					<thead>
						<td><center><p class="tebel" style="margin-top:0px; margin-bottom:0px; font-size:18px">Status Asap</p></center></td>
					</thead>
					<tr class="info">
						<td><center><p class="tebel gede" style="margin-top:5px"><?php echo "$gas";?></p></center></td>
					</tr>
				</table>
			</div>
			
			
		</div>
		<div class="row">
			<div class="col-md-6 col-md-offset-4">
				<p class="tebel">Ringkasan Data:</p>
					<table class="table table-striped table-hover">
						<tr>
							<td>Last Update</td>
							<td>:</td>
							<td><?php echo date('Y-M-d H:i:s',strtotime($update_date))?></td>
						</tr>
						<tr>
							<td>Interval Update</td>
							<td>:</td>
							<td>3 menit</td>
						</tr>
						<tr>
							<td>Jumlah Data</td>
							<td>:</td>
							<td><?php echo $ndata?></td>
						</tr>
					</table>
			</div>
			
		<!-- <div class="row">
			<div class="col-md-6 col-md-offset-4">
				<p class="tebel">Ringkasan Data Room-2:</p>
					<table class="table table-striped table-hover">
						<tr>
							<td>Last Update</td>
							<td>:</td>
							<td><?php echo date("d-M-Y H:i:s",$update)?></td>
						</tr>
						<tr>
							<td>Interval Update</td>
							<td>:</td>
							<td>1 menit</td>
						</tr>
						<tr>
							<td>Jumlah Data</td>
							<td>:</td>
							<td><?php echo $ndata?></td>
						</tr>
					</table>
			</div>
			
		</div> -->
		</div>
		
    </div>
	</body>
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
	<script type="text/javascript" src="./js/modules/data.js"></script>
	<script type="text/javascript" src="./js/modules/exporting.js"></script>
	<script type="text/javascript" src="./js/highcharts.js"></script>
	<script type="text/javascript" src="./js/bootstrap.js"></script>
	
</html>
