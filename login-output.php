<html>
    <head>
        <meta charset="utf-8">
        <title>ログイン</title>
        <link rel="stylesheet" href="stylesheet.css">
    </head>
    <body>
        <?php
        unset($_SESSION['user']);
        $pdo = new PDO ('mysql:host=localhost;dbname=login_db;charset=utf8;', 'admin', 'password');
        $sql=$pdo->prepare('select * from login where username=? and password=?');
        if ($sql->execute([$_REQUEST['username'], $_REQUEST['password']])) {
            foreach ($sql as $row) {
                $_SESSION['user']=[
                    'username'=>$row['username'],
                    'password'=>$row['password']
                ];
            }
        }
        if (isset($_SESSION['user'])) {
            echo 'ログインしました';
        } else {
            echo 'ユーザー名またはパスワードが違います';
        }
        ?>
    </body>
</html>