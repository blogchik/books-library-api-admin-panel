<?php

include "../../check2.php";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Web Admin Panel - Pages</title>

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
            <a href="./" class="item active">Pages</a>
            <a href="../types" class="item">Types</a>
            <a href="../langs" class="item">Languages</a>
            <a href="../../logout" class="item danger">Log Out</a>

        </div>

    </div>

    <div class="content">

        <div class="title">

            <p>Pages</p>

        </div>

        <form action="./add.php" method="post" class="action" enctype="multipart/form-data">

            <p class="title">Add New Page</p>

            <label for="book">Book:</label>
            <select name="book" id="book" required>
                <?php

                $books = $conn->query("SELECT * FROM books ORDER BY id");
                if($books->num_rows > 0){

                    echo "<option value='0' selected>Select Book</option>";

                    while($book_row = $books->fetch_assoc()){

                        $book_id = $book_row['id'];
                        $book_name = $book_row['book_name'];

                        echo "<option value='$book_id'>$book_name</option>";

                    }

                }else{

                    echo "<option value='0' selected>No Books!</option>";

                }

                ?>
            </select>

            <label for="page_num">Page Num:</label>
            <input type="number" name="page_num" id="page_num" placeholder="Page Num" required>

            <label for="page_photo_arabic">Page Photo Arabic:</label>
            <input type="file" name="page_photo_arabic" id="page_photo_arabic" placeholder="Choose file" accept="image/*">

            <label for="page_photo_handw">Page Photo HandWrite:</label>
            <input type="file" name="page_photo_handw" id="page_photo_handw" placeholder="Choose file" accept="image/*">

            <label for="page_photo_uzbek">Page Photo Uzbek:</label>
            <input type="file" name="page_photo_uzbek" id="page_photo_uzbek" placeholder="Choose file" accept="image/*">

            <label for="page_photo_transc">Page Photo Transcription:</label>
            <input type="file" name="page_photo_transc" id="page_photo_transc" placeholder="Choose file" accept="image/*">

            <label for="page_audio_1">Page Audio 1:</label>
            <input type="file" name="page_audio_1" id="page_audio_1" placeholder="Choose file" accept=".mp3,audio/*">

            <label for="page_audio_2">Page Audio 2:</label>
            <input type="file" name="page_audio_2" id="page_audio_2" placeholder="Choose file" accept=".mp3,audio/*">

            <button type="submit">ADD PAGE</button>

        </form>

        <div class="choose">

            <form action="./" method="get">

                <label for="book">Choose Book:</label>
                <select name="book" id="book" required>
                    <?php

                    $books = $conn->query("SELECT * FROM books ORDER BY id");
                    if($books->num_rows > 0){

                        echo "<option value='0' selected>Select Book</option>";

                        while($book_row = $books->fetch_assoc()){

                            $book_id = $book_row['id'];
                            $book_name = $book_row['book_name'];

                            echo "<option value='$book_id'>$book_name</option>";

                        }

                    }else{

                        echo "<option value='0' selected>No Books!</option>";

                    }

                    ?>
                </select>

                <button type="submit">APPLY</button>

            </form>

        </div>

        <?php

        if($_GET['book'] != null){

            $book_id = $_GET['book'];
            $check = $conn->query("SELECT * FROM books WHERE id = '$book_id'");
            if($check->num_rows > 0){

                ?>
                
                <div class="table">

                    <table>

                        <tr>
                            <th>ID</th>
                            <th>Book</th>
                            <th>Page Num</th>
                            <th>Photo Arabic</th>
                            <th>Photo HandWrite</th>
                            <th>Photo Uzbek</th>
                            <th>Photo Transcription</th>
                            <th>Audio 1</th>
                            <th>Audio 2</th>
                            <th>Action</th>
                        </tr>

                        <?php

                        $pages = $conn->query("SELECT * FROM pages WHERE book_id = '$book_id'");
                        if($pages->num_rows > 0){

                            while($page_row = $pages->fetch_assoc()){

                                $page_id = $page_row['id'];
                                $book_id = $page_row['book_id'];
                                $book_name = $conn->query("SELECT * FROM books WHERE id = '$book_id'")->fetch_assoc()['book_name'];
                                $page_num = $page_row['page_num'];
                                $page_photo_arabic_url = $page_row['page_photo_arabic'];
                                if($page_photo_arabic_url == null){ $page_photo_arabic = "None"; }else{ $page_photo_arabic = "<img src='$page_photo_arabic_url' alt=''>"; }
                                $page_photo_handw_url = $page_row['page_photo_handw'];
                                if($page_photo_handw_url == null){ $page_photo_handw = "None"; }else{ $page_photo_handw = "<img src='$page_photo_handw_url' alt=''>"; }
                                $page_photo_uzbek_url = $page_row['page_photo_uzbek'];
                                if($page_photo_uzbek_url == null){ $page_photo_uzbek = "None"; }else{ $page_photo_uzbek = "<img src='$page_photo_uzbek_url' alt=''>"; }
                                $page_photo_transc_url = $page_row['page_photo_transc'];
                                if($page_photo_transc_url == null){ $page_photo_transc = "None"; }else{ $page_photo_transc = "<img src='$page_photo_transc_url' alt=''>"; }
                                $page_audio1_url = $page_row['page_audio1'];
                                if($page_audio1_url == null){ $page_audio1 = "None"; }else{ $page_audio1 = "<audio controls><source src='$page_audio1_url' type='audio/mpeg'>Your browser don't support audio!</audio>"; }
                                $page_audio2_url = $page_row['page_audio2'];
                                if($page_audio2_url == null){ $page_audio2 = "None"; }else{ $page_audio2 = "<audio controls><source src='$page_audio2_url' type='audio/mpeg'>Your browser don't support audio!</audio>"; }

                                echo "
                                <tr>
                                    <td>$page_id</td>
                                    <td>$book_name</td>
                                    <td>$page_num</td>
                                    <td>$page_photo_arabic</td>
                                    <td>$page_photo_handw</td>
                                    <td>$page_photo_uzbek</td>
                                    <td>$page_photo_transc</td>
                                    <td>$page_audio1</td>
                                    <td>$page_audio2</td>
                                    <td><a href='../page-edit/?id=$page_id'><i class='fi fi-rr-edit'></i></a></td>
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
                
                <?php

            }

        }

        ?>

    </div>

</div>

</body>
</html>