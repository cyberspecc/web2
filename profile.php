<?php
    if (!isset($_COOKIE['User'])){
        header('Location: /');
    }
?>
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
            <div class="col-3 bar-logo"></div>
            <div class="col-9 bar-text">
                Hello, <?php echo $_COOKIE['User']; ?>!
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-8">
                <h2>
                    My first site! Spacibo za podderjzku!<br>
                    Внезапный стук в дверь — и вот уже тетрадь летит под стол. Главное, чтобы никто не увидел, чем она занимается, не подсмотрел сокровенные записи! Дневники пишут вовсе не для того, чтобы их кто-то прочел. Или же как раз для этого? Что вообще заставляет человека браться за перо и фиксировать события своей жизни в каждодневных записях?
                </h2>
            </div>
            <div class="col-4">
                <div class="row  my-photo"></div>
                <div class="row title-photo">
                    <p>Nice CAT!</p>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="button_js col-12">
                <button class="button" id="myButton">Click me</button>
                <p id="demo"></p>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <form class="form_align" action="profile.php" method="POST" enctype="multipart/form-data">
                    <input type="text" class="form form_width" name="title" placeholder="Titlt of the post"><br>
                    <textarea name="text" class="form_width" cols="30" rows="10" placeholder="Post text"></textarea><br>
                    <input type="file" name="file" class="padding_10" /><br>
                    <button type="submit" class="button" name="submit" >Save post!</button>
                </form>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="js/button.js"></script>
</body>


</html>

<?php
$link = mysqli_connect("127.0.0.1","root","root","web2");
if (isset($_POST['submit'])){
    $title = $_POST['title'];
    $text = $_POST['text'];
    if (!$title || !$text) die ("Enter all data!");
    $sql = "insert into posts (title, main_text) values ('$title', '$text')";
    if(!mysqli_query($link, $sql)) die ("Error via adding post!");

    if(!empty($_FILES["file"]))
    {
        if (((@$_FILES["file"]["type"] == "image/gif") || (@$_FILES["file"]["type"] == "image/jpeg") || (@$_FILES["file"]["type"] == "image/jpg") 
        || (@$_FILES["file"]["type"] == "image/pjpeg") || (@$_FILES["file"]["type"] == "image/x-png") || (@$_FILES["file"]["type"] == "image/png")) &&
        (@$_FILES["file"]["size"] < 102400))
        {
            move_uploaded_file($_FILES["file"]["tmp_name"], "uploads/" . $_FILES["file"]["name"]);
            echo "Load in: uploads/" . $_FILES["file"]["name"];
        }
        else {
            echo "Upload failed!";
        }
    }
    else {
        echo "Nothing to upload";
    }

}