<?php
if (isset($_GET['module'])) {
    switch ($_SESSION['quyen']) {
        case "admin":
            if ($_GET['module'] == 'admin')
                include_once "admin_only.php";
            elseif ($_GET['module'] == 'mod')
                include_once "mod_only.php";
            else
                include_once "user_only.php";
            break;
        case "mod":
            if ($_GET['module'] == 'mod')
                include_once "mod_only.php";
            else
                include_once "user_only.php";
            break;
        case "user":
            if ($_GET['module'] == 'user')
                include_once "user_only.php";
            break;
        default:
            break;
    }
}
