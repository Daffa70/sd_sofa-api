<?php

include 'connect.php';

$sql = "SELECT * FROM kelas";


$query = $conn->query($sql);

$result = array();
if ($query) {
	$list = array();
	while ($row = $query->fetch_assoc()) {
		$info['id'] = $row['id'];
		$info['kelas'] = $row['kelas'];
		$info['wali_kelas'] = $row['wali_kelas'];
		$info['foto'] = $row['foto'];

		array_push($list, $info);
	}
	$result['status'] = 0;
	$result['message'] = "Success";
	$result['data'] = $list;
} else {
	$result['status'] = 1;
	$result['message'] = "0 result";
}

$conn->close();
echo json_encode($result);