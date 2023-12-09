<?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (isset($_POST['postText'])) {
            $postText = $_POST['postText'];
            $username = $_COOKIE['username'];
            $postsDirectory = 'posts/'.$username;
            $postsFiles = glob($postsDirectory.'/*.txt');
            $postCount = count($postsFiles)+1;
            $postName = $postsDirectory.'/'.$postCount.'.txt';
            $fileOpened = fopen($postName, "w");
            fwrite($fileOpened, $postText);
            fclose($fileOpened);
            header('Location: main.php');
        }
    }
?>