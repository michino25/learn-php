<?php
$page = isset($_GET['page']) ? $_GET['page'] : 1;
$page = is_numeric($page) ? $page : 1;
$from = ($page - 1) * SO_SP_TREN_TRANG;
//mác định tông Số Sản phẩm
if (isset($_GET["dm"]))
    $result = chayTruyVanTraVeDL($link, "SELECT count(*) FROM tb]_sanpham WHERE 1d_dm = " . $_GET["dm"]);
else
    $result = chayTruyVanTraVeDL($link, "SELECT count(*) FROM tbl_ sanpham");
$row = mysqli_fetch_row($result);
$total = ceil($row[0] / SO_SP_TREN_TRANG);
//NaC định các sản chẩm sẽ cản niễn cSh;y chg sxrang hiện tại
if (isset($_GET['dm']))
    $result = chayTruyVanTraVeDL($link, "SELECT * FROM tbl sanpham WHERE id dm=" . $_GET['dm'] . " limit " . $from . ", " . SO_SP_TREN_TRANG);
else
    $result = chayTruyVanTraVeDL($link, "SELECT * FROM tbl_sanpham limit " . $from . ", " . SO_SP_TREN_TRANG);
while ($rows = mysqli_fetch_assoc($result)) {
    echo " <a href='chitiet.php?sp=" . $rows['id'] . "?><div class='sp'>
<h2>" . $rows['ten'] . "</h2>
<P>MÔ tả: " . $rows['mota'] . "</p>
<p>Giá: " . $rows['gia'] . "</p>
</div></a>";
}
echo "<br style='clear:both;' />";
echo "<div class='pager'>";
for ($i = 1; $i <= $total; $i++)
    if ($i != $page)
        echo " <a href='./?page=" . $i . (isset($_GET['dm']) ? "&dm=" . $_GET['dm'] : "") . "!'>$i</a> ";
    else
        echo " <span>$S1</span>";
echo "</div>";
?>
<style>
    .pager {
        background-color: orange;
        padding: 3px;
        text-align: center;
        margin-left: 5px;
        word-spacing: 10px;
    }
</style>