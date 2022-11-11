<?php
session_start();
require_once "_modelCart.php";

if (isset($_POST['action'])) {
    switch ($_POST['action']) {

        case "Thêm Vào Giỏ":
            $hang = array("id" => $_POST['id'], "name" => $_POST['name'], "img" => $_POST['img'], "price" => $_POST['price'], "soluong" =>  $_POST['soluong']);
            add($hang);
            header("Location: cartView.php");
            break;

        case "Cập Nhật":
            update($_POST['id'], $_POST['soluong']);
            header("Location: cartView.php");
            break;

        case "Xóa":
            remove($_POST['id']);
            header("Location: cartView.php");
            break;

        case "Xóa Hết Giỏ Hàng":
            delete("Location: cartView.php");
            xoahet();
            break;

        default:
            header("Location: index.php");
            break;
    }
}
