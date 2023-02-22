<?php

include "../check.php";

?>
<!DOCTYPE html>
<html lang="en">
<head>
    
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Web Admin Panel</title>

    <link rel="stylesheet" href="style.css">

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

            <a href="./" class="item active">Dashboard</a>
            <a href="./authors" class="item">Authors</a>
            <a href="./books" class="item">Books</a>
            <a href="./pages" class="item">Pages</a>
            <a href="./types" class="item">Types</a>
            <a href="./langs" class="item">Languages</a>
            <a href="../logout" class="item danger">Log Out</a>

        </div>

    </div>

    <div class="content">

        <div class="title">

            <p>Dashboard</p>

        </div>

        <div class="stats">

            <div class="item">

                <p class="title">
                    Authors Count
                </p>

                <p class="stat">
                    <?php

                    echo $conn->query("SELECT * FROM authors ORDER BY id")->num_rows;

                    ?>
                </p>

            </div>

            <div class="item">

                <p class="title">
                    Books Count
                </p>

                <p class="stat">
                    <?php

                    echo $conn->query("SELECT * FROM books ORDER BY id")->num_rows;

                    ?>
                </p>

            </div>

            <div class="item">

                <p class="title">
                    Pages Count
                </p>

                <p class="stat">
                    <?php

                    echo $conn->query("SELECT * FROM pages ORDER BY id")->num_rows;

                    ?>
                </p>

            </div>

            <div class="item">

                <p class="title">
                    Types Count
                </p>

                <p class="stat">
                    <?php

                    echo $conn->query("SELECT * FROM types ORDER BY id")->num_rows;

                    ?>
                </p>

            </div>

            <div class="item">

                <p class="title">
                    Languages Count
                </p>

                <p class="stat">
                    <?php

                    echo $conn->query("SELECT * FROM langs ORDER BY id")->num_rows;

                    ?>
                </p>

            </div>

        </div>

    </div>

</div>

</body>
</html>