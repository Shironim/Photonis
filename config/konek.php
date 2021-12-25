<?php
global $koneksi;
global $pdo;

$host = "localhost";
$user = "root";
$pass = "";
$db   = "crud";
// $pdo = new PDO('mysql:host='.$host.';dbname='.$db, $user, $pass);
$koneksi = mysqli_connect($host, $user, $pass, $db);
if(!$koneksi){
die("Gagal Terhubung ".mysqli_connect_error());
}
?>
