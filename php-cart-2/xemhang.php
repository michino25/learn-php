<body>
    <?php
    require_once("db_trifarm.php");
    ?>
    <div id="container">
        <div id="banner"></div>
        <div id="limenu">
            <div>
                <?php include_once("cart.php"); ?>
                <?php
            if (isset($_SESSION['giohang'])) {
                $giohang = $_SESSION['giohang'];
                foreach ($giohang as $k => $v)
                    echo " 
                        <form method='post' action='xulygiohang.php'>
                        <input type='hidden' name='id' value='" . $k . "'>
                        <span>" . $v['name'] . "</span> 
                        <img class='product-img' src='" . $v['img'] . "'/>
                        <span>Giá: "  . number_format((int) $v['price'], 0, '', '.') . "VNĐ</span>
                        <input type='number' value='" . $v['soluong'] . "' name='soluong' min='1'>
                        <input type='submit' name='action' value='Cập Nhật'>
                        <input type='submit' name='action' value='Xóa Hàng'>
                        </form>";
                        echo "
                        <form method='post' action='xulygiohang.php'>
                        <input type='submit' name='action' value='Xóa Hết Giỏ Hàng'>
                        <input type='submit' name='action' value='Trở Lại Danh Mục SP'>
                        </form>";
            }
            ?>
            </div>
        </div>  
        </div>
    </div>
</body>