<?php
include "connect.php";

$id = $_POST['id'];
$nisn = $_POST['nisn'];
$kelas = $_POST['kelas'];
$nama = $_POST['nama'];
$alamat = $_POST['alamat'];
$kotalhir = $_POST['kotalhir'];
$nohp = $_POST['nohp'];
$tahunmasuk = $_POST['tahunmasuk'];
$namawali = $_POST['namawali'];
$nohpwali = $_POST['nohpwali'];
$tanggal1 = $_POST['tanggal'];
$foto =  $_POST['foto'];
$email = $_POST['email'];

$namaimage =  rand(1, 10000);
$tanggal = date("Y-m-d");

$nama_foto = "image-".$nisn;
$nama_db = "image-".$nisn.".jpeg";
 
$targer_dir = "upload/foto_siswa/".$nama_foto.".jpeg";

file_put_contents($targer_dir, base64_decode($foto));

$sql = "UPDATE siswa SET nisn = '$nisn', nama = '$nama', alamat = '$alamat' , nohp = '$nohp' , nohporangtua = '$nohpwali', tanggal_lahir = '$tanggal1', 
        tahun_masuk = '$tahunmasuk', wali_murid = '$namawali',  kota_lahir = '$kotalhir', foto = '$nama_db' , kelas = '$kelas', email = '$email' WHERE id = '$id'";

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