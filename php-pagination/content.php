<?php
include_once "data.php";

if (isset($_GET['page'])) {
    if ($_GET['page'] == 'home') {
        foreach ($data as $key => $value) {
            echo "<a href='?who=" . $key . "&page=detail'>
                    <div class='box'>
                        <img class='human-img' src='img/" . $value[1] . "'>
                        <h3>" . $value[0] . "</h3>
                    </div>
                </a>";
        }
    } elseif ($_GET['page'] == "detail") {
        if (isset($_GET['who']) && array_key_exists($_GET['who'], $data)) {
            $human = $data[$_GET['who']];
            echo "<h2>" . $human[0] . "</h2>
                <img class='human-img' src='img/" . $human[1] . "'>
                <p>" . $human[2] . "</p>";
        } else
            header(("Location: ./"));
    }
} else
    header(("Location: ./?page=home"));

?>

<style>
    .human-img {
        width: 300px;
    }
</style>