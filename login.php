<?php
include "connect.php";

$username = $_POST['username'];
$password = $_POST['password'];

$sql = "SELECT * FROM login WHERE username = '$username' AND password = '$password'";

$query = $conn->query($sql);

$result = array();
if ($query->num_rows > 0) {
	$row = $query->fetch_assoc();
	$result['status'] = 0;
	$result['message'] = "Login sukses";
    $result['data'] = $row['username'];
    $result['role'] = $row['role'];
}
else {
	$result['status'] = 1;
	$result['message'] = "Login gagal";
}

$conn->close();
echo json_encode($result);