<body>
    <?php
    require_once("db_module.php");
    session_start();
    ?>
    <div id="container">
        <div id="limenu">
            <div>
                <?php
                if (isset($_SESSION['giohang'])) {
                    $giohang = $_SESSION['giohang'];
                    echo "
                    <form method='post' action='cartController.php'>
                        <input type='submit' name='action' value='Trang chủ'>
                        <input type='submit' name='action' value='Xóa Hết Giỏ Hàng'>
                    </form>";

                    foreach ($giohang as $k => $v)
                        echo "
                        <form method='post' action='cartController.php'>
                            <input type='hidden' name='id' value='" . $k . "'>
                            <span>" . $v['name'] . "</span> 
                            <img class='product-img' src='" . $v['img'] . "'/>
                            <span>Giá: "  . number_format((int) $v['price'], 0, '', '.') . "VNĐ</span>
                            <input type='number' value='" . $v['soluong'] . "' name='soluong' min='1'>
                            <input type='submit' name='action' value='Cập Nhật'>
                            <input type='submit' name='action' value='Xóa Hàng'>
                        </form>";
                }
                ?>
            </div>
        </div>
    </div>

    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .product-img {
            width: 96px;
            height: 96px;
        }
    </style>
</body>