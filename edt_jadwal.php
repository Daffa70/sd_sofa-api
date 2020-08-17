<?php
include "connect.php";

$id = $_POST['id'];
$mata_pelajaran = $_POST['mata_pelajaran'];
$guru = $_POST['guru'];
$jamke = $_POST['jamke'];
$waktu = $_POST['waktu'];
$hari = $_POST['hari'];
$kelas = $_POST['kelas'];

$sql = "UPDATE mata_pelajaran set mata_pelajaran = '$mata_pelajaran', guru = '$guru', jam = '$jamke', jam_waktu = '$waktu', hari = '$hari', kelas = '$kelas'
        WHERE id = '$id'";

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