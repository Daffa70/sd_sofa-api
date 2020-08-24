<?php

include 'connect.php';

$kelas = $_GET['kelas'];


$sql = "SELECT * FROM siswa WHERE kelas = '$kelas' ";


$query = $conn->query($sql);

$result = array();
if ($query) {
	$list = array();
	while ($row = $query->fetch_assoc()) {
		$siswa['id'] = $row['id'];
		$siswa['nisn'] = $row['nisn'];
		$siswa['nama'] = $row['nama'];
		$siswa['alamat'] = $row['alamat'];
		$siswa['nohp'] = $row['nohp'];
        $siswa['nohporangtua'] = $row['nohporangtua'];
        $siswa['tanggal_lahir'] = $row['tanggal_lahir'];
        $siswa['tahun_masuk'] = $row['tahun_masuk'];
        $siswa['wali_murid'] = $row['wali_murid'];
        $siswa['kelas'] = $row['kelas'];
		$siswa['foto'] = $row['foto'];
		$siswa['kota_lahir'] = $row['kota_lahir'];
		$siswa['email'] = $row['email'];
		array_push($list, $siswa);
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