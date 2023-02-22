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

$authors_count = $conn->query("SELECT * FROM authors ORDER BY id")->num_rows;
$authors = $conn->query("SELECT * FROM authors ORDER BY id");
if($authors->num_rows > 0){

    $books_data = [];

    while($authors_row = $authors->fetch_assoc()){

        $id = $authors_row['id'];
        $first_name = $authors_row['first_name'];
        $last_name = $authors_row['last_name'];
        $birth_date = $authors_row['birth_date'];
        $die_date = $authors_row['die_date'];
        $photo = $authors_row['photo'];

        $books_count = $conn->query("SELECT * FROM books WHERE author_id = '$id'")->num_rows;

        $authors_data[] = [
            'id'=>$id,
            'first_name'=>$first_name,
            'last_name'=>$last_name,
            'birth_date'=>$birth_date,
            'die_date'=>$die_date,
            'photo'=>$photo,
            'books_count'=>$books_count
        ];

    }

}

$authors_arr = [
    'authors_count'=>$authors_count,
    'authors'=>$authors_data,
];

$json = json_encode($authors_arr);

print_r ($json);

?>