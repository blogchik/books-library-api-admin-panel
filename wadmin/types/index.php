<?php

include "../../check2.php";

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

        <form action="./add.php" method="post" class="action" enctype="multipart/form-data">

            <p class="title">Add New Type</p>

            <label for="type">Type:</label>
            <input type="text" name="type" id="type" placeholder="Type" required>

            <button type="submit">ADD TYPE</button>

        </form>

        <div class="table">

            <table>

                <tr>
                    <th>ID</th>
                    <th>Type</th>
                    <th>Action</th>
                </tr>

                <?php

                $types = $conn->query("SELECT * FROM types ORDER BY id");
                if($types->num_rows > 0){

                    while($types_row = $types->fetch_assoc()){

                        $id = $types_row['id'];
                        $type = $types_row['type'];

                        echo "
                            <tr>
                            <td>$id</td>
                            <td>$type</td>
                            <td><a href='../type-edit/?id=$id'><i class='fi fi-rr-edit'></i></a></td>
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