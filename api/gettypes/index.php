<?php

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Allow-Credentials: true");
header('Content-Type: application/json');

ini_set('error_reporting', 'off');
ini_set('display_errors', 'off');
ini_set('display_startup_errors', 'off');

date_default_timezone_set('Asia/Tashkent');
$time = date('H:i');
$date = date('Y-m-d');

include "../../database.php";

http_response_code(200);

$types_data = [];

$types = $conn->query("SELECT * FROM types ORDER BY id");
if($types->num_rows > 0){

    while($types_row = $types->fetch_assoc()){

        $id = $types_row['id'];
        $type = $types_row['type'];

        $types_data[] = [
            'id'=>$id,
            'type'=>$type
        ];

    }

    $types_count = $conn->query("SELECT * FROM types ORDER BY id")->num_rows;

}else{

    $types_count = 0;
    $types_data = null;

}

$types_arr = [
    'types_count'=>$types_count,
    'types'=>$types_data,
];

$json = json_encode($types_arr);

print_r ($json);

?>