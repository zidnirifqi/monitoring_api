<?php
   	include("connection.php");
   	
   	//$link=Connection();
   date_default_timezone_set("Asia/Jakarta");
   $status=$_GET["status"];
   $ppm=$_GET["ppm"];
   $keterangan=$_GET["keterangan"];
   // $Minum=$_GET["Minum"];
   // $Sekam=$_GET["Sekam"];
   
$sql = "INSERT INTO `data` (`status`, `ppm`, `keterangan`) VALUES ('$status','$ppm','$keterangan')";
if($koneksi->query($sql)===TRUE){
   echo "OK";
}else{
   echo "error" .$koneksi->error;
}
$koneksi->close();
		
	
?>
