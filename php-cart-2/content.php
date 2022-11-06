<?php

if (isset($_GET['id_dm']))
    $result = executeQuery("select * from tb_category where id = " . $_GET['id_dm']);
else
    $result = executeQuery("select * from tb_category");

while ($rows = mysqli_fetch_assoc($result)) {
    echo "
            <div class='id_dm'>
                <h1>" . $rows['name'] . "</h1>";
    $result2 = executeQuery(
        "select * from tb_product where id_category=" . $rows['id']
    );
    while ($rows2 = mysqli_fetch_assoc($result2)) {
        echo
        " 
        <a href='./detail.php?id_sp=" . $rows2['id'] . "' class='product'>
        <div class='product-wrap'>    
            <span style='font-weight: 700;'>" . $rows2['name'] . "</span>
            <span>Mô tả: " . $rows2['desc'] . "</span></br>
            <span>" . number_format((int) $rows2['price'], 0, '', '.') . "VND</span>
        </div>
        <img src='" . $rows2['img'] . "' width='100px' height='100px' style='object-fit: contain;'>
    </a>
        <form action='xulygiohang.php' method='post'>
        <input type='number' name='soluong' min='1' value='1'>
        <input type='submit' name='action' value='Thêm Vào Giỏ Hàng'>
        <input type='hidden' value='" . $rows2['id'] . "' name='id'>
        <input type='hidden' value='" . $rows2['name'] . "' name='name'>
        <input type='hidden' value='" . $rows2['img'] . "' name='img'>
        <input type='hidden' value='" . $rows2['price'] . "' name='price'>
        </form> 
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