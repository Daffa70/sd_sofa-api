<?php

include 'connect.php';

$kelas = $_GET['kelas'];
$hari = $_GET['hari'];

$sql = "SELECT * FROM mata_pelajaran WHERE kelas = '$kelas' AND hari = '$hari'";


$query = $conn->query($sql);

$result = array();
if ($query) {
	$list = array();
	while ($row = $query->fetch_assoc()) {
        $mapel['id'] = $row['id'];
        $mapel['mata_pelajaran'] = $row['mata_pelajaran'];
        $mapel['guru'] = $row['guru'];
        $mapel['jam'] = $row['jam'];
		$mapel['jam_waktu'] = $row['jam_waktu'];
		$mapel['hari'] = $row['hari'];
		$mapel['kelas'] = $row['kelas'];


		array_push($list, $mapel);
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