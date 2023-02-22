<?php

include "../../check2.php";

if($_POST != null){

    $type_id = $_SESSION['type-id'];

    if($type_id == null){

        header("Location: ../types");

    }

    if($_POST['type'] != null){

        $type = $_POST['type'];
        $conn->query("UPDATE types SET type = '$type' WHERE id = '$type_id'");

    }

}

header("Location: ../types");

?>