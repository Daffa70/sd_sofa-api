<?php

include 'connect.php';

$kelas = $_GET['kelas'];

if(isset($_GET['bulan'])){
    $bulan = $_GET['bulan'];
    if($bulan === 'a'){
        $month = "a";
    }
    else{
        $month = "b";
    }
}

if(isset($_GET['status'])){
    $status = $_GET['status'];
}
if(isset($_GET['nisn'])){
    $nisn = $_GET['nisn'];
}




$sql = "SELECT * FROM spp WHERE kelas = '$kelas'";

if(isset($bulan)){
    if($month === "a"){
        $sql .= " AND untuk_bulan = MONTH(CURRENT_DATE())";
    }
    else if($month === "b"){
        $sql .= " AND untuk_bulan = $bulan";
    }
}

if(isset($_GET['status'])){
    $sql .= " AND status_pembayaran = '$status'";
}

if(isset($_GET['nisn'])){
    $sql .= " AND NISN = '$nisn'";
}


$query = $conn->query($sql);

$result = array();
if ($query->num_rows > 0) {
	$list = array();
	while ($row = $query->fetch_assoc()) {
        $spp['id'] = $row['id'];
        $spp['nisn'] = $row['nisn'];
        $spp['nama_siswa'] = $row['nama_siswa'];
        $spp['kelas'] = $row['kelas'];
        $spp['untuk_bulan'] = $row['untuk_bulan'];
        $spp['tgl_pembayaran'] = $row['tgl_pembayaran'];
        $spp['bukti'] = $row['bukti'];
        $spp['status_pembayaran'] = $row['status_pembayaran'];

		array_push($list, $spp);
	}
	$result['status'] = 0;
	$result['message'] = "Success";
	$result['data'] = $list;
} else {
    $sql = "SELECT * FROM siswa WHERE nisn = '$nisn'";
    $query = $conn->query($sql);
    $row = $query->fetch_assoc();

    $nama_siswa = $row['nama'];

    $sql1 = "INSERT INTO spp VALUES ('', '$nisn', '$nama_siswa','$kelas', MONTH(NOW()), '', '', 'belum_dibayar')";
    $conn->query($sql1);

    $sql3 = "SELECT * FROM spp WHERE kelas = '$kelas' AND nisn = '$nisn' AND untuk_bulan = MONTH(CURRENT_DATE()) AND status_pembayaran = 'belum_dibayar'";
    $query = $conn->query($sql3);
    
    $list = array();
	while ($row = $query->fetch_assoc()) {
        $spp['id'] = $row['id'];
        $spp['nisn'] = $row['nisn'];
        $spp['nama_siswa'] = $row['nama_siswa'];
        $spp['kelas'] = $row['kelas'];
        $spp['untuk_bulan'] = $row['untuk_bulan'];
        $spp['tgl_pembayaran'] = $row['tgl_pembayaran'];
        $spp['bukti'] = $row['bukti'];
        $spp['status_pembayaran'] = $row['status_pembayaran'];

		array_push($list, $spp);
	}
	$result['status'] = 0;
	$result['message'] = "Success";
	$result['data'] = $list;
   

}

$conn->close();
echo json_encode($result);