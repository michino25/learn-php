<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <?php
    include_once "../db_module.php";
    $link = null;
    connect($link);
    ?>

    <div class="container">
        <div class="nav-side">
            <?php include_once "menu.php" ?>
        </div>

        <div class="content">
            <div class="btn-wraper">
                <a href="./search.php" class="btn">Tìm kiếm</a>
                <a href="./category_add.php" class="btn">Thêm danh mục</a>
                <?php
                if (isset($_GET['category'])) {
                    echo "<a href='./category_modify.php?category=" . $_GET['category'] . "' class='btn'>Sửa danh mục</a>";
                    echo "<a href='./category_remove.php?category=" . $_GET['category'] . "' class='btn'>Xoá danh mục</a>";
                }
                ?>
                <a href="./product_add.php" class="btn">Thêm sản phẩm</a>
            </div>
            <?php include_once "content.php" ?>
        </div>

    </div>

    <?php dispose($link, $result); ?>

    <style>
        body {
            display: flex;
            /* align-items: center; */
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