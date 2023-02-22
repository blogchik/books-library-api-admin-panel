<?php

session_start();

include "../database.php";

if($_SESSION['user'] != null){

    header("Location: ../wadmin");

}

if($_POST != null){

    $login = $_POST['login'];
    $password = $_POST['password'];

    $check = $conn->query("SELECT * FROM login WHERE login = '$login'");
    if($check->num_rows > 0){

        $user_pass = $check->fetch_assoc()['password'];

        if(password_verify($password, $user_pass)){

            $_SESSION['user'] = "$login";
            header("Location: ../wadmin");

        }

    }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Web Admin Panel - Login</title>

    <link rel="stylesheet" href="../wadmin/style.css">

</head>
<body>
    
<div class="login">
    
    <form action="./" method="post">

        <p class="title">Login</p>

        <label for="login">Login:</label>
        <input type="text" name="login" id="login" placeholder="Login" required>

        <label for="password">Password:</label>
        <input type="password" name="password" id="password" placeholder="Password" required>

        <button type="submit">LOGIN</button>

    </form>

</div>

</body>
</html>