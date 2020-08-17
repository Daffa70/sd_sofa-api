<?php
include "connect.php";

$id = $_POST['id'];

$sql = "UPDATE spp set status_pembayaran = 'lunas' WHERE id = '$id'";

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