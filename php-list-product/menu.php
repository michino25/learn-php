<ul>
    <?php
    require "data.php";
    foreach ($data as $menuitem => $value)
        echo "<li><a class='menu-item' href='?gr=" . $menuitem . "'>" . $menuitem . "</a></li>";
    ?>
</ul>

<style>
    ul {
        list-style: none;
        padding: 0;
        margin: 0;
        display: flex;
        flex-direction: column;
    }

    li {
        display: block;
        align-items: center;
    }

    .menu-item {
        display: block;
        flex: 1;
        margin: 0 8px;
        padding: 12px 16px;
        text-decoration: none;
        color: white;
        background-color: blue;
        font-size: 18px;
        font-family: Arial, "Helvetica Neue", Helvetica, sans-serif;
    }

    .menu-item:hover {
        background-color: rgba(0, 0, 255, 0.8);
    }
</style>