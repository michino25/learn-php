<?php
function dangki($username, $password, $fullname, $email)
{
    executeNonQuery(
        "INSERT INTO tb_user VALUES( NULL,
        '" . stringSQL($username) . "',
        '" . md5($password) . "',
        '" . stringSQL($fullname) . "',
        '" . $email . "'
        )"
    );
}

function dangnhap($username, $password)
{
    $account = "";
    $result = executeQuery(
        "SELECT * FROM tb_user WHERE username='" . stringSQL($username) . "'
        and password='" . md5($password) . "'"
    );
    $row = mysqli_fetch_row($result);
    mysqli_free_result($result);

    if ($row != NULL) {
        $account = array(
            "id" => $row[0],
            "username" => $row[1],
            "fullname" => $row[3],
            "email" => $row[4]
        );
        $_SESSION['account'] = $account;
        return true;
    } else
        return false;
}

function dangxuat()
{
    if (isset($_SESSION['account'])) {
        unset($_SESSION['account']);
        return true;
    } else
        return false;
}
