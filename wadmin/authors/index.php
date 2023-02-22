<?php

include "../../check2.php";

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

        <form action="./add.php" method="post" class="action" enctype="multipart/form-data">

            <p class="title">Add New Author</p>

            <label for="first_name">First Name:</label>
            <input type="text" name="first_name" id="first_name" placeholder="First Name" required>

            <label for="last_name">Last Name:</label>
            <input type="text" name="last_name" id="last_name" placeholder="Last Name" required>

            <label for="birth_date">Birth Date:</label>
            <input type="date" name="birth_date" id="birth_date" placeholder="Birth Date">

            <label for="die_date">Die Date:</label>
            <input type="date" name="die_date" id="die_date" placeholder="Die Date">

            <label for="photo">Photo:</label>
            <input type="file" name="photo" id="photo" placeholder="Choose file" accept="image/*">

            <button type="submit">ADD AUTHOR</button>

        </form>

        <div class="table">

            <table>

                <tr>
                    <th>ID</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Birth Date</th>
                    <th>Die Date</th>
                    <th>Photo</th>
                    <th>Action</th>
                </tr>

                <?php

                $authors = $conn->query("SELECT * FROM authors ORDER BY id");
                if($authors->num_rows > 0){

                    while($authors_row = $authors->fetch_assoc()){

                        $author_id = $authors_row['id'];
                        $first_name = $authors_row['first_name'];
                        $last_name = $authors_row['last_name'];
                        $birth_date = $authors_row['birth_date'];
                        $die_date = $authors_row['die_date'];
                        if($die_date == null){ $die_date = "None"; }
                        $photo_url = $authors_row['photo'];
                        if($photo_url == null){ $photo = "None"; }else{ $photo = "<img src='$photo_url' alt=''>"; }

                        echo "
                        <tr>
                            <td>$author_id</td>
                            <td>$first_name</td>
                            <td>$last_name</td>
                            <td>$birth_date</td>
                            <td>$die_date</td>
                            <td>$photo</td>
                            <td><a href='../author-edit/?id=$author_id'><i class='fi fi-rr-edit'></i></a></td>
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