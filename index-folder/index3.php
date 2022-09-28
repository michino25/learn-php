<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP slide 3</title>
</head>

<body>
    <?php
    $a = array();
    $b = array(array("Trung", 20), array("Tín", 21));
    $sum = 0;
    for ($i = 0; $i < count($b); $i++) {
        $sum += $b[$i][1];
        echo "Tên: " . $b[$i][0] . ", " . $b[$i][1] . " tuổi <br/>";
    }
    echo "Số liệu trung bình: " . $sum / count($b) . " tuổi <br/>";

    echo "Cách duyệt mảng khác <br/>";

    $c = array(12, 10, 21);
    foreach ($c as $value) {
        echo "$value <br/>";
    };

    foreach ($c as $key => $value) {
        echo "$key = $value<br>";
    };

    $d = array("trung" => 20, "tín" => 21);
    echo "truy cập mảng có key " . $d['trung'] . "<br/>";
    foreach ($d as $key => $value) {
        echo "$key = $value<br>";
    };

    echo "Thêm phần tử vào mảng <br/>";
    array_push($c, 15, 86, 64);
    foreach ($c as $value) {
        echo "$value <br/>";
    };

    echo "Xoá phần tử cuối và phần tử i = 2 <br/>";
    array_pop($c);
    unset($c[2]);
    foreach ($c as $value) {
        echo "$value <br/>";
    };

    array_multisort($c, SORT_NUMERIC); // trả về true/false (có sắp xếp được không)
    foreach ($c as $value) {
        echo "$value <br/>";
    };

    // nếu e bị trùng thì xếp theo c
    $e = array(5, 3, 5, 3);
    array_multisort($e, $c, SORT_DESC);
    foreach ($e as $value) {
        echo "$value <br/>";
    };

    // sort / rsort chỉ dùng cho mảng có chỉ số
    sort($c, SORT_DESC);

    // usort xếp theo người dùng định nghĩa
    function xep ($a, $b){
        if (strlen(strval($a)) > strlen(strval($b)))
            return 1;
        else
            return -1;
    }
    $f = array(12, 3, "abc", "a");
    usort($f, "xep");
    foreach ($f as $value) {
        echo "$value <br/>";
    };

    // asort & arsort để sắp xếp mảng có khoá (khoá di chuyển cùng value)
    foreach (array_merge($a, $f) as $value) {
        echo "$value <br/>";
    };

    // array_combine($key, $value) để tạo mảng có khoá mới, 2 mảng phải cùng độ dài
    // array_unique($a) loại bỏ phần tử dư thừa trùng lặp
    // array_search($value, $arr) trả về khoá đầu tiên của phần tử phù hợp trong mảng, không có trả về false
    // array_keys($arr, $value) trả về tất cả khoá của phần tử phù hợp trong mảng, không có trả về false

    // array_chunk($mảng, $kích_thước, $đánh_lại_chỉ_số[=false]); // cắt mảng thành nhiều mảng con

    // array_rand($mảng, $số_lượng); // tạo mảng con từ $mảng bằng cách lấy ngẫu nhiên

    // array_count_values($mảng); // đếm giá trị lặp của từng phần tử của mảng.

    // array_fill($from, $num, $value); // điền $value vào mảng từ $from với số lượng $num.

    //array_sum($mảng); // tính tổng các phần tử của mảng

    // array_product($mảng); // tính tích các phần tử của mảng.


    ?>
</body>

</html>