<?php
    $connection = new PDO('mysql:host=localhost; dbname=new_forum; charset=utf8', 'root', '');

    if($_POST['username']) {
        $newUser = $_POST['username'];
        $newComment = $_POST['comment'];
        $date = date('Y-m-d H:i:s');

        $connection->query("INSERT INTO comments (`username`, `comment`, `date`) VALUES ('$newUser', '$newComment', '$date')");

        header('Location: index.php');
    }
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

<style>
    * {
        -webkit-box-sizing: border-box;
        -moz-box-sizing: border-box;
        box-sizing: border-box;
    }
    body {
        font-family: 'Arial', sans-serif;
    }
    input {
        display: block;
        margin: 5px;
        font-size: 25px;
        width: 300px;
    }
</style>

<form action="" method="post">
    <h3>Оставьте комментарий</h3>
    <input type="text" name="username" required placeholder="Ваше имя">
    <input type="text" name="comment" required placeholder="Ваш комментарий">
    <input type="submit">
</form>

<hr>

<div class="forum">
    <h2>Форум</h2>

    <?
    $allComments = $connection->query("SELECT * FROM comments ORDER BY id DESC");
    foreach ($allComments as $comment) {
    ?>
    <p><? echo "- {$comment['date']} {$comment['username']} оставил(а) комментарий '{$comment['comment']}'"?></p>
    <? } ?>
</div>

</body>
</html>
