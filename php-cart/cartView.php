<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Giỏ hàng</title>
    <!-- CSS only -->
    <script src=" https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="cart.css">
</head>

<body>
    <?php
    include_once("_modelCart.php");
    require_once("db_module.php");
    ?>
    <?php include_once "cartBtn.php" ?>

    <div class="container">
        <div class="cart-box row gy-3">
            <div class="col-12 col-lg-8">
                <div class="cart-wrapper">
                    <span class="cart-heading">Giỏ Hàng</span>

                    <?php
                    $total = 0;
                    $cart = json_decode($_COOKIE['cart'], true);
                    foreach ($cart as $id => $quantity) {

                        $result = executeQuery("SELECT * FROM tb_product WHERE id=" . $id);
                        $product = [];
                        while ($rows = mysqli_fetch_assoc($result)) {
                            $product['id'] = $rows['id'];
                            $product['name'] = $rows['name'];
                            $product['desc'] = $rows['desc'];
                            $product['price'] = $rows['price'];
                            $product['img'] = $rows['img'];
                        }
                        $total += $quantity * $product['price'];

                        echo
                        "<form class='product-wrapper' method='post' action='cartController.php'>
                            <div class='product-img-wrapper  col-3  col-lg-3  col-xl-2'>
                                <img class='product-img' src='" . $product['img'] . "' />
                            </div>

                            <div class='product-info-quantity col-7 col-lg-7 col-xl-8 row'>
                                <div class='product-info  col-12  col-lg-7  col-xl-7'>
                                    <span class='product-name'>" . $product['name'] . "</span>
                                    <span class='product-price'>" . number_format((int) $product['price'], 0, '', '.') . " đ</span>
                                    <span class='product-ship'>
                                        <svg xmlns='http://www.w3.org/2000/svg' class='product-icon icon icon-tabler icon-tabler-truck' viewBox='0 0 24 24' stroke-width='1.5' stroke='currentColor' fill='none' stroke-linecap='round' stroke-linejoin='round'>
                                            <path stroke='none' d='M0 0h24v24H0z' fill='none'></path>
                                            <circle cx='7' cy='17' r='2'></circle>
                                            <circle cx='17' cy='17' r='2'></circle>
                                            <path d='M5 17h-2v-11a1 1 0 0 1 1 -1h9v12m-4 0h6m4 0h2v-6h-8m0 -5h5l3 5'></path>
                                        </svg>
                                        <span>Freeship</span>
                                    </span>
                                </div>

                                <div class='quantity  col-12  col-lg-5  col-xl-5'>
                                    <div class='product__quantity-box'>
                                        <button type='button' class='product__quantity-decrease'>
                                            <svg xmlns='http://www.w3.org/2000/svg' class='icon icon-tabler icon-tabler-minus' width='24' height='24' viewBox='0 0 24 24' stroke-width='2' stroke='currentColor' fill='none' stroke-linecap='round' stroke-linejoin='round'>
                                                <path stroke='none' d='M0 0h24v24H0z' fill='none'></path>
                                                <line x1='5' y1='12' x2='19' y2='12'></line>
                                            </svg>
                                        </button>
                                        <input class='product__quantity-input' name='quantity' min='0' value='" . $quantity . "' type='number'>
                                        <button type='button' class='product__quantity-increase'>
                                            <svg xmlns='http://www.w3.org/2000/svg' class='icon icon-tabler icon-tabler-plus' width='24' height='24' viewBox='0 0 24 24' stroke-width='2' stroke='currentColor' fill='none' stroke-linecap='round' stroke-linejoin='round'>
                                                <path stroke='none' d='M0 0h24v24H0z' fill='none'></path>
                                                <line x1='12' y1='5' x2='12' y2='19'></line>
                                                <line x1='5' y1='12' x2='19' y2='12'></line>
                                            </svg>
                                        </button>
                                    </div>

                                </div>
                            </div>

                            <div class='product-action  col-2  col-lg-2  col-xl-2'>
                                <span class='product-real-price d-none d-md-block'>" . number_format((int) $product['price'] * $quantity, 0, '', '.') . " đ</span>
                                <input type='submit' name='action' value='Xóa'>
                            </div>

                            <input type='hidden' name='id' value='" . $id . "'>
                            <input hidden type='submit' name='action' value='Cập Nhật'>

                        </form>";
                    }
                    ?>

                </div>
            </div>

            <div class="col-12 col-lg-4">
                <div class="cart-wrapper">
                    <span class="cart-heading-2">Giao Hàng</span>
                    <div class="product__ship">
                        <div class="product__ship-address">
                            <span class="product__ship-label">Giao đến</span>
                            <span class="product__ship-choosing">P.Bến Nghé, Q.1, Hồ Chí Minh</span> -
                            <a class="product__ship-change" href="#">Đổi địa chỉ</a>
                        </div>
                        <div class="product__ship-time-price">
                            <img class="product__ship-img" src="https://lh3.googleusercontent.com/fife/AAbDypBRkXHqUR67UQZeeU100TBqSACKH1fCn7Lg4R8ye8AQPPi5lWkutyEEr4-1HrhdkiQIIJwPsPxHzu82OMTGn7fboUUaZC3EmvQsfPxK84ClB40ZZQ9KgUYuEv9cROL0PlYfcLNl4KrTJhDBdquDZ-9l3FBLiHUoia8P_7p8P3rxsDKuzo8YLgnu56j9u0oV22whypr2SVcyIFmDyO95F474ERe7JTiYYDTg81ztMzvccE3jNIKD_SMetShLA0nbguPoVdcog5yGwu4nb8auVOKT-ajRnJ-6uHYd9DYrSzP_kzg_99clLs1jgmwJvhiN-r63Y3abkZF7lT5coNyN4Xsxh2rjgPcnfsSFqMp5nc0BhnF60zyrTBlikr-mIostr3JdvMtJNFTgvF1PMBJ21rukvt2xJsVPU81pDJMLdqmXGIfI3DoKU7NqGdxlFOMaagqRMeCc_QsQtmoP2kVt586D1svDm1UaNVCn3avqLn_liTxthqteO88fyY-BIgrKwg22qZLJJ8HEUIWGOkkgbmhgT0KtsnPBmPop10eP3FrOEueAHXSydlbC1w4Hwn8b18u5vb5rckKRBl5xQeQTZ31OBx0fk0XJRfPaFnlv3smS_TLeMwMq0WQiAH-K8WPLFgkh1MMH5cU3qTaHannblLL3CuS2rTF_CjnbrvEN8Ygtsvl29hLSMjar19nMiZ6qRz3-yyhkYkgrSjEuPBIVeQ5qYtBtAxWvsMYW-rWHNK7ONM8D-iq8EXPzS_Usu94mdvMrNlz0apSjACRof7eKewWCD26vprnYNB2WUULePCIv7Qx4dp-EmsGQTTzaGCpOJoOz_E3Gs4EOtw-e-7qfFv12wyBdKhU6s34OxCpLcItp2Pqmqbs5-r_pv-sxSCuz6dRr9Z9KokgMUpx75PH4QaqHyCZJ-66Dar5Bxi2kPG_e2V1A9HOq3MkH4Mgygoj53YL-bdzYIKfKwfSkygQVP417mtqHuV1jvBWUES6fv9J79k6HBNm8ehR5S_9VcFRZkwPJd1IOX--wgdj0iRDhICKcni3jGP-l8BbLZflrrNS5ZShIdAPRN6BAGGtTqwG84J32UXhTLMSfSx-99sTojDvwj4FStqef8qkvEsdjdNUMWSwpkMp9_8z9jX_6hvO2b_QL48mb_VEI6392HfFYpx7dvZ2FYXEBjyindU9NMkgjsEWVwk05E7WaTZVg2233JTw2ek3oqbUnfZhkQrt9HTvb4FqbR_SMkeKlmDDRX4ozGua3TFu5sjhaUdZxiNuhV9qBQ77lg9QAb17fB0zAnfgdc0uRvmjFaFx12v8-Yq0AM5uMJwSTqujdFD-TCm33vtE_2d3x77Bb0uiwV8f7g-26KcaKnNDtu1FxdMjki3hbBaaZdBRlzKQvtpb8soUuLdqg8HiCsBWxiy7jgSSdrR0OqC2tuGl6-t0rygDWN0PRFq5gXiNgqEEMKFDKaXLqy1IG5001XLi3hMcZM_vuNrbiLEXQcDmGIybvJFUAEo0WJdq_d3qVYU-7pJoqLzRIPd6VHoJsV2abyfJvnzIDsjFExlFfnEz7_U0HKuP9MmcgHBC1dTj0tDwJaFZ0FufREfY=w1600-h789">
                            <div class="product__ship-info">
                                <span class="product__ship-time">Ngày mai, trước 9:00</span>
                                <span class="product__ship-price">
                                    <span class="product__ship-price-label">Phí vận chuyển:</span>
                                    <span class="product__ship-price-new">0₫</span>
                                    <span class="product__ship-price-old">14.000₫</span>
                                </span>
                            </div>
                        </div>
                    </div>

                    <div class="separate"></div>
                    <div>
                        <div class="checkout-box">
                            <span class="cart-heading-2">Tổng tiền hàng</span>
                            <span class="cart-heading-2"><?php echo number_format($total, 0, '', '.'); ?> đ</span>
                        </div>
                        <div class="checkout-box">
                            <span class="cart-heading-3">Giảm giá</span>
                            <span class="cart-heading-3">(5%) -<?php echo number_format($total / 20, 0, '', '.'); ?> đ</span>
                        </div>
                        <div class="checkout-box">
                            <span class="cart-heading-3">Phí vận chuyển</span>
                            <span class="cart-heading-3">0 đ</span>
                        </div>
                        <div class="checkout-box">
                            <span class="cart-heading-3">Thuế VAT</span>
                            <span class="cart-heading-3">(10%) +<?php echo number_format($total * 0.95 * 0.1, 0, '', '.'); ?> đ</span>
                        </div>
                        <div class="separate"></div>
                        <div class="checkout-box">
                            <span class="cart-heading-2">Tổng Thanh Toán</span>
                            <span class="cart-heading-2"><?php echo number_format($total * 0.95 * 1.1, 0, '', '.'); ?> đ</span>
                        </div>
                    </div>

                    <div class="checkout-action">
                        <button class="checkout-btn">Đặt Hàng</button>
                        <a href="#" class="home-btn">Tiếp tục mua sắm</a>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).on("keydown", "form", function(event) {
            return event.key != "Enter";
        });

        $(".product__quantity-decrease").bind('click', function() {
            this.parentNode.querySelector('input[type=number]').stepDown();
            updateBtnClick($(this));
        })

        $(".product__quantity-increase").bind('click', function() {
            this.parentNode.querySelector('input[type=number]').stepUp();
            updateBtnClick($(this));
        })

        $("input[type=number]").each(function() {
            $(this).on("change", function() {
                updateBtnClick($(this));
            });
        });

        function updateBtnClick(_this) {
            _this.closest('.product-wrapper').find("input[hidden]").click();
        }
    </script>

</body>

</html>