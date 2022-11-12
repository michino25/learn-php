<div class="header">
    <span></span>
    <a class='home' href="./">Trang chủ</a>

    <?php
    if (!isset($_COOKIE['cart']))
        setcookie('cart', json_encode([]), time() + 86400); // cookie sống được 1 ngày thì bị huỷ

    echo "<a class='cart-btn' href='./cartView.php'>
        Giỏ hàng
        <span>" . count(json_decode($_COOKIE['cart'], true)) . "</span>
    </a>";
    ?>
</div>

<style>
    .header {
        border-bottom: 1px solid #ccc;
        width: 100%;
        display: flex;
        padding-bottom: 8px;
        text-align: center;
        justify-content: space-between;
        margin: 12px 0;
    }

    .home {
        display: block;
        padding: 8px 24px;
        line-height: 38px;
        text-decoration: none;
        border: 1px solid rgba(0, 0, 255, 0.8);
    }

    .home:hover {
        color: white;
        background-color: rgba(0, 0, 255, 0.8);
    }

    .cart-btn {
        display: block;
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