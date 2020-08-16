<?php
include "connect.php";

$nisn = $_POST['nisn'];
$kelas = $_POST['kelas'];
$nama = $_POST['nama'];
$alamat = $_POST['alamat'];
$kotalhir = $_POST['kotalhir'];
$nohp = $_POST['nohp'];
$tahunmasuk = $_POST['tahunmasuk'];
$namawali = $_POST['namawali'];
$nohpwali = $_POST['nohpwali'];
$tanggal = $_POST['tanggal'];
$foto =  $_POST['foto'];

$namaimage =  rand(1, 10000);
$tanggal = date("Y-m-d");

$nama_foto = "image-".$nisn;
$nama_db = "image-".$nisn.".jpeg";
 
$targer_dir = "upload/foto_siswa/".$nama_foto.".jpeg";

file_put_contents($targer_dir, base64_decode($foto));

$sql = "INSERT INTO siswa VALUES ('', '$nisn', '$nama', '$alamat' ,'$nohp' , '$nohpwali', '$tanggal', '$tahunmasuk', '$namawali', '$kotalhir', '$nama_db' ,'$kelas')";

$result = array();

if ($conn->query($sql) === TRUE) {
	$result['status'] = 0;
	$result['message'] = "Tambah sUK sukses";
}
else {
	$result['status'] = 1;
	$result['message'] = "Error: ".$conn->error;
}

$conn->close();
echo json_encode($result);