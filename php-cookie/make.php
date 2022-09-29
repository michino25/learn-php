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

    <form action="" method="post">
        <label for="name">Name</label>
        <input type="text" name="name" id="name" placeholder="Your Name">
        <input type="submit" value="Create Cookie">
    </form>

    <?php
    if (isset($_POST['name'])) {
        setcookie('myName', $_POST['name'], time() + 3600); // cookie sống được 1 giờ thì bị huỷ
        echo "<span>Tên của bạn đã lưu vào cookie</span>";
    };
    ?>
</body>

</html>