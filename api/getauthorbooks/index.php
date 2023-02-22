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

$author_id = $_GET['author_id'];

if($author_id == null){

    $true = false;

}else{

    $true = true;

    $author = $conn->query("SELECT * FROM authors WHERE id = '$author_id'");
    if($author->num_rows > 0){

        $author_row = $author->fetch_assoc();

        $first_name = $author_row['first_name'];
        $last_name = $author_row['last_name'];
        $birth_date = $author_row['birth_date'];
        $die_date = $author_row['die_date'];
        $photo = $author_row['photo'];

        $books_count = $conn->query("SELECT * FROM books WHERE author_id = '$author_id'")->num_rows;
        $books = $conn->query("SELECT * FROM books WHERE author_id = '$author_id'");
        if($books->num_rows > 0){

            $book_data = [];

            while($books_row = $books->fetch_assoc()){

                $book_id = $books_row['id'];
                $book_name = $books_row['book_name'];
                $book_type = $books_row['book_type'];
                $book_lang = $books_row['book_lang'];
                $book_year = $books_row['book_year'];
                $book_cover = $books_row['book_cover'];
                $custom_a = $books_row['custom_a'];
                $custom_b = $books_row['custom_b'];

                $book_data[] = [
                    'book_id'=>$book_id,
                    'book_name'=>$book_name,
                    'book_type'=>$book_type,
                    'book_lang'=>$book_lang,
                    'book_year'=>$book_year,
                    'book_cover'=>$book_cover,
                    'custom_a'=>$custom_a,
                    'custom_b'=>$custom_b,
                ];

            }

        }

        $author_arr = [
            'author_id'=>$author_id,
            'first_name'=>$first_name,
            'last_name'=>$last_name,
            'birth_date'=>$birth_date,
            'die_date'=>$die_date,
            'photo'=>$photo,
            'books_count'=>$books_count,
            'books'=>$book_data,
        ];

    }else{

        $true = false;

    }

}

$json = json_encode($author_arr);

print_r ($json);

?>