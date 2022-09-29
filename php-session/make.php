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

    <form action="" method="post">
        <label for="name">Name</label>
        <input type="text" name="name" id="name" placeholder="Your Name">
        <input type="submit" value="Create Session">
    </form>

    <?php 
    if(isset($_POST['name'])){
        $_SESSION['myName'] = $_POST['name'];
        echo "<span>Tên của bạn đã lưu vào session</span>";
    };
    ?>
</body>

</html>