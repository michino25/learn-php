<?php
session_start();
include "thuvien.php";
if (isset($_POST['dongydathang']) && ($_POST['dongydathang'])) {
    //lấy thông tin kh từ form để tạo đơn hàng
    $name = $_POST['hoten'];
    $address = $_POST['diachi'];
    $tel = $_POST['dienthoai'];
    $email = $_POST['email'];
    $total = tongdonhang();
    $pttt = 0;

    //insert đơn hàng - tạo đơn hàng mới
    $idbill = taodonhang($name, $address, $tel, $email, $total, $pttt);


    //lấy thông tin giỏ hàng từ session + id đơn hàng vừa tạo
    //insert vào bảng giỏ hàng

    for ($i = 0; $i < sizeof($_SESSION['giohang']); $i++) {
        $tensp = $_SESSION['giohang'][$i][1];
        $hinhsp = $_SESSION['giohang'][$i][0];
        $dongia = $_SESSION['giohang'][$i][2];
        $soluong = $_SESSION['giohang'][$i][3];
        $thanhtien = $dongia * $soluong;
        taogiohang($tensp, $hinhsp, $dongia, $soluong, $thanhtien, $idbill);
    }

    //show confirm đơn hàng

    $ttkh = 'Bạn đã đặt hàng thành công<br><h1>Mã đơn hàng: ' . $idbill . '</h1>
                <h2>THÔNG TIN NHẬN HÀNG</h2>
                <table class="thongtinnhanhang">
                
                <tr>
                    <td width="20%">Họ tên</td>
                    <td>' . $name . '</td>
                </tr>
                <tr>
                    <td>Địa chỉ</td>
                    <td>' . $address . '</td>
                </tr>
                <tr>
                    <td>Điện thoại</td>
                    <td>' . $tel . '</td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td>' . $email . '</td>
                </tr>
            </table>';
    $ttgh = showgiohang();


    //unset giỏ hàng session

    unset($_SESSION['giohang']);

    // echo "Bạn đã đặt hàng thành công. Đơn hàng của bạn là!";
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart | View Cart</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <div class="boxcenter">
        <div class="row mb header">
            <h1> SIÊU THỊ TRỰC TUYẾN</h1>
        </div>
        <div class="row mb menu">
            <ul>
                <li><a href="index.php">Trang chủ</a></li>
                <li><a href="cart.php">Giỏ hàng</a></li>
                <li><a href="#">Liên hệ</a></li>
                <li><a href="#">Góp ý</a></li>
                <li><a href="#">Hỏi đáp</a></li>
            </ul>
        </div>
        <div class="row mb ">
            <div class="boxtrai mr" id="bill">
                <div class="row">

                    <?php echo $ttkh; ?>
                </div>
                <div class="row mb">
                    <h2>GIỎ HÀNG</h2>
                    <table>
                        <tr>
                            <th>STT</th>
                            <th>Hình</th>
                            <th>Tên sản phẩm</th>
                            <th>Đơn giá</th>
                            <th>Số lượng</th>
                            <th>Thành tiền ($)</th>
                            <th>Xóa</th>
                        </tr>
                        <?php echo $ttgh; ?>

                    </table>
                </div>

            </div>
            <div class="boxphai">
                <div class="row mb ">
                    <div class="boxtitle">TÀI KHOẢN</div>
                    <div class="boxcontent formtaikhoan">
                        <form action="#" method="post">
                            <div class="row mb10">
                                Tên đăng nhập<br>
                                <input type="text" name="user">
                            </div>
                            <div class="row mb10">
                                Mật khẩu<br>

                                <input type="password" name="pass">
                            </div>
                            <div class="row mb10">
                                <input type="checkbox" name=""> Ghi nhớ tài khoản?
                            </div>
                            <div class="row mb10">
                                <input type="submit" value="Đăng nhập">
                            </div>
                        </form>
                        <li>
                            <a href="#">Quên mật khẩu</a>
                        </li>
                        <li>
                            <a href="#">Đăng ký thành viên</a>
                        </li>
                    </div>
                </div>
                <div class="row mb">
                    <div class="boxtitle">DANH MỤC</div>
                    <div class="boxcontent2 menudoc">
                        <ul>
                            <li>
                                <a href="#">Đồng hồ</a>
                            </li>
                            <li>
                                <a href="#">Laptop</a>
                            </li>
                            <li>
                                <a href="#">Điện thoại</a>
                            </li>
                            <li>
                                <a href="#">Ba lô</a>
                            </li>
                            <li>
                                <a href="#">Đồng hồ</a>
                            </li>
                            <li>
                                <a href="#">Laptop</a>
                            </li>
                            <li>
                                <a href="#">Điện thoại</a>
                            </li>
                            <li>
                                <a href="#">Ba lô</a>
                            </li>
                        </ul>
                    </div>
                    <div class="boxfooter searbox">
                        <form action="#" method="post">
                            <input type="text" name="" id="">
                        </form>
                    </div>
                </div>
                <div class="row">
                    <div class="boxtitle">TOP 10 YÊU THÍCH</div>
                    <div class="row boxcontent">
                        <div class="row mb10 top10">
                            <img src="images/1.jpg" alt="">
                            <a href="#">Sir Rodney's Marmalade</a>
                        </div>
                        <div class="row mb10 top10">
                            <img src="images/5.jpg" alt="">
                            <a href="#">Cate de Blaye</a>
                        </div>
                        <div class="row mb10 top10">
                            <img src="images/3.jpg" alt="">
                            <a href="#">Tharinger Rostbratwurst</a>
                        </div>
                        <div class="row mb10 top10">
                            <img src="images/4.jpg" alt="">
                            <a href="#">Mishi Kobe Niku</a>
                        </div>
                        <div class="row mb10 top10">
                            <img src="images/1.jpg" alt="">
                            <a href="#">Sir Rodney's Marmalade</a>
                        </div>
                        <div class="row mb10 top10">
                            <img src="images/5.jpg" alt="">
                            <a href="#">Cate de Blaye</a>
                        </div>
                        <div class="row mb10 top10">
                            <img src="images/3.jpg" alt="">
                            <a href="#">Tharinger Rostbratwurst</a>
                        </div>
                        <div class="row mb10 top10">
                            <img src="images/4.jpg" alt="">
                            <a href="#">Mishi Kobe Niku</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mb footer">
            Copyright © 2021 - HOTB
        </div>
    </div>

</body>

</html>