<h1>Product Info</h1>

<?php
echo "
    <div class='product'>
        <img class='product-img' src='" . $product->getImg() . "'/>
        <div class='product-info'>
            <h2>" . $product->getName() . "</h2>
            <p>" . number_format((int) $product->getPrice(), 0, '', '.') . "đ</p>
            <p>" . $product->getDesc() . "</p>
        </div>
    </div>
";

?>

<style>
    .product {
        display: flex;

    }

    .product-img {
        width: 500px;
        height: 500px;
    }

    .product-info {
        display: flex;
        flex-direction: column;
    }
</style>