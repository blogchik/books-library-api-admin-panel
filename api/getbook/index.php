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

$book_id = $_GET['book_id'];

if($book_id == null){

    $true = false;

}else{

    $true = true;

    $book = $conn->query("SELECT * FROM books WHERE id = '$book_id'");
    if($book->num_rows > 0){

        $book_row = $book->fetch_assoc();

        $id = $book_row['id'];
        $author_id = $book_row['author_id'];
        $book_name = $book_row['book_name'];
        $book_type = $book_row['book_type'];
        $book_lang = $book_row['book_lang'];
        $book_year = $book_row['book_year'];
        $book_cover = $book_row['book_cover'];
        $custom_a = $book_row['custom_a'];
        $custom_b = $book_row['custom_b'];

        $book_pages = $conn->query("SELECT * FROM pages WHERE book_id = '$id'");
        if($book_pages->num_rows > 0){

            $book_pages_data = [];

            while($book_pages_row = $book_pages->fetch_assoc()){

                $page_id = $book_pages_row['id'];
                $page_book_id = $book_pages_row['book_id'];
                $page_num = $book_pages_row['page_num'];
                $page_photo_arabic = $book_pages_row['page_photo_arabic'];
                $page_photo_handw = $book_pages_row['page_photo_handw'];
                $page_photo_uzbek = $book_pages_row['page_photo_uzbek'];
                $page_photo_transc = $book_pages_row['page_photo_transc'];
                $page_audio1 = $book_pages_row['page_audio1'];
                $page_audio2 = $book_pages_row['page_audio2'];

                $book_pages_data[] = [
                    'page_id'=>$page_id,
                    'page_book_id'=>$page_book_id,
                    'page_num'=>$page_num,
                    'page_photo_arabic'=>$page_photo_arabic,
                    'page_photo_handw'=>$page_photo_handw,
                    'page_photo_uzbek'=>$page_photo_uzbek,
                    'page_photo_transc'=>$page_photo_transc,
                    'page_audio1'=>$page_audio1,
                    'page_audio2'=>$page_audio2,
                ];

            }

        }

        $author = $conn->query("SELECT * FROM authors WHERE id = '$author_id'");
        if($author->num_rows > 0){

            $author_row = $author->fetch_assoc();

            $author_firt_name = $author_row['first_name'];
            $author_last_name = $author_row['last_name'];
            $author_birth_date = $author_row['birth_date'];
            $author_die_date = $author_row['die_date'];
            $author_photo = $author_row['photo'];

            $author_data = [
                'author_id'=>$author_id,
                'author_firt_name'=>$author_firt_name,
                'author_last_name'=>$author_last_name,
                'author_birth_date'=>$author_birth_date,
                'author_die_date'=>$author_die_date,
                'author_photo'=>$author_photo,
            ];

        }

        $book_data = [
            'book_id'=>$id,
            'author_id'=>$author_id,
            'book_name'=>$book_name,
            'book_type'=>$book_type,
            'book_lang'=>$book_lang,
            'book_year'=>$book_year,
            'book_cover'=>$book_cover,
            'custom_a'=>$custom_a,
            'custom_b'=>$custom_b,
            'author'=>$author_data,
            'book_pages'=>$book_pages_data,
        ];

    }else{

        $true = false;

    }

}

$book_arr = [
    'true'=>$true,
    'book'=>$book_data,
];

$json = json_encode($book_arr);

print_r ($json);

?>