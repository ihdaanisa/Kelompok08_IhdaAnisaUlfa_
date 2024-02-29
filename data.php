<?php

    require_once('connection.php');

    if (empty($_GET)) {
        header("Content-Type: JSON");
        $query = mysqli_query($connection, "SELECT * FROM data");

        $result = array();
        while($row = mysqli_fetch_array($query)) {
            array_push( $result, array (
                'id'       => $row['id'],
                'name'     => $row['name'],
                'age'      => $row['age'],
                'address'  => $row['address']
            ));
        }

        echo json_encode (
            array ('result' => $result)
        );
    } else {
        $query = mysqli_query( $connection, "SELECT * FROM data WHERE id="  . $_GET["id"] );

        $result = array();
        while($row = $query->fetch_assoc()) {
            $result = array (
                'id'      => $row['id'],
                'name'    => $row['name'],
                'age'     => $row['age'],
                'address' => $row['address']
            );
        }

        echo json_encode ($result);        
    }

?>