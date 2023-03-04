<?php

$servername = "localhost";
$username = "iandroid_admin";
$password = "3472004jabab";
$dbname = "iandroid_bl";

$conn = new mysqli($servername, $username, $password, $dbname);

if($conn->connect_error){

    die("Connection failed: " . $conn->connect_error);

}

?>