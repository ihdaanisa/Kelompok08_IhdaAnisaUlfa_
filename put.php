<?php

    include "connection.php";

  //  echo "update mhs";

    $id = $_GET['id'];
   // echo $id;

   $nama_mhs = isset($_POST["nama"]) ? $_POST['nama'] : "";  //Mengambil nilai dari
   //echo $nama_mhs;

   $umur = isset($_POST["age"]) ? $_POST['age'] : "";
   //echo $umur;

   $alamat = isset($_POST["address"]) ? $_POST['address'] : "";

    $sql = "UPDATE data SET name = '".$nama_mhs."', address = '".$alamat."'
    WHERE data.id = ".$id.";";
    //echo $sql;

    $query = mysqli_query($connection, $sql);
    if($query){
        $msg = "update mhs berhasil";
    }else{
        $msg = "update mhs gagal";
    }

    $response = array(
        "status"=> "success",
        "message" => $msg
    );

    echo json_encode($response);

?>