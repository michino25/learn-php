<?php



?>

<div class="row mb " id="bill">
    <form action="bill.php" method="post">
        <div class="row">
            <h1>THÔNG TIN NHẬN HÀNG</h1>
            <table class="thongtinnhanhang">
                <tr>
                    <td width="20%">Họ tên</td>
                    <td><input type="text" name="hoten" required></td>
                </tr>
                <tr>
                    <td>Địa chỉ</td>
                    <td><input type="text" name="diachi" required></td>
                </tr>
                <tr>
                    <td>Điện thoại</td>
                    <td><input type="text" name="dienthoai" required></td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td><input type="text" name="email" required></td>
                </tr>
            </table>
        </div>
        <div class="row mb">
            <h1>GIỎ HÀNG</h1>
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
                <?php echo showgiohang(); ?>
                <!-- <tr>
                            <td>1</td>
                            <td><img src="images/1.jpg" alt=""></td>
                            <td>Đồng hồ</td>
                            <td>10</td>
                            <td>1</td>
                            <td>
                                <div>10</div>
                            </td>
                        </tr> -->
                <!-- <tr>
                            <th colspan="5">Tổng đơn hàng</th>
                            <th>
                                <div>10</div>
                            </th>

                        </tr> -->
            </table>
        </div>
        <div class="row mb">
            <input type="submit" value="ĐỒNG Ý ĐẶT HÀNG" name="dongydathang">
            <a href="index.php?act=cart&delcart=1"><input type="button" value="XÓA GIỎ HÀNG"></a>
            <a href="index.php"><input type="button" value="TIẾP TỤC ĐẶT HÀNG"></a>
        </div>
    </form>

</div>