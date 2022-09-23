<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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


    ?>

    <div>
        Kết quả 
        <?php
        echo "Hàm tổng ".addNumber($_b, $C);
        ?>
    </div>

<input type="text" name="item">

<a href="test_get.php?subject=PH+P&web=W3schools.com">Test $GET</a>

<form action="welcome.php" method="post">
Name: <input type="text" name="name"><br>
E-mail: <input type="text" name="email"><br>
<input type="submit">
</form>


<?php
?>
<!-- xin chào -->
</body>
</html>