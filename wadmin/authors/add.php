<?php

include "../../check2.php";

if($_POST != null){

    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $birth_date = $_POST['birth_date'];
    $die_date = $_POST['die_date'];

    $conn->query("INSERT INTO authors (id, first_name, last_name)
    VALUES (null, '$first_name', '$last_name')");
    $author_id = $conn->insert_id;

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
        $photo_url = "https://iandroid.uz/bl/photos/author-$author_id." . $imageFileType;

        $conn->query("UPDATE authors SET photo = '$photo_url' WHERE id = '$author_id'");

    }

}

header("Location: ./");

?>