<?php require_once("db_trifarm.php"); ?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail</title>
</head>

<body>
    <div class="container">
        <div class="nav-side">
            <?php include_once "menu.php" ?>
        </div>

        <div class="content">
            <?php
            if (isset($_GET['id_sp'])) {
                $result = executeQuery("select * from tb_product where id=" . $_GET['id_sp']);
                while ($rows = mysqli_fetch_assoc($result)) {
                    echo "
                    <div class='product'>
                        <img class='product-img' src='" . $rows['img'] . "'/>
                        <div class='product-info'>
                            <h2>" . $rows['name'] . "</h2> 
                            <p>Giá:" . number_format((int) $rows['price'], 0, '', '.') . "VNĐ</p>
                            <p>Mô tả: " . $rows['desc'] . "</p>
                            <form method='post' action='xulygiohang.php'>
                            <input type='number' name='soluong' min='1' value='1'>
                            <input type='submit' name='action' value='Thêm Vào Giỏ Hàng'>
                            <input type='hidden' name='id' value='" . $rows['id'] . " '>
                            <input type='hidden' name='img' value='" . $rows['img'] . " '>
                            <input type='hidden' name='name' value='" . $rows['name'] . "'>
                            <input type='hidden' name='price' value='" .  $rows['price'] . " '>    
                            </form> 
                        </div>
                    </div>
                    ";
                }
            }

            ?>
        </div>
    </div>

    <style>
        body {
            display: flex;
            justify-content: center;
        }

        .container {
            width: 100%;
            max-width: 1200px;
            display: flex;
        }

        .nav-side {
            width: 20%;
        }

        .content {
            flex: 1;
            display: flex;
            flex-direction: column;
        }

        .product {
            display: flex;

        }

        .product-img {
            width: 500px;
            height: 500px;
        }

        .product-info {
            display: flex;
            flex-direction: column;
        }

        .btn-wraper {
            display: flex;
        }

        .btn {
            margin-right: 32px;
            display: block;
            text-decoration: none;
            padding: 12px 16px;
            color: white;
            background-color: rgb(66, 133, 244);
        }
    </style>
</body>

</html>