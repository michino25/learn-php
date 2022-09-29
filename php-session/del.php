<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div>
        <a href="index.php">Xem session</a>
        <a href="make.php">Tạo session</a>
        <a href="del.php">Xoá session</a>
    </div>

    <?php
    if (isset($_SESSION['myName'])) {
        unset($_SESSION['myName']);
        echo "<span>Session của bạn đã xoá</span>";
    } else
        echo "<span>Session chưa khởi tạo</span>";
    ?>

</body>

</html>