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
    if (isset($_COOKIE['myName']))
        echo "<span>Tên của bạn từ cookie: " . $_COOKIE['myName'] . "</span>";
    else
        echo "<span>Cookie chưa khởi tạo</span>";

    // Cookie chỉ lưu được xâu kí tự
    // Muốn lưu data dùng hàm serialize & unserialize

    // $a = array("Nam", "Bình", "Minh");
    // setcookie("data", serialize($a), time() + 36000);
    // //lấy dữ liệu trở lại
    // $b = unserialize($_COOKIE["data"]);

    ?>

</body>

</html>