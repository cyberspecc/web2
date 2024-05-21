<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Sharunov A.</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel=”stylesheet” href=”https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css” />
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1>Registration!</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <form action="registration.php" method="POST">
                    <div class="row form_reg"><input type="email" class="form" name="email" placeholder="Email"></div>
                    <div class="row form_reg"><input type="text" class="form" name="login" placeholder="Login"></div>
                    <div class="row form_reg"><input type="password" class="form" name="password" placeholder="Password"></div>
                    <button type="submit" class="btn_reg" name="submit">Register</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>

<?php
require_once "db.php";

if (isset($_COOKIE['User'])){
    header('Location: index.php');
}

$link = mysqli_connect("127.0.0.1","root","root","web2");

if (isset($_POST["submit"])) {
    $email = $_POST["email"];
    $password = $_POST["password"];
    $login = $_POST["login"];

    if (!$email || !$password || !$login) {
        die ("Please enter correct data!");
    }
    $sql = "insert into users (email, username, password) values ('$email', '$login', '$password')";
    if (!mysqli_query($link, $sql)) {
        echo "Can`t add user!";
    }else {
        header("Location: login.php");
    }
}

?>