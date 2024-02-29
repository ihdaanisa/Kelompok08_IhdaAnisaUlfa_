<?php

    $method = $_SERVER['REQUEST_METHOD'];

    $result = array();

    if($method=='DELETE'){

        parse_str(file_get_contents('php://input'), $_DELETE);

        if(isset($_DELETE['id'])){

            $id = $_DELETE['id'];

            $result['status'] = [
                "code" => 200,
                "msg"=> "successful request",
            ];

            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "cobain_api";


            $conn = new mysqli($servername, $username, $password, $dbname);

            $sql = "DELETE FROM data WHERE  id='$id' ";

            $conn->query($sql);

            $result['results'] = [
                "id" => $id
            ];
            
        }else {
            $result["status"] = [
                'code'=>400,
                'msg'=>'Missing parameter'
                ];  
        }
        
    
    } else {
        $result['status'] = [
            'code'=>400,
            'msg'=> 'Method not implemented for this address'
        ];
    }

    echo json_encode($result);
    

?>