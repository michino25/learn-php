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
    require_once("../db_module.php");
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
                    if (count($cart) > 0)
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
                    else
                        echo "
                        <div class='cart-no-item'>
                            <svg xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink' id='Layer_1'
                                x='0px' y='0px' viewBox='90 20 800 400'
                                style='enable-background:new 0 0 800 400;' xml:space='preserve'>
                                <g>
                                    <g>
                                        <polygon
                                            style='fill:none;stroke:#231E20;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:10;'
                                            points='    401.85773,225.21846 396.83777,225.51845 394.55774,211.10847 399.49774,210.32845   ' />
                                        <polygon
                                            style='fill:none;stroke:#231E20;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:10;'
                                            points='    405.12775,245.91847 400.08777,246.05849 397.15778,227.50844 402.16772,227.20845   ' />
                                        <polygon
                                            style='fill:none;stroke:#231E20;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:10;'
                                            points='    408.85773,269.4985 403.79773,269.4985 400.40778,248.04848 405.44775,247.91847   ' />
                                        <path
                                            style='fill:none;stroke:#231E20;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:10;'
                                            d='M542.6413,286.63452    c-0.44,1.81-0.84998,3.46997-1.21997,4.94995l-120.86008-6c-8.02997-0.39996-14.81-6.25995-16.41998-14.08997h5.14001    c1.5,5.09998,6.12,8.83002,11.52997,9.08997l19.23999,0.96002l16.56,0.82001l33.29004,1.65002l30.66,1.52997l14.97003,0.73999    L542.6413,286.63452z' />
                                        <path
                                            style='fill:none;stroke:#231E20;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:10;'
                                            d='    M574.82129,271.49451l-0.98999,7.14001c-1.09998,7.96997-7.81,13.75995-15.76001,13.75995    c-0.27997,0-0.54999-0.00995-0.82001-0.01996l-11.76001-0.58002c0.40002-1.63,0.80005-3.27997,1.21002-4.95001l4.72003,0.23004    l6.06995,0.29999c5.71002,0.29999,10.60004-3.77002,11.39001-9.42999l0.89001-6.45001H574.82129z' />
                                        <polygon
                                            style='fill:none;stroke:#231E20;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:10;'
                                            points='    578.70776,243.30849 575.08777,269.4985 570.04773,269.4985 573.64777,243.43849   ' />
                                        <polygon
                                            style='fill:none;stroke:#231E20;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:10;'
                                            points='    582.45776,216.19844 578.98773,241.30849 573.91772,241.43849 577.36774,216.50844   ' />
                                        <polygon
                                            style='fill:none;stroke:#231E20;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:10;'
                                            points='    586.39777,187.71846 582.73773,214.17848 577.64777,214.48848 581.26776,188.28847   ' />
                                        <path
                                            style='fill:none;stroke:#231E20;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:10;'
                                            d='    M596.47778,167.93849l-4.86005,4.22998c-2.25,1.96997-3.71997,4.69-4.13,7.64996l-0.81,5.85004v0.01001l-5.13,0.57001v-0.01001    l0.98004-7.10004c0.57996-4.15997,2.63995-7.97998,5.81-10.73999l4.84998-4.22998' />
                                    </g>
                                    <g>
                                        <path
                                            style='fill:none;stroke:#231E20;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:10;'
                                            d='    M561.20129,215.49452c-0.19,0.66998-0.38,1.34998-0.57001,2.02997l-2.29999,0.14001l-19.33002,1.17999l-17.02997,1.04004    l-17.84006,1.08997l-16.45996,1.01001l-16.70001,1.02002l-17.87,1.08997l-17.14001,1.04999l-17.47998,1.06006l-16.31,1    l-5.01001,0.29999l-0.46002,0.02997h-0.06c-0.53003,0-0.96997-0.40997-1-0.94c-0.03003-0.54999,0.38-1.01996,0.94-1.06    l0.26001-0.01996l5.01996-0.30005l16.43005-1l17.52997-1.07001l17.16003-1.04999l17.88995-1.08997l16.73004-1.02002    l16.50995-1.01001l17.91006-1.08997l17.08997-1.05005l19.42004-1.17999L561.20129,215.49452z' />
                                        <path
                                            style='fill:none;stroke:#231E20;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:10;'
                                            d='M584.17133,215.0945    c0.02997,0.54999-0.39001,1.02002-0.94,1.04999l-0.77002,0.05005l-5.09003,0.31l-12.5,0.76001    c0.19-0.68005,0.38-1.36005,0.57001-2.03003l12.21002-0.75l5.08997-0.31l0.37-0.02002    C583.68127,214.12453,584.13129,214.54451,584.17133,215.0945z' />
                                    </g>
                                    <g>
                                        <path
                                            style='fill:none;stroke:#231E20;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:10;'
                                            d='    M553.99127,241.96449c-0.16998,0.67004-0.34998,1.34003-0.51996,2.01001l-15.78003,0.41998l-16.25,0.43005l-17.04001,0.44995    l-15.88,0.43005l-16.42999,0.43994l-17.64001,0.46002l-16.90002,0.45001v0.01001l-17,0.45001l-15.09998,0.39996l-5.03998,0.13    l-0.70001,0.02002h-0.06c-0.53003,0-0.97003-0.41003-1-0.94c-0.04004-0.54999,0.38-1.03003,0.94-1.06l0.5-0.01001l5.03998-0.14001    l15.22998-0.39996l17.05005-0.46002l16.91998-0.45001l17.65997-0.46002l16.46002-0.43994l15.92999-0.42004l17.10007-0.45996    l16.31-0.43005L553.99127,241.96449z' />
                                        <path
                                            style='fill:none;stroke:#231E20;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:10;'
                                            d='    M580.24127,242.23451c0.03003,0.54999-0.38,1.02002-0.94,1.04999l-0.58997,0.02002l-5.06,0.13l-16.01001,0.42999    c0.17999-0.66998,0.34998-1.34003,0.53003-2.01001l15.75-0.41998l5.06995-0.13l0.19-0.01001    C579.75128,241.26454,580.2113,241.67451,580.24127,242.23451z' />
                                    </g>
                                    <g>
                                        <path
                                            style='fill:none;stroke:#231E20;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:10;'
                                            d='    M546.90131,269.49451c-0.16003,0.66998-0.33002,1.33997-0.48999,2H403.48129c-0.52002,0-0.96002-0.41003-0.99005-0.94    c-0.03998-0.54999,0.38-1.03003,0.93005-1.06H546.90131z' />
                                        <path
                                            style='fill:none;stroke:#231E20;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:10;'
                                            d='    M576.37128,270.43451c0.04004,0.54999-0.38,1.02002-0.92999,1.06H550.5213c0.16998-0.66998,0.33997-1.33002,0.51001-2h24.27997    C575.88129,269.46448,576.34131,269.88452,576.37128,270.43451z' />
                                    </g>
                                    <g>
                                        <path
                                            style='fill:none;stroke:#231E20;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:10;'
                                            d='    M569.63129,187.57454c-0.22998,0.67999-0.45996,1.38-0.69,2.08997l-7.90997,0.88l-20.69,2.31l-17.83002,1.98999l-18.65005,2.08002    l-17.01996,1.90002l-16.95001,1.89996l-18.08002,2.02002l-17.32996,1.92999l-23.70001,2.65002l-0.21002,0.01996    c-0.02997,0.01001-0.07001,0.01001-0.10999,0.01001c-0.5,0-0.92999-0.38-0.98999-0.89001    c-0.06-0.54999,0.32996-1.03998,0.88-1.09998l0.33997-0.03998L569.63129,187.57454z' />
                                        <path
                                            style='fill:none;stroke:#231E20;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:10;'
                                            d='    M588.31128,186.49452c0.06,0.54999-0.33997,1.03998-0.88,1.09998l-1.02997,0.11005v0.00995l-5.13,0.57001l-7.98999,0.89001    c0.22998-0.71002,0.45996-1.40997,0.69-2.08002l7.57996-0.84998l5.13-0.57001l0.52002-0.06    C587.75128,185.54451,588.25128,185.94453,588.31128,186.49452z' />
                                    </g>

                                    <line
                                        style='fill:none;stroke:#231E20;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:10;'
                                        x1='420.35776' y1='245.51848' x2='418.47775' y2='226.20848' />

                                    <line
                                        style='fill:none;stroke:#231E20;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:10;'
                                        x1='423.75775' y1='280.56848' x2='422.87775' y2='271.49847' />

                                    <line
                                        style='fill:none;stroke:#231E20;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:10;'
                                        x1='422.68774' y1='269.49847' x2='420.54776' y2='247.51848' />

                                    <line
                                        style='fill:none;stroke:#231E20;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:10;'
                                        x1='418.28775' y1='224.21848' x2='416.59775' y2='206.79848' />
                                    <line style='fill:none;stroke:#231E20;stroke-miterlimit:10;' x1='435.81775'
                                        y1='223.14848' x2='434.47775' y2='204.67848' />
                                    <line style='fill:none;stroke:#231E20;stroke-miterlimit:10;' x1='440.04776'
                                        y1='281.54849' x2='439.31775' y2='271.49847' />
                                    <line style='fill:none;stroke:#231E20;stroke-miterlimit:10;' x1='439.17773'
                                        y1='269.49847' x2='437.54776' y2='247.06848' />
                                    <line style='fill:none;stroke:#231E20;stroke-miterlimit:10;' x1='437.40775'
                                        y1='245.05849' x2='435.95773' y2='225.14848' />
                                    <line style='fill:none;stroke:#231E20;stroke-miterlimit:10;' x1='454.32776'
                                        y1='244.60847' x2='453.09775' y2='224.09848' />
                                    <line style='fill:none;stroke:#231E20;stroke-miterlimit:10;' x1='456.60776'
                                        y1='282.36847' x2='455.94775' y2='271.49847' />
                                    <line style='fill:none;stroke:#231E20;stroke-miterlimit:10;' x1='455.82776'
                                        y1='269.49847' x2='454.44775' y2='246.60847' />
                                    <line style='fill:none;stroke:#231E20;stroke-miterlimit:10;' x1='452.97775'
                                        y1='222.09848' x2='451.80774' y2='202.74847' />
                                    <line style='fill:none;stroke:#231E20;stroke-miterlimit:10;' x1='471.98776'
                                        y1='244.14848' x2='470.96774' y2='223.00848' />
                                    <line style='fill:none;stroke:#231E20;stroke-miterlimit:10;' x1='473.86774'
                                        y1='282.91849' x2='473.31775' y2='271.49847' />
                                    <line style='fill:none;stroke:#231E20;stroke-miterlimit:10;' x1='473.21774'
                                        y1='269.49847' x2='472.08774' y2='246.14848' />
                                    <line style='fill:none;stroke:#231E20;stroke-miterlimit:10;' x1='470.86774'
                                        y1='221.00848' x2='469.88776' y2='200.72849' />
                                    <line style='fill:none;stroke:#231E20;stroke-miterlimit:10;' x1='488.44775'
                                        y1='243.70848' x2='487.66776' y2='221.98848' />
                                    <line style='fill:none;stroke:#231E20;stroke-miterlimit:10;' x1='489.89774'
                                        y1='284.01849' x2='489.44775' y2='271.49847' />
                                    <line style='fill:none;stroke:#231E20;stroke-miterlimit:10;' x1='489.37775'
                                        y1='269.49847' x2='488.51776' y2='245.70848' />
                                    <line style='fill:none;stroke:#231E20;stroke-miterlimit:10;' x1='487.59775'
                                        y1='219.98848' x2='486.83774' y2='198.82848' />
                                    <line style='fill:none;stroke:#231E20;stroke-miterlimit:10;' x1='504.37775'
                                        y1='243.28848' x2='504.12775' y2='220.97849' />
                                    <line style='fill:none;stroke:#231E20;stroke-miterlimit:10;' x1='504.82776'
                                        y1='284.01849' x2='504.68774' y2='271.49847' />
                                    <line style='fill:none;stroke:#231E20;stroke-miterlimit:10;' x1='504.66776'
                                        y1='269.49847' x2='504.39774' y2='245.27849' />
                                    <line style='fill:none;stroke:#231E20;stroke-miterlimit:10;' x1='504.10776'
                                        y1='218.97849' x2='503.85776' y2='196.48848' />
                                    <line style='fill:none;stroke:#231E20;stroke-miterlimit:10;' x1='521.96777'
                                        y1='219.88847' x2='521.47772' y2='242.82848' />
                                    <polyline style='fill:none;stroke:#231E20;stroke-miterlimit:10;'
                                        points='520.55774,285.76849 520.55774,285.54849    520.86774,271.49847  ' />
                                    <line style='fill:none;stroke:#231E20;stroke-miterlimit:10;' x1='521.43774'
                                        y1='244.82848' x2='520.90778' y2='269.49847' />
                                    <line style='fill:none;stroke:#231E20;stroke-miterlimit:10;' x1='522.50775'
                                        y1='194.84848' x2='522.01776' y2='217.88847' />

                                    <line
                                        style='fill:none;stroke:#231E20;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:10;'
                                        x1='538.99774' y1='218.84848' x2='537.78772' y2='242.39848' />

                                    <line
                                        style='fill:none;stroke:#231E20;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:10;'
                                        x1='536.28772' y1='271.49847' x2='535.52777' y2='286.28848' />

                                    <line
                                        style='fill:none;stroke:#231E20;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:10;'
                                        x1='537.68774' y1='244.39848' x2='536.38776' y2='269.49847' />

                                    <line
                                        style='fill:none;stroke:#231E20;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:10;'
                                        x1='540.33777' y1='192.85847' x2='539.10773' y2='216.83849' />

                                    <line
                                        style='fill:none;stroke:#231E20;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:10;'
                                        x1='558.32776' y1='217.66849' x2='557.04773' y2='230.52849' />

                                    <line
                                        style='fill:none;stroke:#231E20;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:10;'
                                        x1='552.96777' y1='271.49847' x2='551.41772' y2='287.07849' />

                                    <line
                                        style='fill:none;stroke:#231E20;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:10;'
                                        x1='554.53772' y1='255.72849' x2='553.16772' y2='269.49847' />

                                    <line
                                        style='fill:none;stroke:#231E20;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:10;'
                                        x1='561.02777' y1='190.54848' x2='558.52777' y2='215.65848' />
                                    <path style='fill:var(--primary-color);'
                                        d='M391.33112,208.17146l0.24106,3.8566c0.02255,0.36098,0.33838,0.63228,0.69864,0.60013   l17.57529-1.66251c0.60953-0.05438,1.06839-0.57863,1.0416-1.18997l-0.28641-6.53503c-0.02911-0.664-0.61584-1.16364-1.276-1.08658   l-14.48151,1.81377C392.74197,204.21318,391.19913,206.05952,391.33112,208.17146z' />
                                    <g>
                                        <path
                                            style='fill:none;stroke:#231E20;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:10;'
                                            d='    M592.10132,162.81453c-3.59003,2.47998-8.84003,6.33997-11.92999,9.64001c-1.41003,1.5-3.57001,6.79999-6.20001,14.63995    c-0.23004,0.67004-0.46002,1.37-0.69,2.08002c-2.35004,7.15002-5.02002,16.09998-7.84003,26.06    c-0.19,0.66998-0.38,1.34998-0.57001,2.03003c-2.17999,7.75995-4.44,16.07996-6.69995,24.58997    c-0.18005,0.66998-0.35004,1.34003-0.53003,2.01001c-1.03998,3.91998-2.07001,7.88-3.09003,11.83002    c0,0.01001-0.00995,0.01996-0.00995,0.02997c-1.19,4.60997-2.36005,9.22002-3.51001,13.77    c-0.17004,0.66998-0.34003,1.33002-0.51001,2c-1.32001,5.23999-2.59998,10.38-3.82001,15.34998    c-0.40997,1.67004-0.81,3.32001-1.21002,4.95001c-0.44,1.83002-0.95996,3.90002-1.44,5.84003    c-0.21997,0.89996-0.44,1.77997-0.62994,2.57996c-0.04004,0.15002-0.09003,0.29004-0.16003,0.42004    c-0.33002,0.69-1.02997,1.12-1.78998,1.12c-0.15002,0-0.31-0.02002-0.47003-0.06c-0.59998-0.14001-1.07001-0.54004-1.32001-1.06    c-0.19995-0.40002-0.25995-0.88-0.14996-1.35004c0.09998-0.39996,0.23999-0.96997,0.40997-1.64996    c0.38-1.56,0.92999-3.73004,1.48004-6.05005c0.37-1.47998,0.77997-3.13995,1.21997-4.94995    c1.04999-4.29004,2.33002-9.42999,3.77002-15.14001c0.15997-0.66003,0.32996-1.33002,0.48999-2    c1.96997-7.78998,4.20001-16.53001,6.57001-25.52c0.16998-0.66998,0.34998-1.33997,0.51996-2.01001    c1-3.78998,2.02002-7.62,3.06-11.42999v-0.01001c1.18005-4.38995,2.38-8.73999,3.58002-13    c0.19-0.67999,0.38-1.35999,0.57001-2.02997c2.67999-9.5,5.32001-18.41003,7.73999-25.83002    c0.23004-0.70996,0.46002-1.40997,0.69-2.08997c3.09003-9.26001,5.77002-15.88,7.62-17.86005    c3.70001-3.94,9.96002-8.42999,13.64001-10.91998' />
                                        <path
                                            style='fill:none;stroke:#231E20;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:10;'
                                            d='M590.8913,158.79451    c1.64001-1.10999,2.76001-1.83002,2.90002-1.91998c0.92999-0.59003,2.16998-0.32001,2.75995,0.60999    c0.59003,0.94,0.32001,2.16998-0.62,2.77002c-0.03998,0.01996-1.62,1.02997-3.82996,2.56' />
                                    </g>
                                    <path
                                        style='fill:none;stroke:#231E20;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:10;'
                                        d='M539.68127,300.63452   h-73.11002c-0.83002,0-1.5-0.67004-1.5-1.5c0-0.82001,0.66998-1.5,1.5-1.5h73.37003c-0.16998,0.67999-0.31,1.25-0.40997,1.64996   C539.42133,299.75452,539.48132,300.2345,539.68127,300.63452z' />

                                    <line
                                        style='fill:none;stroke:#231E20;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:10;'
                                        x1='564.49146' y1='332.45975' x2='555.80145' y2='332.40976' />

                                    <line
                                        style='fill:none;stroke:#231E20;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:10;'
                                        x1='563.49146' y1='329.44974' x2='554.94147' y2='329.39975' />
                                    <path
                                        style='fill:none;stroke:#231E20;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:10;'
                                        d='M417.51361,330.16882   c0,0.82489,0.66605,1.49496,1.49091,1.5l147.0769,0.80093c3.43005-0.02002,6.49005-1.80002,8.21002-4.79001   c1.72998-3.01999,1.70001-6.62-0.08997-9.60999l-9.14154-15.37479c-1.85999-3.12-5.26996-5.06-8.89996-5.06h-1.61005h-10.5   c-0.21997,0.89999-0.44,1.78-0.63,2.57999c-0.03998,0.15002-0.08997,0.29001-0.15997,0.42001h12.90002   c2.57996,0,5.00995,1.38,6.32996,3.59l9.13153,15.38477c1.22998,2.05002,1.25,4.51001,0.06,6.58002   c-1.19,2.06998-3.32001,3.28-5.71002,3.28v-0.01001l-146.94879-0.79092   C418.1907,328.66382,417.51361,329.33685,417.51361,330.16882L417.51361,330.16882z' />
                                    <path
                                        style='fill:none;stroke:#231E20;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:10;'
                                        d='M422.27145,323.39975   ' />

                                    <line
                                        style='fill:none;stroke:#231E20;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:10;'
                                        x1='555.60083' y1='292.39447' x2='554.55164' y2='297.63452' />

                                    <line
                                        style='fill:none;stroke:#231E20;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:10;'
                                        x1='493.2348' y1='289.19229' x2='493.2348' y2='297.63452' />

                                    <line
                                        style='fill:none;stroke:#231E20;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:10;'
                                        x1='478.84119' y1='288.47775' x2='482.6832' y2='297.63452' />

                                    <line
                                        style='fill:none;stroke:#231E20;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:10;'
                                        x1='481.89868' y1='288.62952' x2='483.64038' y2='293.41342' />
                                    <g>
                                        <g>
                                            <g>
                                                <path
                                                    style='fill:none;stroke:#231E20;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:10;'
                                                    d='      M466.89511,345.68201c0,6.9985-5.67603,12.67453-12.68277,12.67453c-6.99854,0-12.67453-5.67603-12.67453-12.67453      c0-5.33926,3.30212-9.90637,7.9678-11.771v11.04813c0,2.60388,2.11105,4.71497,4.70673,4.71497      c2.60388,0,4.71497-2.11108,4.71497-4.71497v-11.03992C463.59296,335.78387,466.89511,340.34274,466.89511,345.68201z' />
                                                <path
                                                    style='fill:none;stroke:#231E20;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:10;'
                                                    d='      M461.41623,345.68201c0,3.97565-3.22,7.20389-7.20389,7.20389c-3.97571,0-7.19568-3.22824-7.19568-7.20389      c0-2.17679,0.96106-4.12357,2.48895-5.44604v4.72318c0,2.60388,2.11105,4.71497,4.70673,4.71497      c2.60388,0,4.71497-2.11108,4.71497-4.71497v-4.72318C460.45514,341.55844,461.41623,343.50522,461.41623,345.68201z' />
                                                <path
                                                    style='fill:none;stroke:#231E20;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:10;'
                                                    d='      M458.92731,331.8739v13.08524c0,2.60388-2.11108,4.71497-4.71497,4.71497c-2.59567,0-4.70673-2.11108-4.70673-4.71497V331.8739      H458.92731z' />

                                                <circle
                                                    style='fill:none;stroke:#231E20;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:10;'
                                                    cx='454.21634' cy='344.66516' r='1.86308' />
                                            </g>

                                            <line
                                                style='fill:none;stroke:#231E20;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:10;'
                                                x1='451.43414' y1='332.07739' x2='451.43414' y2='337.30588' />
                                        </g>
                                        <g>
                                            <g>
                                                <path
                                                    style='fill:none;stroke:#231E20;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:10;'
                                                    d='      M459.5231,331.87802h6.60004c0.57001,1.39001,0.88995,2.89996,0.88995,4.5c0,1.64499-0.33374,3.21249-0.93716,4.63843' />
                                                <path
                                                    style='fill:none;stroke:#231E20;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:10;'
                                                    d='      M443.45706,338.97424c-0.18588-0.83585-0.28394-1.70465-0.28394-2.59622c0-1.59003,0.31-3.10999,0.89001-4.5h6.59998' />
                                                <path
                                                    style='fill:none;stroke:#231E20;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:10;'
                                                    d='      M460.13309,331.87802c0.86719,0.95468,1.44955,2.14352,1.65143,3.46078' />
                                                <path
                                                    style='fill:none;stroke:#231E20;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:10;'
                                                    d='      M448.68567,334.19424c0.19949-0.58017,0.47665-1.12476,0.81992-1.62274' />

                                                <circle
                                                    style='fill:none;stroke:#231E20;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:10;'
                                                    cx='455.09528' cy='335.42349' r='1.75129' />
                                            </g>
                                        </g>
                                    </g>
                                    <g>
                                        <g>
                                            <g>
                                                <path
                                                    style='fill:none;stroke:#231E20;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:10;'
                                                    d='      M525.68494,346.15439c0,6.99854,5.67596,12.67453,12.68274,12.67453c6.99854,0,12.67456-5.67599,12.67456-12.67453      c0-5.33923-3.30212-9.90634-7.96783-11.771v11.04813c0,2.60391-2.11102,4.71497-4.70673,4.71497      c-2.60388,0-4.71497-2.11105-4.71497-4.71497V334.3916C528.98706,336.25626,525.68494,340.81516,525.68494,346.15439z' />
                                                <path
                                                    style='fill:none;stroke:#231E20;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:10;'
                                                    d='      M531.16382,346.15439c0,3.97565,3.21997,7.20389,7.20386,7.20389c3.97571,0,7.19568-3.22824,7.19568-7.20389      c0-2.17679-0.96106-4.12357-2.48895-5.44604v4.72318c0,2.60391-2.11102,4.71497-4.70673,4.71497      c-2.60388,0-4.71497-2.11105-4.71497-4.71497v-4.72318C532.12488,342.03082,531.16382,343.9776,531.16382,346.15439z' />
                                                <path
                                                    style='fill:none;stroke:#231E20;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:10;'
                                                    d='      M533.65271,332.34628v13.08524c0,2.60391,2.11108,4.71497,4.71497,4.71497c2.5957,0,4.70673-2.11105,4.70673-4.71497v-13.08524      H533.65271z' />

                                                <circle
                                                    style='fill:none;stroke:#231E20;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:10;'
                                                    cx='538.36365' cy='345.13754' r='1.86308' />
                                            </g>

                                            <line
                                                style='fill:none;stroke:#231E20;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:10;'
                                                x1='541.14587' y1='332.5498' x2='541.14587' y2='337.77826' />
                                        </g>
                                        <g>
                                            <g>
                                                <path
                                                    style='fill:none;stroke:#231E20;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:10;'
                                                    d='      M533.05688,332.3504h-6.60004c-0.57001,1.39001-0.88995,2.89996-0.88995,4.5c0,1.64502,0.33374,3.21249,0.93719,4.63846' />
                                                <path
                                                    style='fill:none;stroke:#231E20;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:10;'
                                                    d='      M549.12299,339.44666c0.18585-0.83585,0.28387-1.70468,0.28387-2.59625c0-1.59003-0.31-3.10999-0.89001-4.5h-6.59998' />
                                                <path
                                                    style='fill:none;stroke:#231E20;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:10;'
                                                    d='      M532.4469,332.3504c-0.86719,0.95468-1.44952,2.14352-1.65137,3.46078' />
                                                <path
                                                    style='fill:none;stroke:#231E20;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:10;'
                                                    d='      M543.89435,334.66663c-0.19946-0.58014-0.47662-1.12476-0.81995-1.62271' />

                                                <circle
                                                    style='fill:none;stroke:#231E20;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:10;'
                                                    cx='537.48474' cy='335.89587' r='1.75129' />
                                            </g>
                                        </g>
                                    </g>
                                    <path style='fill:var(--primary-color);'
                                        d='M626.92682,161.11452l-30.80005,10.27002c-0.83997,0.27997-1.73999-0.19-2-1.03003l-0.13995-0.46002   l-1.58002-5.25995l-0.54999-1.82001l-1.21002-4.02002l-0.23999-0.79999c-0.23999-0.81,0.20001-1.66003,1-1.94l30.29999-10.38   c0.87-0.29999,1.76001-0.44,2.64001-0.44c3.23999,0,6.28998,1.94,7.56,5.10999   C633.6568,154.70454,631.37677,159.63454,626.92682,161.11452z' />
                                    <path style='fill:var(--primary-color);'
                                        d='M626.92682,161.11452l-30.80005,10.27002c-0.83997,0.27997-1.73999-0.19-2-1.03003l-0.13995-0.46002   l-1.58002-5.25995l-0.54999-1.82001l-1.21002-4.02002l-0.23999-0.79999c-0.23999-0.81,0.20001-1.66003,1-1.94l30.29999-10.38   c0.87-0.29999,1.76001-0.44,2.64001-0.44c3.23999,0,6.28998,1.94,7.56,5.10999   C633.6568,154.70454,631.37677,159.63454,626.92682,161.11452z' />

                                    <line
                                        style='fill:none;stroke:#231E20;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:10;'
                                        x1='484.47742' y1='296.0242' x2='485.04343' y2='297.63452' />
                                    <path
                                        style='fill:none;stroke:#231E20;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:10;'
                                        d='M553.16772,292.39447   ' />

                                    <line
                                        style='fill:none;stroke:#231E20;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:10;'
                                        x1='400.4169' y1='358.82892' x2='595.29785' y2='358.82892' />

                                    <line
                                        style='fill:none;stroke:#231E20;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:10;'
                                        x1='395.75784' y1='358.82892' x2='392.56342' y2='358.82892' />

                                    <line
                                        style='fill:none;stroke:#231E20;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:10;'
                                        x1='388.22473' y1='358.82892' x2='379.01715' y2='358.82892' />

                                    <line
                                        style='fill:none;stroke:#231E20;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:10;'
                                        x1='441.6759' y1='365.00851' x2='497.82513' y2='365.00851' />

                                    <line
                                        style='fill:none;stroke:#231E20;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:10;'
                                        x1='504.02139' y1='365.00851' x2='508.19229' y2='365.00851' />

                                    <line
                                        style='fill:none;stroke:#231E20;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:10;'
                                        x1='599.55939' y1='358.82892' x2='603.45471' y2='358.82892' />

                                    <line
                                        style='fill:none;stroke:#231E20;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:10;'
                                        x1='590.49744' y1='365.00851' x2='561.02606' y2='365.00851' />

                                    <line
                                        style='fill:none;stroke:#231E20;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:10;'
                                        x1='556.94989' y1='365.00851' x2='553.67682' y2='365.00851' />
                                </g>
                                <line
                                    style='fill:none;stroke:var(--primary-light-color);stroke-width:3;stroke-miterlimit:10;'
                                    x1='481.34891' y1='130.56758' x2='482.13342' y2='151.48729' />
                                <line
                                    style='fill:none;stroke:var(--primary-light-color);stroke-width:3;stroke-miterlimit:10;'
                                    x1='528.0592' y1='134.85736' x2='516.96979' y2='153.63275' />
                                <line
                                    style='fill:none;stroke:var(--primary-light-color);stroke-width:3;stroke-miterlimit:10;'
                                    x1='437.30722' y1='137.69902' x2='450.04968' y2='155.72818' />
                            </svg>
                            <span>Không có sản phẩm nào trong giỏ hàng của bạn</span>
                        </div>";
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
                        <button <?php echo count($cart) == 0 ? "disabled" : ""; ?> class="checkout-btn">Đặt Hàng</button>
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