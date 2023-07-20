<?php
// $servernya="localhost";	//Nama Servernya dimasukkin kesini
// $user="root"; 		    //Nama user MySQL
// $auth_pass="";	        //Password MySQL
// $dbnya="krenova";		//NamaDB nya

// mysqli_connect($servernya,$user,$auth_pass);
// mysqli_select_db($dbnya);
$koneksi = mysqli_connect("localhost","root","","monitoring");
 
//cek jika koneksi ke mysql gagal, maka akan tampil pesan berikut
if (mysqli_connect_errno()){
	echo "Gagal melakukan koneksi ke MySQL: " . mysqli_connect_error();
}
?>