<h3>Giỏ hàng</h3>

<?php
include_once("cart_trifarm.php");
session_start();
$giohang = isset($_SESSION['giohang']) ? $_SESSION['giohang'] : array();
echo "Có <font color='gray'>" . count($giohang) . "</font> san pham<br/>";
echo "Tổng <font color='gray'>" . (isset($_SESSION['giohang']) ? tinhtien() : "0") . "</font> VND";
echo "<p><a href='./xemhang.php'>Xem Giỏ Hàng</a></p>";
echo "<p><a href='./index.php'>Trở Lại Danh Mục SP</a></p>";
?>