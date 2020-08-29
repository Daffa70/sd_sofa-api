<?php
include "connect.php";

$id = $_POST['id'];
$judul = $_POST['judul'];
$subjek = $_POST['subjek'];
$isi = $_POST['isi'];
$foto = $_POST['foto'];


$sql1 = "SELECT * FROM informasi WHERE id = '$id' ";
$query = $conn->query($sql1);
$row = $query->fetch_assoc();

if($foto === $row['foto']){
	$nama_db = $row['foto'];
}
else{
	$namaimage =  rand(1, 10000);
	$tanggal = date("Y-m-d");

	$nama_foto = "image-".$judul."-".$rand;
	$nama_db = "image-".$judul."-".$rand.".jpeg";
	
	$targer_dir = "upload/foto_info/".$nama_foto.".jpeg";

	file_put_contents($targer_dir, base64_decode($foto));
}



$sql = "UPDATE informasi SET judul = '$judul', subjek = '$subjek', isi = '$isi',tanggal = NOW(), foto = '$nama_db' WHERE id = '$id'";

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