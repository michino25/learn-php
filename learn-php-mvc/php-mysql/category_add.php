<?php require_once("db_module.php"); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Category Management</title>
</head>

<body>
    <div class="container">
        <div class="nav-side">
            <?php include_once "menu.php" ?>
        </div>

        <div class="content">
            <?php

            if (isset($_POST['categoryName'])) {
                $link = NULL;
                connect($link);
                $result = queryNoData($link, "INSERT INTO tb_category VALUES (NULL, '" . $_POST['categoryName'] . "' )");
                dispose($link, null);

                if ($result)
                    header("Location:./category_add.php?msg=done");
                else
                    header("Location:./category_add.php?msg=error");
            }

            ?>

            <?php
            if (isset($_GET['msg']))
                if ($_GET['msg'] == "done")
                    echo "<div>Thêm thành công</div>";
                else
                    echo "<div>Thêm thất bại</div>";
            ?>

            <form action="" method="post">
                <label for="category-name">Add New Category</label>
                <input type="text" class="form-control" id="category-name" name="categoryName" placeholder="Category Name" />
                <input type="submit" value="Add Category">
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