<?php

include "../../check2.php";

$page_id = $_SESSION['page-id'];

$conn->query("DELETE FROM pages WHERE id = '$page_id'");

header("Location: ../pages");

?>