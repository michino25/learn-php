<?php
require_once "config.php";
require_once "db_module.php";
$page = isset($_GET['page']) ? $_GET['page'] : 1;
$page = is_numeric($page) ? $page : 1;
$from = ($page - 1) * SO_SP_TREN_TRANG;
//NMác định cổng sẻ sản phẩm
if (isset($_GET['keyword']))
    $result = executeQuery("SELECT count(*) from tb_product where `name` like '%" . $_GET['keyword'] . "%'");
else
    $result = executeQuery("SELECT count(*) from tb_product");
$row = mysqli_fetch_row($result);
$total = ceil($row[0] / SO_SP_TREN_TRANG);
//Mặc định các sản chấm sẽ căn niễn thị cha trang hiện tại
if (isset($_GET['keyword']))
    $result = executeQuery("SELECT * from tb_product where `name` like '%" . $_GET['keyword'] . "%' limit " . $from . ", " . SO_SP_TREN_TRANG);
else
    $result = executeQuery("SELECT * from tb_product limit " . $from . ", " . SO_SP_TREN_TRANG);
while ($rows = mysqli_fetch_assoc($result)) {
    echo 
    "<a href='./detail.php?id_product=" . $rows['id'] . "' class='product'>
        <div class='product-wrap'>    
            <span style='font-weight: 700;'>" . $rows['name'] . "</span>
            <span>" . number_format((int) $rows['price'], 0, '', '.') . "đ</span>
        </div>
        <img src='" . $rows['img'] . "' width='100px' height='100px' style='object-fit: contain;'>
    </a>
    ";
}
echo "<br style='clear:both;' />";
echo "<div class='pager'>";
for ($i = 1; $i < $total; $i++)
    if ($i != $page)
        echo " <a href='?page=" . $i . (isset($_GET['keyword']) ? "&keyword=" . $_GET['keyword'] : "") . "'>$i</a> ";
    else
        echo "<span>$i</span>";
echo "</div>";
?>
<style>
    * {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

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

    .pager {
        padding: 8px;
        text-align: center;
        margin-left: 5px;
        word-spacing: 10px;
    }

    .pager a,
    .pager span {
        display: inline-block;
        margin-right: 5px;
        text-decoration: none;
        padding: 6px 8px;
        min-width: 20px;
        border-radius: 5px;
    }

    .pager a {
        color: gray;
    }

    .pager span {
        color: white;
        background: blue;
    }

    .pager a:hover {
        background-color: rgba(0, 128, 255, 0.1);
    }
</style>