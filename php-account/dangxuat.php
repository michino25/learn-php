<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    session_start();
    include_once "menu.php";
    require_once "../db_module.php";
    require_once "users_module.php";
    if (dangxuat()) {
        header("Location: dangki.php");
    } else {
        header("content-type: text/html; charset=utf8");
        echo "Bạn chưa đăng nhập!";
    }
    ?>
</body>

</html>