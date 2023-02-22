<?php

include "../../check2.php";

if($_GET['id'] == null){

    header("Location: ../pages");

}

$page_id = $_GET['id'];
$check = $conn->query("SELECT * FROM pages WHERE id = '$page_id'");

if($check->num_rows > 0){

    $page_row = $check->fetch_assoc();

    $book_id = $page_row['book_id'];
    $book_name = $conn->query("SELECT * FROM books WHERE id = '$book_id'")->fetch_assoc()['book_name'];
    $page_num = $page_row['page_num'];
    $page_photo_arabic = $page_row['page_photo_arabic'];
    $page_photo_handw = $page_row['page_photo_handw'];
    $page_photo_uzbek = $page_row['page_photo_uzbek'];
    $page_photo_transc = $page_row['page_photo_transc'];
    $page_audio1 = $page_row['page_audio1'];
    $page_audio2 = $page_row['page_audio2'];

    $_SESSION['page-id'] = $page_id;

}else{

    header("Location: ../pages");

}

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

        <form action="./edit.php" method="post" class="action" enctype="multipart/form-data">

            <p class="title">Edit Pages - <?php echo "$book_name | $page_num"; ?></p>

            <label for="book">Book:</label>
            <select name="book" id="book" required>
                <?php

                $books = $conn->query("SELECT * FROM books ORDER BY id");
                if($books->num_rows > 0){

                    echo "<option value='0' selected>Select Book</option>";

                    while($book_row = $books->fetch_assoc()){

                        $book_idd = $book_row['id'];
                        $book_namee = $book_row['book_name'];

                        if($book_id == $book_idd){

                            echo "<option selected value='$book_idd'>$book_namee</option>";

                        }else{

                            echo "<option value='$book_idd'>$book_namee</option>";

                        }

                    }

                }else{

                    echo "<option value='0' selected>No Books!</option>";

                }

                ?>
            </select>

            <label for="page_num">Page Num:</label>
            <input type="number" name="page_num" id="page_num" placeholder="Page Num" required <?php echo "value='$page_num'"; ?>>

            <label for="page_photo_arabic">Page Photo Arabic:</label>
            <input type="file" name="page_photo_arabic" id="page_photo_arabic" placeholder="Choose file" accept="image/*">

            <?php if($page_photo_arabic != null){ echo "<img src='$page_photo_arabic' alt=''>"; } ?>

            <label for="page_photo_handw">Page Photo HandWrite:</label>
            <input type="file" name="page_photo_handw" id="page_photo_handw" placeholder="Choose file" accept="image/*">

            <?php if($page_photo_handw != null){ echo "<img src='$page_photo_handw' alt=''>"; } ?>

            <label for="page_photo_uzbek">Page Photo Uzbek:</label>
            <input type="file" name="page_photo_uzbek" id="page_photo_uzbek" placeholder="Choose file" accept="image/*">

            <?php if($page_photo_uzbek != null){ echo "<img src='$page_photo_uzbek' alt=''>"; } ?>

            <label for="page_photo_transc">Page Photo Transcription:</label>
            <input type="file" name="page_photo_transc" id="page_photo_transc" placeholder="Choose file" accept="image/*">

            <?php if($page_photo_transc != null){ echo "<img src='$page_photo_transc' alt=''>"; } ?>

            <label for="page_audio_1">Page Audio 1:</label>
            <input type="file" name="page_audio_1" id="page_audio_1" placeholder="Choose file" accept=".mp3,audio/*">

            <?php if($page_audio1 != null){ echo "<audio controls><source src='$page_audio1' type='audio/mpeg'>Your browser don't support audio!</audio>"; } ?>

            <label for="page_audio_2">Page Audio 2:</label>
            <input type="file" name="page_audio_2" id="page_audio_2" placeholder="Choose file" accept=".mp3,audio/*">

            <?php if($page_audio2 != null){ echo "<audio controls><source src='$page_audio2' type='audio/mpeg'>Your browser don't support audio!</audio>"; } ?>

            <button type="submit">UPDATE</button>

            <a href="./delete.php" class="btn danger">DELETE</a>

        </form>

    </div>

</div>

</body>
</html>