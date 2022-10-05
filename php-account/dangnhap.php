<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php require_once "menu.php"; ?>
    <form action="xulydangnhap.php" method="POST">
        <h3 class="heading">Đăng nhập</h3>
        <div class="frm_row">
            <div class="cls_caption">Tên tài khoản:</div>
            <div class="cls_input">
                <input type="text" name="username" />
            </div>
        </div><br style="clear:both;" />
        <div class="frm_row">
            <div class="cls_caption">Mật khẩu: </div>
            <div class="cls_input">
                <input type="password" name="password" />
            </div>
        </div><br style="clear:both;" />
        <div class="img_row">
            <input class="btn" type="submit" value="Đăng nhập" />
            <input class="btn" type="reset" value="Xoá Form" />
        </div><br style="clear:both;" />
    </form>
    <?php require_once "msg.php"; ?>

    <style>
        .heading {
            text-align: center;
            color: black;
            font-size: 20px;
            padding: 5px;
        }

        .btn {
            text-align: center;
            font-size: 16px;
            padding: 4px 8px;
            margin: 12px 16px;
            border: none;
            border-radius: 3px;
            background-color: black;
            color: white;
        }
    </style>
</body>

</html>