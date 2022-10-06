<?php
session_start();
require_once "db_module.php";
require_once "users_grant_module.php";
$link = NULL;
taoKetNoi($link);
if (isset($_POST['username']) && isset($_POST['password'])) {
    if (dangnhap($link, $_POST["username"], $_POST["password"]))
        header("Location: admin.php?module=user");
    else
        header("Location: login.php");
} else
    header("Location: login.php");
giaiPhongBoNho($link, true);

