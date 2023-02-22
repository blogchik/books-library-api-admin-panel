<?php

include "../../check2.php";

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

        <form action="./add.php" method="post" class="action" enctype="multipart/form-data">

            <p class="title">Add New Language</p>

            <label for="lang">Language:</label>
            <input type="text" name="lang" id="lang" placeholder="Language" required>

            <button type="submit">ADD LANGUAGE</button>

        </form>

        <div class="table">

            <table>

                <tr>
                    <th>ID</th>
                    <th>Language</th>
                    <th>Action</th>
                </tr>

                <?php

                $langs = $conn->query("SELECT * FROM langs ORDER BY id");
                if($langs->num_rows > 0){

                    while($langs_row = $langs->fetch_assoc()){

                        $id = $langs_row['id'];
                        $lang = $langs_row['lang'];

                        echo "
                            <tr>
                            <td>$id</td>
                            <td>$lang</td>
                            <td><a href='../lang-edit/?id=$id'><i class='fi fi-rr-edit'></i></a></td>
                        </tr>
                        ";

                    }

                }else{

                    ?>

                    <tr>
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