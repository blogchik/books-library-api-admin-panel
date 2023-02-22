<?php

include "../../check2.php";

if($_GET['id'] == null){

    header("Location: ../langs");

}

$lang_id = $_GET['id'];
$check = $conn->query("SELECT * FROM langs WHERE id = '$lang_id'");
if($check->num_rows > 0){

    $lang_row = $check->fetch_assoc();
    $lang = $lang_row['lang'];
    
    $_SESSION['lang-id'] = $lang_id;

}else{

    header("Location: ../langs");

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Web Admin Panel - Languages</title>

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
            <a href="../types" class="item">Types</a>
            <a href="./" class="item active">Languages</a>
            <a href="../../logout" class="item danger">Log Out</a>

        </div>

    </div>

    <div class="content">

        <div class="title">

            <p>Languages</p>

        </div>

        <form action="./edit.php" method="post" class="action" enctype="multipart/form-data">

            <p class="title">Edit Language - <?php echo "$lang"; ?></p>

            <label for="lang">Language:</label>
            <input type="text" name="lang" id="lang" placeholder="Lang" required <?php echo "value='$lang'"; ?>>

            <button type="submit">UPDATE</button>

            <a href="./delete.php" class="btn danger">DELETE</a>

        </form>

    </div>

</div>

</body>
</html>