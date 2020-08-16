<?php
define('UPLOAD_PATH', 'upload/foto_siswa/');
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
$foto = $_FILES['foto'];

$image_tmp = $_FILES['foto']['tmp_name'];
$image = $_FILES['foto']['name'];

$sql = "INSERT INTO buku (id_admin, judul_buku, pengarang_buku, sinopsis_buku ,foto_buku , tanggal_rilisbuku) VALUES ($id_admin, '$judul', '$pengarang', '$sinopsis' ,'$gambar' , '$tanggalrilis')";

$result = array();

if ($conn->query($sql) === TRUE) {
	$result['status'] = 0;
	$result['message'] = "Tambah Buku sukses";
}
else {
	$result['status'] = 1;
	$result['message'] = "Error: ".$conn->error;
}

$conn->close();
echo json_encode($result);