<?php

include "../../check2.php";

if($_GET['id'] == null){

    header("Location: ../types");

}

$type_id = $_GET['id'];
$check = $conn->query("SELECT * FROM types WHERE id = '$type_id'");
if($check->num_rows > 0){

    $type_row = $check->fetch_assoc();
    $type = $type_row['type'];
    
    $_SESSION['type-id'] = $type_id;

}else{

    header("Location: ../types");

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Web Admin Panel - Types</title>

    <link rel="stylesheet" href="../style.css">

</head>
<body>
    
<div class="container">
    
    <div class="menu">

        <div class="header">

            <p class="title">
                Web Admin Panel
            </p>

        </div>

        <div class="items">

            <a href="../" class="item">Dashboard</a>
            <a href="../authors" class="item">Authors</a>
            <a href="../books" class="item">Books</a>
            <a href="../pages" class="item">Pages</a>
            <a href="./" class="item active">Types</a>
            <a href="../langs" class="item">Languages</a>
            <a href="../../logout" class="item danger">Log Out</a>

        </div>

    </div>

    <div class="content">

        <div class="title">

            <p>Types</p>

        </div>

        <form action="./edit.php" method="post" class="action" enctype="multipart/form-data">

            <p class="title">Edit Type - <?php echo "$type"; ?></p>

            <label for="type">Type:</label>
            <input type="text" name="type" id="type" placeholder="Type" required <?php echo "value='$type'"; ?>>

            <button type="submit">UPDATE</button>

            <a href="./delete.php" class="btn danger">DELETE</a>

        </form>

    </div>

</div>

</body>
</html>