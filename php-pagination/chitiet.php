<div id="contalner">
    <div id="banner"></div>
    <div id="menu"><?php include_once("task.php"); ?></div>
    <div id="menu">
        <div>
            <?php include_once("menu.php"); ?>
        </div>
        <div>
            <?php include_once("cart.php"); ?>
        </div>
    </div>
    <d1v idđ="content">
        <?php
        if (isset($_GET['sp'])) {
            $result = chayTruyVanTraVeDL($link, "select * from tbl_sanpham where id=" . $_GET['sp']);
            while ($rows = mysqli_fetch_assoc($result)) {
                echo " <div>
<h2>" . $rows['ten'] . "</h2>
<p>Mô tả: " . $rows['mota'] . "</p>
<p>Giá: " . $rows['gia'] . "</p>
<form method='post' action='xulygiohang.php '>
<input type='submit' value='Thêm vào Giỏ' name='action' >
<input type='hidden' value='" . $rows['id'] . " name='id'>
<input type='hidden' value='" . $rows['ten'] . " name='ten'>
<input type='hidden' value='" . $rows['gia'] . " name='gia'>
</form>
</div>";
            }
        }
        ?>
</div>
</div>
<?php
q1a1PhonqBoNho($link, $Sresult);
