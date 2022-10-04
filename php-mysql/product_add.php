<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Category Management</title>
</head>

<body>
    <?php

    require_once("db_module.php");

    if (
        isset($_POST['id_category'])
        && isset($_POST['productName'])
        && isset($_POST['productDesc'])
        && isset($_POST['productLink'])
        && isset($_POST['productPrice'])
    ) {
        $result = executeNonQuery("INSERT INTO tb_product VALUES (
        NULL,
        '" . $_POST['productName'] . "',
        '" . $_POST['productLink'] . "',
        '" . $_POST['productDesc'] . "',
        '" . $_POST['productPrice'] . "',
        '" . $_POST['id_category'] . "'
        )");

        if ($result)
            header("Location:./product_add.php?msg=done");
        else
            header("Location:./product_add.php?msg=error");
    }

    if (isset($_GET['msg']))
        if ($_GET['msg'] == "done")
            echo "<div>Thêm sản phẩm thành công</div>";
        else
            echo "<div>Thêm sản phẩm thất bại</div>";
    ?>

    <form action="" method="POST">
        <label for="product-name">Product Category</label>
        <select name="id_category">
            <?php

            $result = executeQuery("select * from tb_category");
            while ($rows = mysqli_fetch_object($result)) {
                $id = $rows->id;
                $name = $rows->name;
                echo "<option value='$id'>$name</option>";
            }
            ?>
        </select>

        <label for="product-name">Product Name</label>
        <input type="text" class="form-control" id="product-name" name="productName" placeholder="Product Name" />

        <label for="product-desc">Product Description</label>
        <input type="text" class="form-control" id="product-desc" name="productDesc" placeholder="Product Desc" />

        <label for="product-link">Product Image Link</label>
        <input type="text" class="form-control" id="product-link" name="productLink" placeholder="Product Image Link" />

        <label for="product-price">Product Price</label>
        <input type="text" class="form-control" id="product-price" name="productPrice" placeholder="Product Price" />

        <input type="submit" value="Add Product">
    </form>
</body>

</html>