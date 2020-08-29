<?php
include "connect.php";

$kelas = $_POST['kelas'];
$wali_kelas = $_POST['wali_kelas'];
$foto = $_POST['foto'];


$namaimage =  rand(1, 10000);
$tanggal = date("Y-m-d");

$nama_foto = "image-".$kelas."-".$tanggal;
$nama_db = "image-".$kelas."-".$tanggal.".jpeg";
 
$targer_dir = "upload/icon_kelas/".$nama_foto.".jpeg";

file_put_contents($targer_dir, base64_decode($foto));

$sql = "INSERT INTO kelas VALUES ('', '$kelas', '$wali_kelas', '$nama_db')";

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