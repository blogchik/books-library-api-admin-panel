<?php

include "../../check2.php";

$lang_id = $_SESSION['lang-id'];

$conn->query("DELETE FROM langs WHERE id = '$lang_id'");

header("Location: ../langs");

?>