<body>
    <?php
    include_once("_modelCart.php");
    require_once("db_module.php");
    ?>
    <div id="container">
        <div>
            <?php
            if (isset($_SESSION['giohang'])) {
                $giohang = $_SESSION['giohang'];
                echo "
                    <form method='post' action='cartController.php'>
                        <input type='submit' name='action' value='Trang chủ'>
                        <input type='submit' name='action' value='Xóa Hết Giỏ Hàng'>
                    </form>";

                echo "<p>Tổng thanh toán " . total() . "</p>";

                foreach ($giohang as $k => $v)
                    echo "
                    <form method='post' action='cartController.php'>
                        <img class='product-img' src='" . $v['img'] . "'/>
                        <span>" . $v['name'] . "</span> 
                        <span>Giá: "  . number_format((int) $v['price'], 0, '', '.') . "VNĐ</span>
                        
                        <input type='number' value='" . $v['soluong'] . "' name='soluong' min='1'>
                        <input type='submit' name='action' value='Xóa'>
                        
                        <input type='hidden' name='id' value='" . $k . "'>
                        <input hidden type='submit' name='action' value='Cập Nhật'>
                    </form>";
            }
            ?>
        </div>
    </div>

    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        form input:not(input[hidden]) {
            display: inline-block;
            padding: 8px 12px;
            border-radius: 12px;
            border: 1px solid #ccc;
        }

        form input[type=submit]:hover {
            background-color: #dfdfdf;
        }
    </style>
    <script src=" https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script>
        $("input[type=number]").bind('change', function() {
            $("input[hidden]").click();
        });
    </script>

</body>