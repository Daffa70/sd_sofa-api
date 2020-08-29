<?php
include "connect.php";

$id = $_POST['id'];
$kelas = $_POST['kelas'];
$wali_kelas = $_POST['wali_kelas'];
$foto = $_POST['foto'];


$sql1 = "SELECT * FROM kelas WHERE id = '$id' ";
$query = $conn->query($sql1);
$row = $query->fetch_assoc();

if($foto === $row['foto']){
	$nama_db = $row['foto'];
}
else{
	$namaimage =  rand(1, 10000);
    $tanggal = date("Y-m-d");

    $nama_foto = "image-".$kelas."-".$tanggal;
    $nama_db = "image-".$kelas."-".$tanggal.".jpeg";
    
    $targer_dir = "upload/icon_kelas/".$nama_foto.".jpeg";

    file_put_contents($targer_dir, base64_decode($foto));
}




$sql = "UPDATE kelas set kelas = '$kelas', wali_kelas = '$wali_kelas', foto = '$nama_db' WHERE id = '$id'";

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