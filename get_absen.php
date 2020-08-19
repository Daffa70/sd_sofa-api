<?php

include 'connect.php';

$nisn = $_GET['nisn'];

$sql = "SELECT * FROM absensi WHERE nisn = '$nisn'";


$query = $conn->query($sql);

$result = array();
if ($query) {
	$list = array();
	while ($row = $query->fetch_assoc()) {
		$info['id'] = $row['id'];
        $info['status_kehadiran'] = $row['status_kehadiran'];
        $info['tanggal'] = $row['tanggal'];
        $info['nisn'] = $row['nisn'];

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