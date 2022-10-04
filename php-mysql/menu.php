<ul>
    <li><a class='menu-item' href="./">Tất cả sản phẩm</a></li>

    <?php
    $result = executeQuery("select * from tb_category");
    while ($rows = mysqli_fetch_assoc($result)) {
        echo "<li><a class='menu-item' href=?category=" . $rows['id'] . ">" . $rows['name'] . "</a></li>";
    }
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