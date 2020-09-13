<?php
include "connect.php";

$id = $_POST['id'];
$nama = $_POST['nama'];
$alamat = $_POST['alamat'];
$mata_pelajaran = $_POST['mata_pelajaran'];
$nohp = $_POST['nohp'];
$jabatan = $_POST['role'];
$foto =  $_POST['foto'];
$email = $_POST['email'];

$namaimage =  rand(1, 10000);
$tanggal = date("Y-m-d");

$nama_foto = "image-".$id.$tanggal;
$nama_db = "image-".$id.$tanggal.".jpeg";
 
$targer_dir = "upload/foto_admin/".$nama_foto.".jpeg";

file_put_contents($targer_dir, base64_decode($foto));

$sql = "INSERT INTO pegawai VALUES ('$id', '$nama', '$alamat' ,'$nohp' ,  '$jabatan', '$mata_pelajaran', '$nama_db' , '$email')";

$result = array();

if ($conn->query($sql) === TRUE) {
	$sql1 = "INSERT INTO login VALUES ('$id', '$id', '$id', '$jabatan')";
	$conn->query($sql1);

	$result['status'] = 0;
	$result['message'] = "Tambah Sukses";
}
else {
	$result['status'] = 1;
	$result['message'] = "Error: ".$conn->error;
}

$conn->close();
echo json_encode($result);