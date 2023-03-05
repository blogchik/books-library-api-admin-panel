<?php

include "../../check2.php";

if($_POST != null){

    $book_name = $_POST['book_name'];
    $author = $_POST['author'];
    $book_type_id = $_POST['book_type'];
    $book_type = $conn->query("SELECT * FROM types WHERE id = '$book_type_id'")->fetch_assoc()['type'];
    $book_lang_id = $_POST['book_lang'];
    $book_lang = $conn->query("SELECT * FROM langs WHERE id = '$book_lang_id'")->fetch_assoc()['lang'];
    $book_year = $_POST['book_year'];
    $custom_a = $_POST['custom_a'];
    $custom_b = $_POST['custom_b'];

    $conn->query("INSERT INTO books (id, author_id, book_name, book_type, book_lang)
    VALUES (null, '$author', '$book_name', '$book_type', '$book_lang')");
    $book_id = $conn->insert_id;

    if($book_year != null){

        $conn->query("UPDATE books SET book_year = '$book_year' WHERE id = '$book_id'");

    }

    if($custom_a != null){

        $conn->query("UPDATE books SET custom_a = '$custom_a' WHERE id = '$book_id'");

    }

    if($custom_b != null){

        $conn->query("UPDATE books SET custom_b = '$custom_b' WHERE id = '$book_id'");

    }

    if($_FILES['cover']['name'] != null){

        $target_dir = "../../photos/";
        $target_file = $target_dir . basename($_FILES["cover"]["name"]);
        
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

        move_uploaded_file($_FILES["cover"]["tmp_name"], "../../photos/bcover-$book_id." . $imageFileType);
        
        $photo_url = "https://iandroid.uz/bl/photos/bcover-$book_id." . $imageFileType;

        $conn->query("UPDATE books SET book_cover = '$photo_url' WHERE id = '$book_id'");

    }

}

header("Location: ./");

?>