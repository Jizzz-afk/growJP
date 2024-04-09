<?php
session_start();

if(isset($_GET['id']) && !empty($_GET['id'])) {
    $product_id = $_GET['id'];

    // Menambahkan produk ke session keranjang
    if(isset($_SESSION['cart'][$product_id])) {
        $_SESSION['cart'][$product_id]++;
    } else {
        $_SESSION['cart'][$product_id] = 1;
    }
}

header('Location: cart.php');
exit;
?>
