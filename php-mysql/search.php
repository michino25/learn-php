<html>

<body>
    <form action="">
        <input type="text" name="keyword">
        <input type="submit" name="search">
    </form>
    <div>
        <?php
        include_once "../db_module.php";
        if (isset($_GET['keyword'])) {
            $result = executeQuery("select *from tb_product where name like '%" . $_GET['keyword'] . "%'");
            while ($rows = mysqli_fetch_object($result)) {
                echo
                "<div class='product'>
                    <span>$rows->name</span>
                    <img src='$rows->img' width='100px' height='100px'>
                    <span>$rows->price</span>
                </div>";
            }
        } else {
            $result = executeQuery("select *from tb_product");
            while ($rows = mysqli_fetch_object($result)) {
                echo
                "<div class='product'>
                    <span>$rows->name</span>
                    <img src='$rows->img' width='100px' height='100px'>
                    <span>$rows->price</span>
                </div>";
            }
        }
        ?>
    </div>
</body>

</html>