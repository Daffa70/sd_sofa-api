<?php

include 'connect.php';

if(isset($_GET["id_penulis"]))
	$id_penulis = $_GET["id_penulis"];
if(isset($_GET["isi"]))
	$isi = $_GET["isi"];
if(isset($_GET["tgl_awal"]))
	$tgl_awal = $_GET["tgl_awal"];
if (isset($_GET["tgl_akhir"]))
	$tgl_akhir = $_GET["tgl_akhir"];

$sql = "SELECT * FROM kelas";


$query = $conn->query($sql);

$result = array();
if ($query) {
	$list = array();
	while ($row = $query->fetch_assoc()) {
		$info['id'] = $row['id'];
		$info['kelas'] = $row['kelas'];
		$info['wali_kelas'] = $row['wali_kelas'];

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