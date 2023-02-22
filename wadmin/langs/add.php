<?php

include "../../check2.php";

if($_POST != null){

    $lang = $_POST['lang'];

    $check = $conn->query("SELECT * FROM langs WHERE type = '$lang'");

    if($check->num_rows == 0){

        $conn->query("INSERT INTO langs (id, lang)
        VALUES (null, '$lang')");

    }

}

header("Location: ./");

?>