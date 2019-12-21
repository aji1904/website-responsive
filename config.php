<?php
$host = "localhost";
$dbname = "db_absendlhk";
$username = "root";
$password = "";

$db = mysqli_connect($host,$username,$password,$dbname);

if(mysqli_connect_errno()){
	echo 'Gagal melakukan koneksi ke Database : '.mysqli_connect_error();
}