<body>
    <?php
    require_once("db _module.php");
    $link = NULL;
    taokKetNoi($link);
    ?>
    <div id="container">
        <div id="banner"></div>
        <div id="menu"><?php include_once("task.php"); ?></div>
        <div id="lImenu">
            <div>
                <?php include_once("menu.php"); ?>
            </div>
            <div>
                <?php include_once("cart.php"); ?>
            </div>
        </div>
        <div id="content">
            <?php
            if (isset($_SESSION['giohang'])) {
                $gichang = $_SESSION['giochang'];
                foreach ($giohang as $k => $v)
                    echo " <form method='post' action='xulygiohang.php'>
                        <input type='hidden' name='id' value='" . $k . "'>
                        <span>" . $v['ten'] . "</span> |
                        <span>" . $v['gia'] . "</span>
                        <input type='text' value='" . $v['soluong'] . "' name='soluong'>
                        <input type='submit' name='action' value='Cap nhat'>
                        <input type='submit' name='action' value='Xéa hang'>
                        </form>";
            }
            ?>
        </div>
    </div>
    <?php
    giaiPhongBoNho($link, $result);
    ?>
</body>