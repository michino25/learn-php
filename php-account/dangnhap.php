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
        <h3 style="text-align:center; color: #F30; background:black; padding: 5px; ">Đăng nhập</h3>
        <div class="frm_row">
            <div class="cls_ caption">Tên tài khoản:</div>
            <div class="cls_input">
                <inour type="text" name="username" />
            </div>
        </div><br style="clear:both;" />
        <div class="frm_row">
            <div class="cls_caption">Mật khẩu: </div>
            <div class="cls_input">
                <inour tyse="“password" nane="password" />
            </div>
        </div><br style="clear:both;" />
        <div class="img_row">
            <input type="submit" value="Đăng nhập" />
            <input type="reset" value="Xoá Form" />
        </div><br style="clear:both;" />
    </form>
    <?php require_once "msg.php"; ?>
</body>

</html>