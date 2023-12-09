<?php
    if(!isset($_COOKIE['username'])) {
        header('Location: loginPage.php');
    }
    else {
        $username = $_COOKIE['username'];
    }

    $postsDirectory = 'posts/'.$username;
    $postsFiles = glob($postsDirectory.'/*.txt');
    rsort($postsFiles);
    $postCount = count($postsFiles);
?>

<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Блог</title>
    <link rel="stylesheet" href="stylesMain.css">
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
        <form action=postAdd.php method=post>
             <input type=submit value=+ id=postAddButton>
        </form>
    </div>
    <?php
        if ($postCount===0) {
            echo "<h3 id=postNone> У вас немає жодної публікації!</h3>";
        }
        foreach ($postsFiles as $postsFiles) {
            $fileDate = date("d.m.Y H:i:s", filemtime($postsFiles));
            $content = file_get_contents($postsFiles);
            $contentwbreaks = nl2br($content);
            echo "<div id=post>";
            echo "<h3 id=fileDate>$fileDate</h3> <br>";
            echo "$contentwbreaks"; 
            echo "</div>";
        }
    ?>
    <div id="logoutBlock">
        <a href="logoutProcess.php">Вийти</a>
    </div>
</body>
</html>