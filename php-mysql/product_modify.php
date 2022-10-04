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
            $result = executeQuery("select * from tb_product where id=" . $_GET['id_product']);
            $row = mysqli_fetch_row($result);

            if (
                isset($_POST['productId'])
                && isset($_POST['productName'])
                && isset($_POST['productLink'])
                && isset($_POST['productDesc'])
                && isset($_POST['productPrice'])
                && isset($_POST['id_category'])
            ) {
                $id = $_POST['productId'];
                $name = $_POST['productName'];
                $link = $_POST['productLink'];
                $desc = $_POST['productDesc'];
                $price = $_POST['productPrice'];
                $id_cate = $_POST['id_category'];
                $query = "UPDATE `tb_product` SET `name`='$name', `img`='$link', `desc`='$desc', `price`='$price', `id_category`='$id_cate' WHERE `tb_product`.`id`='$id'";

                if (executeNonQuery($query))
                    echo "<div>Product updated successfully</div>";
                else
                    echo "<div>Something went wrong</div>";
            }
            ?>

            <form action="" method="POST">
                <label for="product-name">Product Category</label>
                <select name="id_category">
                    <?php

                    $result = executeQuery("select * from tb_category");
                    while ($row_category = mysqli_fetch_object($result)) {
                        $id = $row_category->id;
                        $name = $row_category->name;
                        if ($id == $row[5])
                            echo "<option value='$id' selected>$name</option>";
                        else
                            echo "<option value='$id'>$name</option>";
                    }
                    ?>
                </select>

                <input type="hidden" class="form-control" name="productId" value="<?php echo $row[0] ?>" />

                <label for="product-name">Product Name</label>
                <input type="text" class="form-control" id="product-name" name="productName" placeholder="Product Name" value="<?php echo $row[1] ?>" />

                <label for="product-desc">Product Description</label>
                <input type="text" class="form-control" id="product-desc" name="productDesc" placeholder="Product Desc" value="<?php echo $row[3] ?>" />

                <label for="product-link">Product Image Link</label>
                <input type="text" class="form-control" id="product-link" name="productLink" placeholder="Product Image Link" value="<?php echo $row[2] ?>" />

                <label for="product-price">Product Price</label>
                <input type="text" class="form-control" id="product-price" name="productPrice" placeholder="Product Price" value="<?php echo $row[4] ?>" />

                <input type="submit" value="Save">
            </form>
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
        }
    </style>
</body>

</html>