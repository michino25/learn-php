<?php

$giohang = isset($_SESSION['giohang']) ? $_SESSION['giohang'] : array();

echo "<a class='cart-btn' href='./cartView.php'>
        Giỏ hàng
        <span>" . count($giohang) . "</span>
    </a>";
?>

<style>
    .cart-btn {
        display: block;
        margin-left: auto;
        padding: 16px 20px;
        text-decoration: none;
        border-radius: 26px;
    }

    .cart-btn:hover {
        color: white;
        background-color: rgba(0, 0, 255, 0.8);
    }

    .cart-btn span {
        display: inline-block;
        line-height: 1rem;
        padding: 0 8px;
        color: white;
        background-color: blue;
        border-radius: 8px;
        font-size: 0.8rem;
        transform: translateY(-12px);
    }

    .cart-btn:hover span {
        color: blue;
        background-color: white;
    }
</style>