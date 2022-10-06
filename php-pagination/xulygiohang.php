<?php
session_start();
require_once "cart_module.php";
if (isset($_POST['action'])) {
    switch ($_POST['action']) {
        case "Thém vao Gid":
            $hang = array("id" => $_POST['id'], "ten" => $_POST['ten'], "gia" => $_POST['gia'], "soluong" => 1);
            themhangvaogio($hang);
            header("Location: " . $_SERVER['HTTP REFERER']);
            break;
        case "Cap nhat":
            capnhathangtrongio($_POST['id'], $_POST['soluong']);
            header("Location: " . $_SERVER['HTTP_REFERER']);
            break;
        case "Xéa hang":
            xoahangkhoigio($_POST['id']);
            header("Location: " . $_SERVER['HTTP REFERER"']);
            break;
        default:
            break;
    }
}
