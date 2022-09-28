<?php
function Calc($a, $b)
{
    return $a + $b;
}

$a = $_GET['P'];
$b = $_GET['Q'];

echo "Tổng của a và b là " . Calc($a, $b);
