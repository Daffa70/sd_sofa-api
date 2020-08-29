<?php

include 'connect.php';

$kelas = $_GET['kelas'];


$sql = "SELECT * FROM tugas WHERE kelas = '$kelas' ORDER BY id DESC";


$query = $conn->query($sql);

$result = array();
if ($query) {
	$list = array();
	while ($row = $query->fetch_assoc()) {
		$tugas['id'] = $row['id'];
        $tugas['nama_tugas'] = $row['nama_tugas'];
        $tugas['tugas'] = $row['tugas'];
        $tugas['mata_pelajaran'] = $row['mata_pelajaran'];
        $tugas['guru'] = $row['guru'];
        $tugas['kelas'] = $row['kelas'];
		$tugas['deadline'] = $row['deadline'];
		$tugas['date'] = $row['date'];
		$tugas['foto'] = $row['foto'];


		array_push($list, $tugas);
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