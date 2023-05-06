<?php
session_start();
require_once "../db_module.php";
require_once "validate_module.php";
require_once "users_module.php";

if (
    isset($_POST['username'])
    && isset($_POST['password'])
    && isset($_POST['password2'])
    && isset($_POST['fullname'])
    && isset($_POST['email'])
    && isset($_POST['captcha'])
) {
    if (
        $_POST['password'] == $_POST['password2'] //Kiểm tra 2 ô mật khẩu có giống nhau
        && validateLenUP($_POST['username']) //username phải lớn hơn 8 và nhỏ hơn 30 kí tự
        && validateLenUP($_POST['password']) //password phải lớn hơn 8 và nhỏ hơn 30 kí tự
        && validateLenUP($_POST['fullname']) //fullname phải lớn hơn 8 và nhỏ hơn 30 kí tự
        && validateEmail($_POST['email']) //email phải đúng định dạng abc@xyz.com
        // && (($_SESSION['captcha_text'] == $_POST['captcha'])) //captcha nhập đúng
    ) {
        //nếu username đã tồn tại trong CSDL
        if (existsUsername($_POST["username"])) {
            header("Location: dangki.php?msg=duplicate&username=" . $_POST['username'] . "&fullname=" . $_POST['fullname'] . "&email=" . $_POST['email']);
        } else {
            //nếu username chưa tồn tại thì cho đăng kí
            dangki($_POST["username"], $_POST["password"], $_POST["fullname"], $_POST["email"]);
            header("Location: dangki.php?msg=done");
        }
    } else {
        //nếu các điều kiện không thoả mãn
        header("Location: dangki.php?msg=unvalid-data&username=" . $_POST['username'] . "&fullname=" . $_POST['fullname'] . "&email=" . $_POST['email']);
    }
}
