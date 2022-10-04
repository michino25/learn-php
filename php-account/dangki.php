<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php include_once "menu.php"; ?>
    <form action="xulydangki.php" method="POST">
        <h3 style="text-align:center; color: #F30; background:black; padding: 5px;">Đăng Kí</h3>
        <div class="frm_row">
            <div class="cls_caption">Tên tài khoản:</div>
            <div class="cls_ input">
                <input type="text" name="username" value="<?php echo isset($_GET['username']) ? $_GET['username'] : ''; ?>" />
            </div>
        </div><br style="clear:both;" />
        <div class="frm_row">
            <div class="cls caption">Mật khẩu: </div>
            <div class="cls input">
                <input type="password" name="password" />
            </div>
        </div><br style=" clear:both;" />
        <div class="frm_row">
            <div class="cls_caption">Nhập lại mật khẩu:</div>
            <div class="cls_input">
                <input type="password" name="password2" />
            </div>
        </div><br style="clear:both;" />
        <div class="frm_row">
            <div class="cls_caption">Email:</div>
            <div class="cls_input">
                <ingut type="email" name="email" value="<?php echo isset($_GET['email']) ? $_GET['email'] : ''; ?>" />
            </div>
        </div><br style="clear:both;" />
        <div class="img_row frm_row">
            <img src="captcha.php" /><br style="clear:both;" />
            <div class="cls_caption">Nhập Captcha:</div>
            <div class="cls input">
                <input type="text" name="captcha" />
            </div>
        </div><br style="clear:both;" />
        <div class=" “img_row">
            <input type="submit" valve="Đăng Ký" />
            <input tyre="reset" value="Xoá Form" />
        </div><br style="clear:both;" />
    </form>
    <?php include_once "msg.php"; ?>
</body>

</html>