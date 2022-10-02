<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    include_once "db_module.php";
    $link = null;
    taoKetNoi($link);

    $result = chayTruyVanTraVeDL($link, "select * from tb_category");
    while ($rows = mysqli_fetch_assoc($result)) {
        echo "
            <div class='category'>
                <h1>" . $rows['name'] . "</h1>";
        $result2 = chayTruyVanTraVeDL(
            $link,
            "select * from tb_product where id_category=" . $rows['id']
        );
        while ($rows2 = mysqli_fetch_assoc($result2)) {
            echo "
                    <div class='product'>
                        <span>Tên sản phẩm: " . $rows2['name'] . "</span>
                        <img src='" . $rows2['img'] . "' width='100px' height='100px' style='object-fit: contain;'>
                        <span>Giá: " . $rows2['price'] . "</span>
                    </div>
                    ";
        }
        echo "
            </div>
            ";
    }

    giaiPhongBoNho($link, $result);

    ?>
</body>

</html>