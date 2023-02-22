<?php

session_start();

include "../database.php";

$_SESSION['user'] = null;

header("Location: ../login");

?>