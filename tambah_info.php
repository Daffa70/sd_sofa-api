<?php
include "connect.php";

$judul = $_POST['judul'];
$subjek = $_POST['subjek'];
$isi = $_POST['isi'];
$foto = $_POST['foto'];


$namaimage =  rand(1, 10000);
$tanggal = date("Y-m-d");

$nama_foto = "image-".$judul."-".$tanggal;
$nama_db = "image-".$judul."-"."-".$tanggal.".jpeg";
 
$targer_dir = "upload/foto_siswa/".$nama_foto.".jpeg";

file_put_contents($targer_dir, base64_decode($foto));

$sql = "INSERT INTO informasi VALUES ('', '$judul', '$subjek','$isi', NOW() , '$nama_db')";

$result = array();

if ($conn->query($sql) === TRUE) {
	$result['status'] = 0;
	$result['message'] = "Tambah sukses";
}
else {
	$result['status'] = 1;
	$result['message'] = "Error: ".$conn->error;
}

$conn->close();
echo json_encode($result);