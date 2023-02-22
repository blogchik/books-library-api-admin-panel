<?php

include "../../check2.php";

if($_POST != null){

    $author_id = $_SESSION['author-id'];

    if($author_id == null){

        header("Location: ./");

    }

    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $birth_date = $_POST['birth_date'];
    $die_date = $_POST['die_date'];

    if($first_name != null){

        $conn->query("UPDATE authors SET first_name = '$first_name' WHERE id = '$author_id'");

    }

    if($last_name != null){

        $conn->query("UPDATE authors SET last_name = '$last_name' WHERE id = '$author_id'");

    }

    if($birth_date != null){

        $conn->query("UPDATE authors SET birth_date = '$birth_date' WHERE id = '$author_id'");

    }

    if($die_date != null){

        $conn->query("UPDATE authors SET die_date = '$die_date' WHERE id = '$author_id'");

    }

    if($_FILES['photo']['name'] != null){

        $target_dir = "../../photos/";
        $target_file = $target_dir . basename($_FILES["photo"]["name"]);
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        move_uploaded_file($_FILES["photo"]["tmp_name"], "../../photos/author-$author_id." . $imageFileType);

        $ver = upd_ver();
        
        $photo_url = "https://blogchik-bots.uz/api/books-library/photos/author-$author_id." . $imageFileType . "?ver=$ver";

        $conn->query("UPDATE authors SET photo = '$photo_url' WHERE id = '$author_id'");

    }

}

header("Location: ./");

?>