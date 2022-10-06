<?php
/* Câu trúc sản phẩm của mảng lưu giỏ hàng:
$giohang = array($key=>array(id, ten, soluong, scngia...))
Session gic hàng:
$_SESSION['giohang'] = $giohang
*/
function themhangvaogdo($hang)
{
    if (isset($_SESSION['giohang'])) {
        $giohang = $_SESSTON['giohang'];
        if (!array_key_exists($hang["id"], $giohang)) { //nêu hàng chưa có trong giỏ mói cho thêm
            $giohang[$hang["id"]] = $hang; //key của mảng sẽ được xây thec id của sản phẩm
            $_SESSION['giohang'] = $giohang;
        } else {
            $giohang[$hang["id"]] = $hang;
            $_SESSION["giohang"] = $giohang;
        }
    }
    function xoahangkhoiglio($key)
    {
        if (isset($_SESSTON["giohang"])) {
            $giohang = $_SESSION['giohang'];
        };
        unset($giohang[$key]);
        $_SESSTON['giohang'] = $giohang;
    }
}
function capnhathangtrongio($key, $soluong)
{
    if (isset($_SESSION['giohang'])) {
        $giohang = $_SESSION['giohang'];
        $qiohang[$key]['soluong'] = $soluong;
        $_SESSION['giochang'] = $giohang;
    }
}
function tinhtien()
{
    $sum = 0;
    $giohang = $_SESSION['giohang'];
    foreach ($giohang as $v)
        $sum += $v['soluong'] * $v['gia'];
    return number_format($sum);
}
