<?php

// JSON Headers
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Allow-Credentials: true");
header('Content-Type: application/json');

http_response_code(200);

$PASS = $_GET['pass'];

if($PASS != null){

    $options = [
        'cost' => 12,
    ];
    
    $encode = password_hash("$PASS", PASSWORD_BCRYPT, $options);

    $array = array(
        'error'=>false,
        'message'=>"Successfull!",
        'password'=>$PASS,
        'encrypt'=>$encode
    );
    
    $json = json_encode($array);
    
    print_r ($json);

}else{

    $array = array(
        'error'=>true,
        'message'=>"No password to encrypt!"
    );
    
    $json = json_encode($array);
    
    print_r ($json);

}

?>