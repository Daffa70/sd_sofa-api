<?php
include "connect.php";

$id = $_POST['id'];
$mata_pelajaran = $_POST['mata_pelajaran'];
$nama_tugas = $_POST['nama_tugas'];
$tugas = $_POST['tugas'];
$guru = $_POST['guru'];
$kelas = $_POST['kelas'];
$tanggal1 = $_POST['tanggal'];
$foto = $_POST['foto'];


$namaimage =  rand(1, 10000);
$tanggal = date("Y-m-d");

$nama_foto = "image-".$tugas."-".$tanggal;
$nama_db = "image-".$tugas."-"."-".$tanggal.".jpeg";
 
$targer_dir = "upload/foto_siswa/".$nama_foto.".jpeg";

file_put_contents($targer_dir, base64_decode($foto));

$sql = "UPDATE tugas SET ( nama_tugas = '$nama_tugas', tugas = '$tugas', mata_pelajaran = '$mata_pelajaran' , guru = '$guru' ,kelas = '$kelas' , NOW() , deadline = '$tanggal1', foto = '$nama_db'
        WHERE id = '$id'";

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