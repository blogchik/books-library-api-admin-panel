<?php

include "../../check2.php";

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

        <form action="./add.php" method="post" class="action" enctype="multipart/form-data">

            <p class="title">Add New Book</p>

            <label for="book_name">Book Name:</label>
            <input type="text" name="book_name" id="book_name" placeholder="Book Name" required>

            <label for="author">Book Author:</label>
            <select name="author" id="author" required>

            <?php

            $authors_select = $conn->query("SELECT * FROM authors ORDER BY id");
            if($authors_select->num_rows > 0){

                echo "<option value='0' selected>Select Author</option>";

                while($author_row = $authors_select->fetch_assoc()){

                    $author_id = $author_row['id'];
                    $first_name = $author_row['first_name'];
                    $last_name = $author_row['last_name'];

                    echo "<option value='$author_id'>$first_name $last_name</option>";

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

                    echo "<option value='$type_id'>$type</option>";

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

                echo "<option value='0' selected>Select Lang</option>";

                while($langs_row = $langs_select->fetch_assoc()){

                    $lang_id = $langs_row['id'];
                    $lang = $langs_row['lang'];

                    echo "<option value='$lang_id'>$lang</option>";

                }

            }else{

                ?>

                <option value="0" selected>No Langs</option>

                <?php

            }

            ?>

            </select>
            
            <label for="book_year">Book Year:</label>
            <input type="date" name="book_year" id="book_year" placeholder="Book Year" required>

            <label for="cover">Book Cover:</label>
            <input type="file" name="cover" id="cover" placeholder="Choose file" accept="image/*">

            <label for="custom_a">Custom A:</label>
            <input type="text" name="custom_a" id="custom_a" placeholder="Custom A">

            <label for="custom_b">Custom B:</label>
            <input type="text" name="custom_b" id="custom_b" placeholder="Custom B">

            <button type="submit">ADD BOOK</button>

        </form>

        <div class="table">

            <table>

                <tr>
                    <th>ID</th>
                    <th>Author</th>
                    <th>Name</th>
                    <th>Type</th>
                    <th>Lang</th>
                    <th>Year</th>
                    <th>Cover</th>
                    <th>A</th>
                    <th>B</th>
                    <th>Action</th>
                </tr>

                <?php

                $books = $conn->query("SELECT * FROM books ORDER BY id");
                if($books->num_rows > 0){

                    while($books_row = $books->fetch_assoc()){

                        $book_id = $books_row['id'];
                        $author_id = $books_row['author_id'];
                        $author_name = $conn->query("SELECT * FROM authors WHERE id = '$author_id'")->fetch_assoc()['first_name'] . " " . $conn->query("SELECT * FROM authors WHERE id = '$author_id'")->fetch_assoc()['last_name'];
                        $book_name = $books_row['book_name'];
                        $book_type = $books_row['book_type'];
                        $book_lang = $books_row['book_lang'];
                        $book_year = $books_row['book_year'];
                        $book_cover_url = $books_row['book_cover'];
                        if($book_cover_url == null){ $book_cover = "None"; }else{ $book_cover = "<img src='$book_cover_url' alt=''>"; }
                        $custom_a = $books_row['custom_a'];
                        if($custom_a == null){ $custom_a = "None"; }
                        $custom_b = $books_row['custom_b'];
                        if($custom_b == null){ $custom_b = "None"; }

                        echo "
                            <tr>
                            <td>$book_id</td>
                            <td>$author_name</td>
                            <td>$book_name</td>
                            <td>$book_type</td>
                            <td>$book_lang</td>
                            <td>$book_year</td>
                            <td>$book_cover</td>
                            <td>$custom_a</td>
                            <td>$custom_b</td>
                            <td><a href='../book-edit/?id=$book_id'><i class='fi fi-rr-edit'></i></a></td>
                        </tr>
                        ";

                    }

                }else{

                    ?>

                    <tr>
                        <td>None</td>
                        <td>None</td>
                        <td>None</td>
                        <td>None</td>
                        <td>None</td>
                        <td>None</td>
                        <td>None</td>
                        <td>None</td>
                        <td>None</td>
                        <td>None</td>
                    </tr>

                    <?php

                }

                ?>

            </table>

        </div>

    </div>

</div>

</body>
</html>