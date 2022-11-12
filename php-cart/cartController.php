<?php
require_once "_modelCart.php";

if (isset($_POST['action'])) {
    switch ($_POST['action']) {

        case "Thêm Vào Giỏ":
            add($_POST['id'], $_POST['quantity']);
            header("Location: cartView.php");
            break;

        case "Cập Nhật":
            if ($_POST['quantity'] != 0)
                update($_POST['id'], $_POST['quantity']);
            else
                remove($_POST['id']);

            header("Location: cartView.php");
            break;

        case "Xóa":
            remove($_POST['id']);
            header("Location: cartView.php");
            break;

        default:
            header("Location: index.php");
            break;
    }
} else
    header("Location: index.php");
