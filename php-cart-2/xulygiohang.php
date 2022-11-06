<?php
session_start();
require_once "cart_trifarm.php";
if (isset($_POST['action'])) {
    switch ($_POST['action']) {
        case "Thêm Vào Giỏ Hàng":
            $hang = array("id" => $_POST['id'], "name" => $_POST['name'], "img" => $_POST['img'], "price" => $_POST['price'], "soluong" =>  $_POST['soluong']);
            themhangvaogio($hang);
            header("Location: cart.php" );
            break;
        case "Cập Nhật":
            capnhathangtronggio($_POST['id'], $_POST['soluong']);
            header("Location: cart.php");
            break;
        case "Xóa Hàng":
            xoahangkhoigio($_POST['id']);
            header("Location: cart.php");
            break;
        case "Xóa Hết Giỏ Hàng":
            header("Location: cart.php");
            xoahet();
            break;
        case "Trở Lại Danh Mục SP":
            header("Location: index.php");
            break;
        default:
        header("Location: cart.php");
            break;
    }
}
?>
