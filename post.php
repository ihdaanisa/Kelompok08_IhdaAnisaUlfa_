<?php

    include "connection.php";

    $nama_mhs = isset($_POST["name"]) ? $_POST['name'] : "";  //Mengambil nilai dari
    //echo $nama_mhs;

    $umur = isset($_POST["age"]) ? $_POST['age'] : "";
    //echo $umur;

    $alamat = isset($_POST["address"]) ? $_POST['address'] : "";
    //echo $alamat;


    $sql = "INSERT INTO data (name, age, address)
    VALUES ('".$nama_mhs."', '".$umur."','".$alamat."')";   //menyimpan data ke

    //echo $sql;

    $query = mysqli_query($connection, $sql);
    if($query){
        $msg = "Simpan data berhasil";
    }else{
        $msg = "Gagal mencetak hasil";
    }

    //echo $msg;

    $response = array(
        "status"=> "success",
        "message" => $msg
    );

    echo json_encode($response);
?>