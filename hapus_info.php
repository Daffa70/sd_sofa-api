<?php

include "connect.php";

$id = $_POST['id'];

$sql = "DELETE FROM informasi WHERE id=$id";

$result = array();
if ($conn->query($sql) === TRUE) {
	$result['status'] = 0;
	$result['message'] = 'Delete success';
} else {
	$result['status'] = 1;
	$result['message'] = 'Error: '.$conn->error;
}

$conn->close();
echo json_encode($result);