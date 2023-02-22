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

$filter = $_GET['filter'];
$filter_type = $_GET['type'];
$filter_lang = $_GET['lang'];
$filter_year = $_GET['year'];

$books_data = [];

if($filter == "1"){

    $books_list_arr = [];

    if($filter_type != null AND $filter_lang != null AND $filter_year != null){

        $books_ftype = $conn->query("SELECT * FROM books WHERE book_type LIKE '%$filter_type%' AND book_lang LIKE '%$filter_lang%' AND book_year LIKE '%$filter_year%'");
        if($books_ftype->num_rows > 0){

            while($books_ftype_row = $books_ftype->fetch_assoc()){

                $id = $books_ftype_row['id'];
                $author_id = $books_ftype_row['author_id'];
                $book_name = $books_ftype_row['book_name'];
                $book_type = $books_ftype_row['book_type'];
                $book_lang = $books_ftype_row['book_lang'];
                $book_year = $books_ftype_row['book_year'];
                $book_cover = $books_ftype_row['book_cover'];
                $custom_a = $books_ftype_row['custom_a'];
                $custom_b = $books_ftype_row['custom_b'];

                if(!in_array($id, $books_list_arr)){

                    $books_data[] = [
                        'id'=>$id,
                        'author_id'=>$author_id,
                        'book_name'=>$book_name,
                        'book_type'=>$book_type,
                        'book_lang'=>$book_lang,
                        'book_year'=>$book_year,
                        'book_cover'=>$book_cover,
                        'custom_a'=>$custom_a,
                        'custom_b'=>$custom_b
                    ];

                    array_push($books_list_arr, $id);

                }

            }

            $books_count = array_count_values($books_list_arr);

        }

    }elseif($filter_type != null AND $filter_lang != null){

        $books_ftype = $conn->query("SELECT * FROM books WHERE book_type LIKE '%$filter_type%' AND book_lang LIKE '%$filter_lang%'");
        if($books_ftype->num_rows > 0){

            while($books_ftype_row = $books_ftype->fetch_assoc()){

                $id = $books_ftype_row['id'];
                $author_id = $books_ftype_row['author_id'];
                $book_name = $books_ftype_row['book_name'];
                $book_type = $books_ftype_row['book_type'];
                $book_lang = $books_ftype_row['book_lang'];
                $book_year = $books_ftype_row['book_year'];
                $book_cover = $books_ftype_row['book_cover'];
                $custom_a = $books_ftype_row['custom_a'];
                $custom_b = $books_ftype_row['custom_b'];

                if(!in_array($id, $books_list_arr)){

                    $books_data[] = [
                        'id'=>$id,
                        'author_id'=>$author_id,
                        'book_name'=>$book_name,
                        'book_type'=>$book_type,
                        'book_lang'=>$book_lang,
                        'book_year'=>$book_year,
                        'book_cover'=>$book_cover,
                        'custom_a'=>$custom_a,
                        'custom_b'=>$custom_b
                    ];

                    array_push($books_list_arr, $id);

                }

            }

            $books_count = array_count_values($books_list_arr);

        }

    }elseif($filter_type != null AND $filter_year != null){

        $books_ftype = $conn->query("SELECT * FROM books WHERE book_type LIKE '%$filter_type%' AND book_year LIKE '%$filter_year%'");
        if($books_ftype->num_rows > 0){

            while($books_ftype_row = $books_ftype->fetch_assoc()){

                $id = $books_ftype_row['id'];
                $author_id = $books_ftype_row['author_id'];
                $book_name = $books_ftype_row['book_name'];
                $book_type = $books_ftype_row['book_type'];
                $book_lang = $books_ftype_row['book_lang'];
                $book_year = $books_ftype_row['book_year'];
                $book_cover = $books_ftype_row['book_cover'];
                $custom_a = $books_ftype_row['custom_a'];
                $custom_b = $books_ftype_row['custom_b'];

                if(!in_array($id, $books_list_arr)){

                    $books_data[] = [
                        'id'=>$id,
                        'author_id'=>$author_id,
                        'book_name'=>$book_name,
                        'book_type'=>$book_type,
                        'book_lang'=>$book_lang,
                        'book_year'=>$book_year,
                        'book_cover'=>$book_cover,
                        'custom_a'=>$custom_a,
                        'custom_b'=>$custom_b
                    ];

                    array_push($books_list_arr, $id);

                }

            }

            $books_count = array_count_values($books_list_arr);

        }

    }elseif($filter_lang != null AND $filter_type != null){

        $books_ftype = $conn->query("SELECT * FROM books WHERE book_type LIKE '%$filter_type%' AND book_lang LIKE '%$filter_lang%'");
        if($books_ftype->num_rows > 0){

            while($books_ftype_row = $books_ftype->fetch_assoc()){

                $id = $books_ftype_row['id'];
                $author_id = $books_ftype_row['author_id'];
                $book_name = $books_ftype_row['book_name'];
                $book_type = $books_ftype_row['book_type'];
                $book_lang = $books_ftype_row['book_lang'];
                $book_year = $books_ftype_row['book_year'];
                $book_cover = $books_ftype_row['book_cover'];
                $custom_a = $books_ftype_row['custom_a'];
                $custom_b = $books_ftype_row['custom_b'];

                if(!in_array($id, $books_list_arr)){

                    $books_data[] = [
                        'id'=>$id,
                        'author_id'=>$author_id,
                        'book_name'=>$book_name,
                        'book_type'=>$book_type,
                        'book_lang'=>$book_lang,
                        'book_year'=>$book_year,
                        'book_cover'=>$book_cover,
                        'custom_a'=>$custom_a,
                        'custom_b'=>$custom_b
                    ];

                    array_push($books_list_arr, $id);

                }

            }

            $books_count = array_count_values($books_list_arr);

        }

    }elseif($filter_lang != null AND $filter_year != null){

        $books_ftype = $conn->query("SELECT * FROM books WHERE book_lang LIKE '%$filter_lang%' AND book_year LIKE '%$filter_year%'");
        if($books_ftype->num_rows > 0){

            while($books_ftype_row = $books_ftype->fetch_assoc()){

                $id = $books_ftype_row['id'];
                $author_id = $books_ftype_row['author_id'];
                $book_name = $books_ftype_row['book_name'];
                $book_type = $books_ftype_row['book_type'];
                $book_lang = $books_ftype_row['book_lang'];
                $book_year = $books_ftype_row['book_year'];
                $book_cover = $books_ftype_row['book_cover'];
                $custom_a = $books_ftype_row['custom_a'];
                $custom_b = $books_ftype_row['custom_b'];

                if(!in_array($id, $books_list_arr)){

                    $books_data[] = [
                        'id'=>$id,
                        'author_id'=>$author_id,
                        'book_name'=>$book_name,
                        'book_type'=>$book_type,
                        'book_lang'=>$book_lang,
                        'book_year'=>$book_year,
                        'book_cover'=>$book_cover,
                        'custom_a'=>$custom_a,
                        'custom_b'=>$custom_b
                    ];

                    array_push($books_list_arr, $id);

                }

            }

            $books_count = array_count_values($books_list_arr);

        }

    }elseif($filter_year != null AND $filter_lang != null){

        $books_ftype = $conn->query("SELECT * FROM books WHERE book_lang LIKE '%$filter_lang%' AND book_year LIKE '%$filter_year%'");
        if($books_ftype->num_rows > 0){

            while($books_ftype_row = $books_ftype->fetch_assoc()){

                $id = $books_ftype_row['id'];
                $author_id = $books_ftype_row['author_id'];
                $book_name = $books_ftype_row['book_name'];
                $book_type = $books_ftype_row['book_type'];
                $book_lang = $books_ftype_row['book_lang'];
                $book_year = $books_ftype_row['book_year'];
                $book_cover = $books_ftype_row['book_cover'];
                $custom_a = $books_ftype_row['custom_a'];
                $custom_b = $books_ftype_row['custom_b'];

                if(!in_array($id, $books_list_arr)){

                    $books_data[] = [
                        'id'=>$id,
                        'author_id'=>$author_id,
                        'book_name'=>$book_name,
                        'book_type'=>$book_type,
                        'book_lang'=>$book_lang,
                        'book_year'=>$book_year,
                        'book_cover'=>$book_cover,
                        'custom_a'=>$custom_a,
                        'custom_b'=>$custom_b
                    ];

                    array_push($books_list_arr, $id);

                }

            }

            $books_count = array_count_values($books_list_arr);

        }

    }elseif($filter_year != null AND $filter_type != null){

        $books_ftype = $conn->query("SELECT * FROM books WHERE book_type LIKE '%$filter_type%' AND book_year LIKE '%$filter_year%'");
        if($books_ftype->num_rows > 0){

            while($books_ftype_row = $books_ftype->fetch_assoc()){

                $id = $books_ftype_row['id'];
                $author_id = $books_ftype_row['author_id'];
                $book_name = $books_ftype_row['book_name'];
                $book_type = $books_ftype_row['book_type'];
                $book_lang = $books_ftype_row['book_lang'];
                $book_year = $books_ftype_row['book_year'];
                $book_cover = $books_ftype_row['book_cover'];
                $custom_a = $books_ftype_row['custom_a'];
                $custom_b = $books_ftype_row['custom_b'];

                if(!in_array($id, $books_list_arr)){

                    $books_data[] = [
                        'id'=>$id,
                        'author_id'=>$author_id,
                        'book_name'=>$book_name,
                        'book_type'=>$book_type,
                        'book_lang'=>$book_lang,
                        'book_year'=>$book_year,
                        'book_cover'=>$book_cover,
                        'custom_a'=>$custom_a,
                        'custom_b'=>$custom_b
                    ];

                    array_push($books_list_arr, $id);

                }

            }

            $books_count = array_count_values($books_list_arr);

        }

    }elseif($filter_type != null){

        $books_ftype = $conn->query("SELECT * FROM books WHERE book_type LIKE '%$filter_type%'");
        if($books_ftype->num_rows > 0){

            while($books_ftype_row = $books_ftype->fetch_assoc()){

                $id = $books_ftype_row['id'];
                $author_id = $books_ftype_row['author_id'];
                $book_name = $books_ftype_row['book_name'];
                $book_type = $books_ftype_row['book_type'];
                $book_lang = $books_ftype_row['book_lang'];
                $book_year = $books_ftype_row['book_year'];
                $book_cover = $books_ftype_row['book_cover'];
                $custom_a = $books_ftype_row['custom_a'];
                $custom_b = $books_ftype_row['custom_b'];

                if(!in_array($id, $books_list_arr)){

                    $books_data[] = [
                        'id'=>$id,
                        'author_id'=>$author_id,
                        'book_name'=>$book_name,
                        'book_type'=>$book_type,
                        'book_lang'=>$book_lang,
                        'book_year'=>$book_year,
                        'book_cover'=>$book_cover,
                        'custom_a'=>$custom_a,
                        'custom_b'=>$custom_b
                    ];

                    array_push($books_list_arr, $id);

                }

            }

            $books_count = array_count_values($books_list_arr);

        }

    }elseif($filter_lang != null){

        $books_ftype = $conn->query("SELECT * FROM books WHERE book_lang LIKE '%$filter_lang%'");
        if($books_ftype->num_rows > 0){

            while($books_ftype_row = $books_ftype->fetch_assoc()){

                $id = $books_ftype_row['id'];
                $author_id = $books_ftype_row['author_id'];
                $book_name = $books_ftype_row['book_name'];
                $book_type = $books_ftype_row['book_type'];
                $book_lang = $books_ftype_row['book_lang'];
                $book_year = $books_ftype_row['book_year'];
                $book_cover = $books_ftype_row['book_cover'];
                $custom_a = $books_ftype_row['custom_a'];
                $custom_b = $books_ftype_row['custom_b'];

                if(!in_array($id, $books_list_arr)){

                    $books_data[] = [
                        'id'=>$id,
                        'author_id'=>$author_id,
                        'book_name'=>$book_name,
                        'book_type'=>$book_type,
                        'book_lang'=>$book_lang,
                        'book_year'=>$book_year,
                        'book_cover'=>$book_cover,
                        'custom_a'=>$custom_a,
                        'custom_b'=>$custom_b
                    ];

                    array_push($books_list_arr, $id);

                }

            }

            $books_count = array_count_values($books_list_arr);

        }

    }elseif($filter_year != null){

        $books_ftype = $conn->query("SELECT * FROM books WHERE book_year LIKE '%$filter_year%'");
        if($books_ftype->num_rows > 0){

            while($books_ftype_row = $books_ftype->fetch_assoc()){

                $id = $books_ftype_row['id'];
                $author_id = $books_ftype_row['author_id'];
                $book_name = $books_ftype_row['book_name'];
                $book_type = $books_ftype_row['book_type'];
                $book_lang = $books_ftype_row['book_lang'];
                $book_year = $books_ftype_row['book_year'];
                $book_cover = $books_ftype_row['book_cover'];
                $custom_a = $books_ftype_row['custom_a'];
                $custom_b = $books_ftype_row['custom_b'];

                if(!in_array($id, $books_list_arr)){

                    $books_data[] = [
                        'id'=>$id,
                        'author_id'=>$author_id,
                        'book_name'=>$book_name,
                        'book_type'=>$book_type,
                        'book_lang'=>$book_lang,
                        'book_year'=>$book_year,
                        'book_cover'=>$book_cover,
                        'custom_a'=>$custom_a,
                        'custom_b'=>$custom_b
                    ];

                    array_push($books_list_arr, $id);

                }

            }

            $books_count = array_count_values($books_list_arr);

        }

    }else{

        $true = false;
        $books_count = 0;
        $books_data = null;

    }

    $book_arr = [
        'true'=>$true,
        'books_count'=>$books_count,
        'books'=>$books_data,
    ];
    
    $json = json_encode($book_arr);
    
    print_r ($json);

}else{

    $books_count = $conn->query("SELECT * FROM books ORDER BY id")->num_rows;
    $books = $conn->query("SELECT * FROM books ORDER BY id");
    if($books->num_rows > 0){
    
        $books_data = [];
    
        while($book_row = $books->fetch_assoc()){
    
            $id = $book_row['id'];
            $author_id = $book_row['author_id'];
            $book_name = $book_row['book_name'];
            $book_type = $book_row['book_type'];
            $book_lang = $book_row['book_lang'];
            $book_year = $book_row['book_year'];
            $book_cover = $book_row['book_cover'];
            $custom_a = $book_row['custom_a'];
            $custom_b = $book_row['custom_b'];
    
            $books_data[] = [
                'id'=>$id,
                'author_id'=>$author_id,
                'book_name'=>$book_name,
                'book_type'=>$book_type,
                'book_lang'=>$book_lang,
                'book_year'=>$book_year,
                'book_cover'=>$book_cover,
                'custom_a'=>$custom_a,
                'custom_b'=>$custom_b
            ];
    
        }
    
    }
    
    $book_arr = [
        'books_count'=>$books_count,
        'books'=>$books_data,
    ];
    
    $json = json_encode($book_arr);
    
    print_r ($json);

}

?>