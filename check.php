<?php

ini_set('error_reporting', 'off');
ini_set('display_errors', 'off');
ini_set('display_startup_errors', 'off');

session_start();

include "../database.php";

function upd_ver(){

    $old_ver = file_get_contents("../upd_ver");
    $new_ver = $old_ver + 1;
    file_put_contents("../upd_ver", $new_ver);

    return $new_ver;

}

if($_SESSION['user'] == null){

    header('Location: ../logout');

}

$login_user = $_SESSION['user'];
$check_login = $conn->query("SELECT * FROM login WHERE login = '$login_user'");

if($check_login->num_rows <= 0){

    header('Location: ../logout');

}

?>