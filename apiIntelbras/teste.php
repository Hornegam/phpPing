<?php

function tratar(){
    $url = 'http://192.168.41.14:88/#/login';
    $id = json_encode(file_get_contents('php://input'), true);
    var_dump($id)
    $array = $id;
    $ch = curl_init($url);

    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");

    curl_setopt($ch, CURLOPT_POSTFIELDS, $array);

    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    curl_setopt($ch, CURLOPT_HTTPHEADER, $array);

    $jsonRet = json_decode(curl_exec($ch));

    echo $jsonRet;
    //header('Content-Type: application/json');
    //header('location: teste.php');
    
}

tratar();

?>