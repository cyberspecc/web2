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
                <h1>Login!</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <form action="login.php" method="POST">
                    <div class="row form_reg"><input type="text" class="form" name="login" placeholder="Login"></div>
                    <div class="row form_reg"><input type="password" class="form" name="password" placeholder="Password"></div>
                    <button type="submit" class="btn_reg" name="submit">Login</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>

<?php
require_once "db.php";

if (isset($_COOKIE['User'])){
    header('Location: profile.php');
}
$link = mysqli_connect("127.0.0.1","root","root","web2");

if (isset($_POST["submit"])) {
    $password = $_POST["password"];
    $login = $_POST["login"];

    if (!$password || !$login) {
        die ("Please enter correct data!");
    }
    $sql = "select * from users where username='$login' and password='$password'";
    $result = mysqli_query($link, $sql);
    
    if (mysqli_num_rows($result) == 1) {
        setcookie("User", $login, time() + 7200);
        header("Location: profile.php");
    } else {
        echo "Invalid login or password!";
    }
}

?>