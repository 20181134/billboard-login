<html>
    <head>
        <meta charset="utf-8">
        <title>ログアウト</title>
        <link rel="stylesheet" href="stylesheet.css">
    </head>
    <body>
        <?php
        session_start();
        unset($_SESSION['user']);
        if (!isset($_SESSION['user'])) {
            echo 'ログアウトしました';
        } else {
            echo '既にログアウトしています';
        }
        ?>
    <a href="billboard-9.php">戻る</a>
    </body>
</html>