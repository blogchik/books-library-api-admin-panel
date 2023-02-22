<?php

include "../../check2.php";

$author_id = $_SESSION['author-id'];

$conn->query("DELETE FROM authors WHERE id = '$author_id'");

header("Location: ../authors");

?>