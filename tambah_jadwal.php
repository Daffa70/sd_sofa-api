<?php
include "connect.php";


$mata_pelajaran = $_POST['mata_pelajaran'];
$guru = $_POST['guru'];
$jamke = $_POST['jamke'];
$waktu = $_POST['waktu'];
$hari = $_POST['hari'];
$kelas = $_POST['kelas'];

$sql = "INSERT INTO mata_pelajaran VALUES ('','$mata_pelajaran', '$guru', '$jamke', '$waktu', '$hari', '$kelas')";

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