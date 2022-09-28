<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP slide 1 & 2</title>
</head>
<body>
    <?php
        echo "Hello";
        echo "<br/>";
        print "Hello world";
        print "<br/>"; // comment
        /* comment */ 
        echo "<h3>Xin chào các bạn</h3>";

        // variable
        $a = 1;
        $_b = 2;
        $C = 3;
        echo $a;
        echo $_b."<br/>";
        echo $C."<br/>";

        // const
        define("MYNAME", "Như Trung");
        echo MYNAME."<br/>";

        // các toán tử + - * / %, so sánh '>' '<' , && || ! giống javascript
        // các toán tử a++ ++a a-- --a giống javascript
        $a = $_b + $C;
        echo $a."<br/>";
        $a -= 2;
        echo $a."<br/>";

        // 'dấu nháy đơn' hiển thị tên biến | "nháy đôi" hiển thị giá trị biến
        echo 'Biến _b $_b <br/>';
        echo "Biến C $C <br/>";

        // hàm
        function addNumber ($a, $b) {
            return $a + $b;
        }
        echo "Hàm tổng ".addNumber($_b, $C);

        function InValue ($a, $b) {
            echo "<li style='background-color:".makeRGB()."'><a href='test_get.php?P=".$a."&Q=".$b."'>$a+$b</a></li>";
        }

        echo (isset($z))?$z:"Chưa khởi tạo z"."<br/>";
        $z = 5;
        echo "Biến z đã khởi tạo ? ".(isset($z))?$z:"Chưa"."<br/>";
        unset($z);
        echo (isset($z))?"Biến z đã giải phóng ? Chưa":"Biến z đã giải phóng ? Rồi"."<br/>";

        function makeRGB() {
            return "rgb(".rand(0,255).",".rand(0,255).",".rand(0,255).")";
        }

    ?>

    <div>
        Kết quả 
        <?php
        echo "Hàm tổng ".addNumber($_b, $C);
        ?>
    </div>

    <ul>
        <?php
        InValue(3, 5);
        ?>
    </ul>

<!-- <form action="welcome.php" method="post">
Name: <input type="text" name="name"><br>
E-mail: <input type="text" name="email"><br>
<input type="submit">
</form> -->


<?php
?>
<!-- xin chào -->
</body>
</html>