<?php
session_start();
require_once "_modelCart.php";

if (isset($_POST['action'])) {
    switch ($_POST['action']) {

        case "Thêm Vào Giỏ Hàng":
            $hang = array("id" => $_POST['id'], "name" => $_POST['name'], "img" => $_POST['img'], "price" => $_POST['price'], "soluong" =>  $_POST['soluong']);
            themhangvaogio($hang);
            header("Location: cartView.php");
            break;

        case "Cập Nhật":
            capnhathangtronggio($_POST['id'], $_POST['soluong']);
            header("Location: cartView.php");
            break;

        case "Xóa Hàng":
            xoahangkhoigio($_POST['id']);
            header("Location: cartView.php");
            break;

        case "Xóa Hết Giỏ Hàng":
            header("Location: cartView.php");
            xoahet();
            break;

        default:
            header("Location: index.php");
            break;
    }
}
