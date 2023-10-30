<?php
session_start();

if (isset($_GET['action'])) {
    $action = $_GET['action'];
    $index = $_GET['index'];

    if ($action === 'increase') {
        $_SESSION['cart'][$index]['quantity']++;
    } elseif ($action === 'decrease') {
        if ($_SESSION['cart'][$index]['quantity'] > 1) {
            $_SESSION['cart'][$index]['quantity']--;
        }
    } elseif ($action === 'remove') {
        unset($_SESSION['cart'][$index]);
        $_SESSION['cart'] = array_values($_SESSION['cart']); // Re-index the array
    }

    // Redirect back to the cart display page
    header('Location: cart.php');
}
?>