<?php

include "../../check2.php";

if($_GET['id'] == null){

    header("Location: ../books");

}

$book_id = $_GET['id'];

$check = $conn->query("SELECT * FROM books WHERE id = '$book_id'");
if($check->num_rows > 0){

    $book_row = $check->fetch_assoc();

    $author_id = $book_row['author_id'];
    $book_name = $book_row['book_name'];
    $book_type = $book_row['book_type'];
    $book_lang = $book_row['book_lang'];
    $book_year = $book_row['book_year'];
    $book_cover = $book_row['book_cover'];
    $custom_a = $book_row['custom_a'];
    $custom_b = $book_row['custom_b'];

    $_SESSION['book-id'] = $book_id;

}else{

    header("Location: ../books");

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Web Admin Panel - Books</title>

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
            <a href="./" class="item active">Books</a>
            <a href="../pages" class="item">Pages</a>
            <a href="../types" class="item">Types</a>
            <a href="../langs" class="item">Languages</a>
            <a href="../../logout" class="item danger">Log Out</a>

        </div>

    </div>

    <div class="content">

        <div class="title">

            <p>Books</p>

        </div>

        <form action="./edit.php" method="post" class="action" enctype="multipart/form-data">

            <p class="title">Edit Book - <?php echo $book_name; ?></p>

            <label for="book_name">Book Name:</label>
            <input type="text" name="book_name" id="book_name" placeholder="Book Name" required <?php echo "value='$book_name'"; ?>>

            <label for="author">Book Author:</label>
            <select name="author" id="author" required>

            <?php

            $authors_select = $conn->query("SELECT * FROM authors ORDER BY id");
            if($authors_select->num_rows > 0){

                echo "<option value='0' selected>Select Author</option>";

                while($author_row = $authors_select->fetch_assoc()){

                    $authorr_id = $author_row['id'];
                    $first_name = $author_row['first_name'];
                    $last_name = $author_row['last_name'];

                    if($authorr_id == $author_id){

                        echo "<option selected value='$authorr_id'>$first_name $last_name</option>";

                    }else{

                        echo "<option value='$authorr_id'>$first_name $last_name</option>";

                    }

                }

            }else{

                ?>

                <option value="0" selected>No Authors</option>

                <?php

            }

            ?>

            </select>

            <label for="book_type">Book Type:</label>
            <select name="book_type" id="book_type" required>

            <?php

            $types_select = $conn->query("SELECT * FROM types ORDER BY id");
            if($types_select->num_rows > 0){

                echo "<option value='0' selected>Select Type</option>";

                while($types_row = $types_select->fetch_assoc()){

                    $type_id = $types_row['id'];
                    $type = $types_row['type'];

                    if($type == $book_type){

                        echo "<option selected value='$type_id'>$type</option>";

                    }else{

                        echo "<option value='$type_id'>$type</option>";

                    }

                }

            }else{

                ?>

                <option value="0" selected>No Types</option>

                <?php

            }

            ?>

            </select>

            <label for="book_lang">Book Lang:</label>
            <select name="book_lang" id="book_lang" required>

            <?php

            $langs_select = $conn->query("SELECT * FROM langs ORDER BY id");
            if($langs_select->num_rows > 0){

                echo "<option value='0'>Select Lang</option>";

                while($langs_row = $langs_select->fetch_assoc()){

                    $lang_id = $langs_row['id'];
                    $lang = $langs_row['lang'];

                    if($lang == $book_lang){

                        echo "<option selected value='$lang_id'>$lang</option>";

                    }else{

                        echo "<option value='$lang_id'>$lang</option>";

                    }

                }

            }else{

                ?>

                <option value="0" selected>No Langs</option>

                <?php

            }

            ?>

            </select>
            
            <label for="book_year">Book Year:</label>
            <input type="date" name="book_year" id="book_year" placeholder="Book Year" required <?php echo "value='$book_year'"; ?>>

            <label for="cover">Book Cover:</label>
            <input type="file" name="cover" id="cover" placeholder="Choose file" accept="image/*">

            <?php if($book_cover != null){ echo "<img src='$book_cover' alt=''>"; } ?>

            <label for="custom_a">Custom A:</label>
            <input type="text" name="custom_a" id="custom_a" placeholder="Custom A" <?php echo "value='$custom_a'"; ?>>

            <label for="custom_b">Custom B:</label>
            <input type="text" name="custom_b" id="custom_b" placeholder="Custom B" <?php echo "value='$custom_b'"; ?>>

            <button type="submit">UPDATE</button>
            <a href="./delete.php" class="btn danger">DELETE</a>

        </form>

    </div>

</div>

</body>
</html>