<?php

if (isset($_GET['category']))
    $result = queryData($link, "select * from tb_category where id = " . $_GET['category']);
else
    $result = queryData($link, "select * from tb_category");

while ($rows = mysqli_fetch_assoc($result)) {
    echo "
            <div class='category'>
                <h1>" . $rows['name'] . "</h1>";
    $result2 = executeQuery(
        "select * from tb_product where id_category=" . $rows['id']
    );
    while ($rows2 = mysqli_fetch_assoc($result2)) {
        echo "
            <a href='./detail.php?id_product=" . $rows2['id'] . "' class='product'>
                <div class='product-wrap'>    
                    <span style='font-weight: 700;'>" . $rows2['name'] . "</span>
                    <span>" . number_format((int) $rows2['price'], 0, '', '.') . "đ</span>
                </div>
                <img src='" . $rows2['img'] . "' width='100px' height='100px' style='object-fit: contain;'>
            </a>
            ";
    }
    echo "</div>";
}
?>
<style>
    .product {
        display: flex;
        text-decoration: none;
        color: black;
    }

    .product:hover {
        background: rgba(0, 0, 0, 0.05);
        
    }

    .product-wrap {
        display: flex;
        width: 350px;
        flex-direction: column;
        justify-content: center;
    }
</style>