<body>
    <?php
    require_once("db_module.php");
    ?>
    <div id="container">
        <div id="banner"></div>
        <div id="limenu">
            <div>
                <?php include_once("cart.php"); ?>
            </div>
        </div>
        <div id="content">
            <?php
            if (isset($_SESSION['giohang'])) {
                $giohang = $_SESSION['giohang'];
                foreach ($giohang as $k => $v)
                    echo " <form method='post' action='xulygiohang.php'>
                        <input type='hidden' name='id' value='" . $k . "'>
                        <span>" . $v['ten'] . "</span> |
                        <span>" . $v['gia'] . "</span>
                        <input type='text' value='" . $v['soluong'] . "' name='soluong'>
                        <input type='submit' name='action' value='Cập nhật'>
                        <input type='submit' name='action' value='Xoá hàng'>
                        </form>";
            }
            ?>
        </div>
    </div>
</body>