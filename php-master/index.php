<html>
    <body>
        <?php
        include_once "db_module.php";
        $link = null;
        taoKetNoi($link);

        $result = chayTruyVanTraVeDL($link, "select * from tbl_danhmuc");
        while($rows=mysqli_fetch_assoc($result)){
            echo "
            <div class='category'>
                <h1>".$rows['ten']."</h1>
                ";
                $result2 = chayTruyVanTraVeDL($link, "
                select * from tbl_sanpham where id_dm=".$rows['id']);
                while($rows2=mysqli_fetch_assoc($result2)){
                    echo "
                    <div class='product'>
                        <span>Tên sản phẩm: ".$rows2['ten']."</span>
                        <img src='".$rows2['mota']."' width='100px' height='100px'>
                        <span>Giá: ".$rows2['gia']."</span>
                    </div>
                    ";
                }
            echo"
            </div>
            ";
        }

        giaiPhongBoNho($link, $result);

        ?>
    </body>
</html>