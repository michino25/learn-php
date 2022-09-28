<!DOCTYPE html>
<html>
<body>
    <?php
        $text = "Hi I love u";
        echo $text . "<br/>";
        echo strlen($text) . "<br/>";
        echo strtolower($text) . "<br/>";
        echo strtoupper($text) . "<br/>";
        echo substr($text, 3, 5) . "<br/>";
        echo str_word_count($text) . "<br/>";
        echo "-----<br/>";
        
        $text2 = "   Hi  I    love u   ";
        echo "~" . $text2 . "~" . "<br/>";
        echo "~" . ltrim($text2) . "~" . "<br/>";
        echo "~" . rtrim($text2) . "~" . "<br/>";
        echo "~" . trim($text2) . "~" . "<br/>";
        echo "-----<br/>";

        $num = 3.1415984651;
        echo number_format($num, 2) . " VND" . "<br/>";
        echo "-----<br/>";

        echo strcmp("Tôi", "tôi") . "<br/>";
        echo strcasecmp("Tôi", "tôi") . "<br/>";
    ?>
</body>
</html>