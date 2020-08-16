<?php
	define('UPLOAD_PATH', 'upload/foto_siswa/');
	include "koneksi.php";

	$tags = $_POST['tags'];
	$image_tmp = $_FILES['pic']['tmp_name'];
	$image = $_FILES['pic']['name'];
	
	move_uploaded_file($image_tmp, UPLOAD_PATH . $image);
 
        $sql = "INSERT INTO images value ('', '$image', '$tags')";

		$result = array();

		if ($conn->query($sql) === TRUE) {
			$result['status'] = 0;
			$result['message'] = "Tambah Buku sukses";
		}
		else {
			$result['status'] = 1;
			$result['message'] = "Error: ".$conn->error;
		}

		$conn->close();
		echo json_encode($result);

    
	
	
?>