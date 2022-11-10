<?php require_once("db_module.php"); ?>

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
                            <p>Giá: " . number_format((int) $rows['price'], 0, '', '.') . "VNĐ</p>
                            <p>" . $rows['desc'] . "</p>

                            <form class='add-product-form' method='post' action='cartController.php'>
                                <input type='number' name='soluong' min='1' value='1'>
                                <input type='submit' name='action' value='Thêm Vào Giỏ Hàng'>

                                <input type='hidden' name='id' value='" . $rows['id'] . "'>
                                <input type='hidden' name='img' value='" . $rows['img'] . "'>
                                <input type='hidden' name='name' value='" . $rows['name'] . "'>
                                <input type='hidden' name='price' value='" .  $rows['price'] . "'>    
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
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
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
            width: 400px;
            height: 400px;
        }

        .product-info {
            display: flex;
            flex-direction: column;
        }

        .product-info p {
            margin: 4px 0;
        }

        .add-product-form {
            margin-top: 36px;
        }

        .add-product-form input {
            height: 36px;
            border-radius: 12px;
        }

        .add-product-form input[type=number] {
            margin-right: 16px;
            width: 80px;
            border: 1px solid #ccc;
            padding: 0 12px;
        }

        .add-product-form input[type=number]:focus {
            outline: none;
        }

        .add-product-form input[type=submit] {
            padding: 0 20px;
            background-color: blue;
            color: white;
            border: none;
        }

        .add-product-form input[type=submit]:hover {
            background-color: rgba(0, 0, 255, 0.8);
        }
    </style>
</body>

</html>