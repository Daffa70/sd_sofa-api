<?php

include 'connect.php';

$status = $_GET['status'];
$kelas = $_GET['kelas'];

if(isset($_GET['bulan'])){
    if ($_GET['bulan'] !== 'now'){
        $bulan = $_GET['bulan'];
        $sql_bulan = true;
    }
    else if($_GET['bulan'] === 'now'){
        $sql_bulan = false;
    }
}



$sql = "SELECT * FROM spp WHERE status_pembayaran = '$status' AND kelas = '$kelas'";

if(isset($bulan)){
    if($sql_bulan === true){
        $sql .= " AND untuk_bulan = $bulan";
    }
    else{
        $sql .= " AND untuk_bulan = MONTH(NOW())";
    }
    
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
	$result['status'] = 1;
	$result['message'] = "0 result";
}

$conn->close();
echo json_encode($result);