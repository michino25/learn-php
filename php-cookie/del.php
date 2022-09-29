<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div>
        <a href="index.php">Xem cookie</a>
        <a href="make.php">Tạo cookie</a>
        <a href="del.php">Xoá cookie</a>
    </div>

    <?php
    if (isset($_COOKIE['myName'])) {
        setcookie('myName', '', time() - 1); // đặt thời gian trong quá khứ để huỷ cookie
        echo "<span>Cookie của bạn đã xoá</span>";
    } else
        echo "<span>Cookie chưa khởi tạo</span>";
    ?>

</body>

</html>