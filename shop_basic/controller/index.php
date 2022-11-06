<?php
session_start();
include "../model/thuvien.php";
include "../model/sanpham.php";

if (!isset($_SESSION['giohang'])) $_SESSION['giohang'] = [];
$logined = 0;
if (!isset($_SESSION['luottruycap'])) $_SESSION['luottruycap'] = 0;
else $_SESSION['luottruycap'] += 1;

if (isset($_COOKIE['user']) && isset($_COOKIE['pass'])) {
    echo "Cookie đã đăng ký là: " . $_COOKIE['user'] . " - " . $_COOKIE['pass'];
}

if (isset($_GET['delc']) && ($_GET['delc'] == 1)) {
    setcookie("user", "", time() - (86400 * 7));
    setcookie("pass", "", time() - (86400 * 7));
    echo "<br><font color='red'>Bạn đã xóa cookie</font>";
}

if (isset($_POST['login']) && ($_POST['login'])) {
    $user = $_POST['user'];
    $pass = $_POST['pass'];
    if (($user == "demo") && ($pass == "demo")) {
        $_SESSION['user'] = $user;
        $_SESSION['pass'] = $pass;
        $logined = 1;
        $msg = "<br><font color='blue'>Các bạn đăng nhập thành công</font>";
    } else {
        $logined = 0;
        $msg = "<br><font color='red'>Vui lòng đăng nhập</font>";
    }
    if (isset($_POST['ghinho']) && ($_POST['ghinho'])) {
        setcookie("user", $user, time() + (86400 * 7));
        setcookie("pass", $pass, time() + (86400 * 7));
        $msgcookie = "<br>Đã ghi nhận cookie!";
    }
}

?>
<?php include "../view/header.php"; ?>

<?php

//ds san pham moi nhap
$dssp = loadallproduct();

if (isset($_GET['act'])) {
    switch ($_GET['act']) {
        case 'cart':

            //làm rỗng giỏ hàng
            if (isset($_GET['delcart']) && ($_GET['delcart'] == 1))
                unset($_SESSION['giohang']);
            //xóa sp trong giỏ hàng
            if (isset($_GET['delid']) && ($_GET['delid'] >= 0)) {
                array_splice($_SESSION['giohang'], $_GET['delid'], 1);
            }
            //add cart
            //lấy dữ liệu từ form
            if (isset($_POST['addcart']) && ($_POST['addcart'])) {
                $hinh = $_POST['hinh'];
                $tensp = $_POST['tensp'];
                $gia = $_POST['gia'];
                $soluong = $_POST['soluong'];

                addcart($hinh, $tensp, $gia, $soluong);
            }
            //end: add cart

            include "../view/cart.php";
            break;
        case 'contact':
            include "../view/contact.php";
            break;
        case 'gopy':
            include "../view/gopy.php";
            break;
        case 'hoidap':
            include "../view/hoidap.php";
            break;

        default:
            include "../view/home.php";
            break;
    }
} else {
    include "../view/home.php";
}

?>


<?php include "../view/footer.php"; ?>