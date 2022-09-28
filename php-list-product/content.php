<?php
require_once "data.php";

$category = $_GET['gr'];
if (!$category || !array_key_exists($category, $data)) {
    $keys = array_keys($data);
    header("Location: ?gr=" . ($keys[0]));
}

$submenu = $data[$category];
foreach ($submenu as $submenuKey => $submenuValue) {
    echo "<div class='nav_bar'>" . $submenuKey . "</div>";
    echo "<div class='prd_list'>";
    foreach ($submenuValue as $prod) {
        echo "<div class='prd_item'>";
        echo $prod;
        echo "</div>";
    }
    echo "<br style='clear:both; '>";
    echo "</div>";
}
?>

<style>
    div {
        font-family: Arial, "Helvetica Neue", Helvetica, sans-serif;
    }
    .nav_bar {
        display: block;
        padding: 12px 16px;
        background-color: #044;
        color: white;
        font-weight: bold;
        margin-top: 20px;
    }

    .nav_bar:first-child {
        margin-top: 0;
    }

    .prd_list {
        display: flex;
    }

    .prd_item {
        width: 150px;
        background-color: #395;
        color: white;
        text-align: center;
        padding: 16px 0px;
        margin: 4px 16px 0;
    }

    .prd_item:hover {
        opacity: 0.8;
    }
</style>