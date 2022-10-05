<?php
session_start();
require_once "db_module.php";
require_once "users_module.php";

if (isset($_POST['username']) && isset($_POST['password'])) {
    if (dangnhap($_POST["username"], $_POST["password"])) {
        header("Location: admin.php");
    } else {
        header("Location: dangnhap.php?msg=login-fail");
    }
} else {
    header("Location: dangnhap.php");
}
