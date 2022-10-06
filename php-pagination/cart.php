<h3>Giỏ hang</h3>

<?php
include_once("cart_module.php");
$giohang = isset($_SESSION['giohang']) ? $_SESSION['giohang'] : array();
echo "Cé <font color='yellow'>" . count($giohang) . "</font> san pham<br/>";
echo "néng <font color='yellow'>" . (isset($_SESSION['giohang']) ? tinhtien() : "0") . "</font> VND";
echo "<p><a href='./xemhang.php'>Xem Giỏ Hang</a></p>";
?>