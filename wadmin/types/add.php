<?php

include "../../check2.php";

if($_POST != null){

    $type = $_POST['type'];

    $check = $conn->query("SELECT * FROM types WHERE type = '$type'");

    if($check->num_rows == 0){

        $conn->query("INSERT INTO types (id, type)
        VALUES (null, '$type')");

    }

}

header("Location: ./");

?>