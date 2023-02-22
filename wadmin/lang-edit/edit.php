<?php

include "../../check2.php";

if($_POST != null){

    $lang_id = $_SESSION['lang-id'];

    if($lang_id == null){

        header("Location: ../langs");

    }

    if($_POST['lang'] != null){

        $lang = $_POST['lang'];
        $conn->query("UPDATE langs SET lang = '$lang' WHERE id = '$lang_id'");

    }

}

header("Location: ../langs");

?>