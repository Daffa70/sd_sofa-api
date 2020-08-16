<?php
    include "connect.php";

    $id = $_GET['id'];
    $role = $_GET['role'];
    

    if ($role === 'siswa'){
        $sql = "SELECT * FROM siswa WHERE nisn = $id";
        $query = $conn->query($sql);
        $result = array();
        if($query){
            $list = array();
            $row = $query->fetch_assoc();
            $murid['id'] = $row['id'];
            $murid['nisn'] = $row['nisn'];
            $murid['nama'] = $row['nama'];
            $murid['alamat'] = $row['alamat'];
            $murid['nohp'] = $row['nohp'];
            $murid['nohporangtua'] = $row['nohporangtua'];
            $murid['tanggal_lahir'] = $row['tanggal_lahir'];
            $murid['tahun_masuk'] = $row['tahun_masuk'];
            $murid['wali_murid'] = $row['wali_murid'];
            $murid['kelas'] = $row['kelas'];
            $murid['foto'] = $row['foto'];


            array_push($list, $murid);
        }
        $result['status'] = 0;
        $result['message'] = "Success";
        $result['data'] = $list;
    } 
    else if($role === 'admin'){
        $sql = "SELECT * FROM pegawai WHERE id = '$id'";
        $query = $conn->query($sql);
        $result = array();
        if($query){
            $list = array();
            $row = $query->fetch_assoc();
            $pegawai['id'] = $row['id'];
            $pegawai['nama'] = $row['nama'];
            $pegawai['alamat'] = $row['alamat'];
            $pegawai['nohp'] = $row['nohp'];
            $pegawai['jabatan'] = $row['jabatan'];
            $pegawai['mata_pelajaran'] = $row['mata_pelajaran'];

            array_push($list, $pegawai);
        }
        $result['status'] = 0;
        $result['message'] = "Success";
        $result['data'] = $list;
    } 
    $conn->close();
    echo json_encode($result);

?>