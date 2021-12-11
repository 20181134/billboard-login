<html>
    <head>
        <meta charset="utf-8">
        <title>ログイン</title>
        <link rel="stylesheet" href="stylesheet.css">
    </head>
    <body>
        <?php
        session_start();
        unset($_SESSION['user']);
        $pdo = new PDO ('mysql:host=localhost;dbname=login_db;charset=utf8;', 'admin', 'password');
        $sql=$pdo->prepare('select * from login_list where username=? and password=?');
        if ($sql->execute([$_REQUEST['username'], $_REQUEST['password']])) {
            foreach ($sql as $row) {
                $_SESSION['user']=[
                    'username'=>$row['username'],
                    'password'=>$row['password']
                ];
            }
        }
        if (isset($_SESSION['user'])) {
            echo $_SESSION['user']['username'], 'としてログインしました';
        } else {
            echo 'ユーザー名またはパスワードが違います';
        }
        echo '<br><a href="./billboard-9.php">戻る</a>';
        ?>
    </body>
</html>