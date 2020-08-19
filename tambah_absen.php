<?php
include "connect.php";

$nisn = $_POST['nisn'];
$status = $_POST['status'];

$sql = "SELECT * FROM absensi WHERE NISN = '$nisn' AND tanggal = CURRENT_DATE()";

$query = $conn->query($sql);

$result = array();
if ($query->num_rows > 0) {
	$result['status'] = 0;
	$result['message'] = "Absen Sudah Diinput untuk hari ini";
}
else {
    $sql = "INSERT INTO absensi VALUES ('','$status', NOW(), '$nisn')";

    $result = array();

    if ($conn->query($sql) === TRUE) {
        $result['status'] = 1;
        $result['message'] = "Absen berhasil";
    }
    else {
        $result['status'] = 2;
        $result['message'] = "Error: ".$conn->error;
    }
        
}

$conn->close();
echo json_encode($result);

?>