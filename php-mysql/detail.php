<?php require_once("../db_module.php"); ?>

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
            if (isset($_GET['id_product'])) {
                $result = executeQuery("select * from tb_product where id=" . $_GET['id_product']);
                while ($rows = mysqli_fetch_assoc($result)) {
                    echo "
                    <div class='product'>
                        <img class='product-img' src='" . $rows['img'] . "'/>
                        <div class='product-info'>
                            <h2>" . $rows['name'] . "</h2>
                            <p>" . number_format((int) $rows['price'], 0, '', '.') . "đ</p>
                            <p>" . $rows['desc'] . "</p>
                        </div>
                    </div>
                    ";
                }
            }

            echo "<div class='btn-wraper'>
                    <a href='./product_modify.php?id_product=" . $_GET['id_product'] . "' class='btn'>Sửa sản phẩm</a>
                    <a href='./product_remove.php?id_product=" . $_GET['id_product'] . "' class='btn'>Xoá sản phẩm</a>
                </div>";
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