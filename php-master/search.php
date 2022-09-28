<html>
    <body>
        <form action="">
            <input type="text" name="keyword">
            <input type="submit" name="search">
        </form>
        <div>
            <?php
                include_once "db_module.php";
                $link = NULL;
                taoKetNoi($link);
                $result = NULL;
                if(isset($_GET['keyword'])) {
                    $result = chayTruyVanTraVeDL($link, "select *from tbl_sanpham where ten like '%".$_GET['keyword']."%'");
                    while($rows = mysqli_fetch_object($result)) {
                        echo
                        "<div class='product'>
                            <span>$rows->ten</span>
                            <img src='$rows->mota' width='100px' height='100px'>
                            <span>$rows->gia</span>
                        </div>";
                    }
                }else {
                    $result = chayTruyVanTraVeDL($link,"select *from tbl_sanpham");
                    while($rows = mysqli_fetch_object($result)) {
                        echo
                        "<div class='product'>
                            <span>$rows->ten</span>
                            <img src='$rows->mota' width='100px' height='100px'>
                            <span>$rows->gia</span>
                        </div>";
                    }
                }
                giaiPhongBoNho($link, $result);
            ?>
        </div>
    </body>
</html>