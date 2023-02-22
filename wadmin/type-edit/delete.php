<?php

include "../../check2.php";

$type_id = $_SESSION['type-id'];

$conn->query("DELETE FROM types WHERE id = '$type_id'");

header("Location: ../types");

?>