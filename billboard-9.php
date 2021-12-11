<html>
    <head>
        <meta charset="utf-8">
        <title>掲示板</title>
        <link rel="stylesheet" href="stylesheet.css">
    </head>
    <body>
        <?php
        session_start();
        // ログイン機能
        if (!isset($_SESSION['user'])) {
            echo '<a href="./login">ログイン</a>';
        } else {
            echo $_SESSION['user']['username'];
        }
        ?>
        <hr>
        <h1>掲示板</h1>
        <form action="" method="post">
            <?php
            if (!isset($_SESSION['user'])) {
                echo 'ユーザー名: <input type="text" name="name">';
            } else {
                echo 'ユーザー名: ', $_SESSION['user']['username'];
            }
            ?>
            本文: <textarea name="contents"></textarea>
        </form>
        <?php
        $file="board.json";
        if (file_exists($file)) {
            $board=json_decode(file_get_contents($file));
        }
        // ログインしていない時
        if (!isset($_SESSION['user'])) {
            if (!strlen($_REQUEST['name']) or !strlen($_REQUEST['contents'])) {
                foreach ($board as $printer) {
                    echo '<p>', $printer, '</p><br>';
                }
            } else {
                $board[]=$_REQUEST['name'].': '.$_REQUEST['contents'];
                file_put_contents($file, json_decode($board));
                foreach ($board as $printer) {
                    echo '<p>', $printer, '</p><br>';
                }
            }
        } else {
            //ログインしている時
            if (!strlen($_REQUEST['contents'])) {
                foreach ($board as $printer) {
                    echo '<p>', $printer, '</p><br>';
                }
            } else {
                $board[]=$_SESSION['user']['username'].': '.$_REQUEST['contents'];
                file_put_contents($file, json_decode($board));
                foreach ($board as $printer) {
                    echo '<p>', $printer, '</p><br>';
                }
            }
        }
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            header('Location:./billboard-9.php');
        }
        ?>
    </body>
</html>