<?php
foreach ($categories as $key => $category) {

    echo "
    <div class='category'>
        <h1>" . $category->getName() . "</h1>";

    foreach ($products[$key] as $product) {
        echo "
    <a href='index.php?id=" . $product->getId() . "' class='product'>
        <div class='product-wrap'>    
            <span style='font-weight: 700;'>" . $product->getName() . "</span>
            <span>" . number_format((int) $product->getPrice(), 0, '', '.') . "đ</span>
        </div>
        <img src='" . $product->getImg() . "' width='100px' height='100px' style='object-fit: contain;'>
    </a>";
    }

    echo "</div>";
}
?>

<style>
    .product {
        display: flex;
        text-decoration: none;
        color: black;
    }

    .product:hover {
        background: rgba(0, 0, 0, 0.05);

    }

    .product-wrap {
        display: flex;
        width: 350px;
        flex-direction: column;
        justify-content: center;
    }
</style>