<?php

include "../../check2.php";

$book_id = $_SESSION['book-id'];

$conn->query("DELETE FROM books WHERE id = '$book_id'");

header("Location: ../books");

?>