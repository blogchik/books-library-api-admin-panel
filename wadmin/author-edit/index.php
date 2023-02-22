<?php

include "../../check2.php";

if($_GET['id'] == null){

    header("Location: ../authors/");

}else{

    $author_id = $_GET['id'];

    $check = $conn->query("SELECT * FROM authors WHERE id = '$author_id'");
    if($check->num_rows > 0){

        $author_row = $check->fetch_assoc();
        $first_name = $author_row['first_name'];
        $last_name = $author_row['last_name'];
        $birth_date = $author_row['birth_date'];
        $die_date = $author_row['die_date'];
        $photo = $author_row['photo'];

        $_SESSION['author-id'] = $author_id;

    }else{

        header("Location: ../authors/");

    }

}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Web Admin Panel - Authors</title>

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
            <a href="./" class="item active">Authors</a>
            <a href="../books" class="item">Books</a>
            <a href="../pages" class="item">Pages</a>
            <a href="../types" class="item">Types</a>
            <a href="../langs" class="item">Languages</a>
            <a href="../../logout" class="item danger">Log Out</a>

        </div>

    </div>

    <div class="content">

        <div class="title">

            <p>Authors</p>

        </div>

        <form action="./edit.php" method="post" class="action" enctype="multipart/form-data">

            <p class="title">Edit Author - <?php echo "$first_name $last_name"; ?></p>

            <label for="first_name">First Name:</label>
            <input type="text" name="first_name" id="first_name" placeholder="First Name" required <?php echo "value='$first_name'"; ?>>

            <label for="last_name">Last Name:</label>
            <input type="text" name="last_name" id="last_name" placeholder="Last Name" required <?php echo "value='$last_name'"; ?>>

            <label for="birth_date">Birth Date:</label>
            <input type="date" name="birth_date" id="birth_date" placeholder="Birth Date" <?php if($birth_date != null){ echo "value='$birth_date'"; } ?>>

            <label for="die_date">Die Date:</label>
            <input type="date" name="die_date" id="die_date" placeholder="Die Date" <?php if($die_date != null){ echo "value='$die_date'"; } ?>>

            <label for="photo">Photo:</label>
            <input type="file" name="photo" id="photo" placeholder="Choose file" accept="image/*">

            <?php if($photo != null){ echo "<img src='$photo' alt=''>"; } ?>

            <button type="submit">UPDATE</button>
            <a href="./delete.php" class="btn danger">DELETE</a>

        </form>

    </div>

</div>

</body>
</html>