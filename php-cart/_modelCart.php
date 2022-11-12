<?php

function add($id, $quantity)
{
    if (isset($_COOKIE['cart'])) {
        $cart = json_decode($_COOKIE['cart'], true);
        if (!isset($cart[$id])) {
            $cart[$id] = $quantity;
        } else {
            $cart[$id] += $quantity;
        }

        setcookie('cart', '', time() - 1);
        setcookie('cart', json_encode($cart), time() + 86400);
    }
}

function remove($id)
{
    if (isset($_COOKIE['cart'])) {
        $cart = json_decode($_COOKIE['cart'], true);

        unset($cart[$id]);

        setcookie('cart', '', time() - 1);
        setcookie('cart', json_encode($cart), time() + 86400);
    }
};

function update($id, $quantity)
{
    if (isset($_COOKIE['cart'])) {
        $cart = json_decode($_COOKIE['cart'], true);

        $cart[$id]['quantity'] = $quantity;

        setcookie('cart', '', time() - 1);
        setcookie('cart', json_encode($cart), time() + 86400);
    }
}
