<?php
include "connect.php";

$id = $_POST['id'];
$foto = $_POST['foto'];

$namaimage =  rand(1, 10000);
$tanggal = date("Y-m-d");

$nama_foto = "image-".$id.$tanggal;
$nama_db = "image-".$id."-".$tanggal.".jpeg";
 
$targer_dir = "upload/foto_bukti_spp/".$nama_foto.".jpeg";

file_put_contents($targer_dir, base64_decode($foto));

$sql = "UPDATE spp set bukti = '$nama_db', status_pembayaran = 'menunggu_konfirmasi', tgl_pembayaran = NOW() WHERE id = '$id'";

$result = array();

if ($conn->query($sql) === TRUE) {
	$result['status'] = 0;
	$result['message'] = "Tambah Sukses";
}
else {
	$result['status'] = 1;
	$result['message'] = "Error: ".$conn->error;
}

$conn->close();
echo json_encode($result);