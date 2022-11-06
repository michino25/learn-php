<div id="container">
    <div id="banner"></div>
    <div id="lmenu">
        <div>
            <?php include_once("content.php"); ?>
        </div>
        <div>
            <?php include_once("cart.php"); ?>
        </div>
    </div>
    <div id="content">
        <?php
        if (isset($_GET['sp'])) {
            $result = chayTruyVanTraVeDL($link, "SELECT * from tb_sanpham where id=" . $_GET['sp']);
            while ($rows = mysqli_fetch_assoc($result)) {
                echo " <div>
                <h2>" . $rows['name'] . "</h2>
                <p>Mô tả: " . $rows['desc'] . "</p>
                <p>Giá: " . $rows['price'] . "</p>
                <form method='post' action='xulygiohang.php'>
                <input type='number' name='soluong' min='1' value='1'>
                <input type='submit' name='action' value='Thêm Vào Giỏ Hàng'>
                <input type='hidden' name='id' value='" . $rows['id'] . " '>
                <input type='hidden' name='img' value='" . $rows['img'] . " '>
                <input type='hidden' name='name' value='" . $rows['name'] . "'>
                <input type='hidden' name='price' value='" . $rows['price'] . " '>    
                </form> 
                </div>";
            }
        }
        ?>
    </div>
</div>