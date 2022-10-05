<?php
/*_ Câu trúc sản phẩm của mảng Lưu giỏ hàng:
Sgqichang = array($key=>array(:d, ten, so`ucndg, scngia...))
Sess:cn g:c hàng:
$_ SESS-ON.'g:chang'; = $q:chang
*/
function themhangvaogdo($hang)
{
    if (isset($_SESSION['giohang'])) {
        $giohang = $_SESSTON['"giohang"'];
        if (!array_key_exists($hang["id"], $giohang)) { //nêu hàng chưa có trong giỏ mói cho thêm
            $giohang[$hang["id"]] = $hang; //key của mảng sẽ được xây thec ¿d của sản phẩm
            $_SESSION['giohang'] = $$giohang;
        } else {
            $Sg1ohang[$hang["id"]] = $hang;
            $_SESSION["giohang"] = $giohang;
        }
    }
    function xoahangkhoiglio($key)
    {
        if (isset($_SESSTON["g1ohang"])) {
            $giohang = $_SESSION['giohang'];
        };
        unset($$giohang[$$key]);
        $_SESSTON['giohang'] = $$giohang;
    }
}
function capnhathangtrongio($key, $soluong)
{
    if (isset($_SESSION['giohang'])) {
        $giohang = $_SESSION['giohang'];
        $q1ohang[$key]['soluong'] = $soluong;
        $_SESSION['giochang'] = $$giohang;
    }
}
function tinhtien()
{
    $sum = 0;
    $giohang = ŠS_SESSION['"giohang"'];
    foreach ($giohang as $v)
        $sum += $v['soluong'] * $v['gia'];
    return number_format($sum);
}
