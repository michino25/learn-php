<?php

if (isset($_GET['id_dm']))
    $result = executeQuery("select * from tb_category where id = " . $_GET['id_dm']);
else
    $result = executeQuery("select * from tb_category");

while ($rows = mysqli_fetch_assoc($result)) {
    echo "<div class='id_dm'>
            <h1>" . $rows['name'] . "</h1>";

    $result2 = executeQuery("select * from tb_product where id_category=" . $rows['id']);
    while ($rows2 = mysqli_fetch_assoc($result2)) {
        echo
        "<a href='./detail.php?id_sp=" . $rows2['id'] . "' class='product'>
            <div class='product-wrap'>    
                <span style='font-weight: 700;'>" . $rows2['name'] . "</span>
                <span class='product-desc'>" . $rows2['desc'] . "</span>
                <span>" . number_format((int) $rows2['price'], 0, '', '.') . "VND</span>
            </div>
            <img src='" . $rows2['img'] . "' width='100px' height='100px' style='object-fit: contain;'>
        </a>";
    }
    echo "</div>";
}
?>
<style>
    .product {
        text-decoration: none;
        color: black;
        display: flex;
        justify-content: center;
        align-items: center;
        padding: 16px 12px;
    }

    .product:hover {
        background: rgba(0, 0, 0, 0.05);

    }

    .product-wrap {
        display: flex;
        width: 90%;
        flex-direction: column;
        justify-content: center;
    }

    .product-desc {
        margin: 8px 0;
        /* giới hạn 3 dòng */
        display: block;
        overflow: hidden;
        line-height: 1.4rem;
        height: calc(1.4rem*3);
        display: -webkit-box;
        -webkit-box-orient: vertical;
        -webkit-line-clamp: 3;
    }
</style>