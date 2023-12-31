<?php
    header("Access-Control-Allow-Methods: POST");
    header("Access-Control-Content-Type: application/json");

    include("../config/config.php");

    $config = new Config();

    $res = array();

    if($_SERVER['REQUEST_METHOD'] == "POST"){
        $name = $_POST['name'];
        $email = $_POST['email'];
        $pass = password_hash($_POST['pass'],PASSWORD_DEFAULT);
        $contact = $_POST['contact'];
        $about = $_POST['about'];
        
        $result = $config->insertUser($name,$email,$pass,$contact,$about,"");

        if($result){
            $res = ["msg" => "Record inserted successfully !!"];
        } else {
            $res = ["msg" => "Record insertion failled !!"];
        }
        http_response_code(201);
    } else {
        $res = ["msg" => "Only POST method is allowed !!"];
        http_response_code(403);
    }

    echo json_encode($res);
?>