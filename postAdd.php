<?php
    if(!isset($_COOKIE['username'])) {
        header('Location: loginPage.php');
    }
    else {
        $username = $_COOKIE['username'];
    }
?>

<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add post</title>
    <link rel="stylesheet" href="stylesAddPost.css">
</head>
<body>
    <header>
        <h1 id="blogTitle" class="headerElement">Блог</h1>
        <h2 id="usernameBlock" class="headerElement">
            <?php
                echo("Вітаю, $username!");
            ?>
        </h2>
    </header>
    <div id=postAddBlock>
        <form action=postAddProcess.php method=post>
            <textarea name="postText" id="postText" cols="30" rows="10" autofocus required></textarea>
            <input type=submit value=Опублікувати id=postAddButton>
        </form>
    </div>
    <div id="cancelBlock">
        <a href="main.php">Скасувати</a>
    </div>
    </body>
</html>