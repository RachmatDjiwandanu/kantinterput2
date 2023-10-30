<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Shopping Cart</title>
</head>
<body>
    <h1>Your Shopping Cart</h1>
    <?php
    if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
        echo '<table>';
        echo '<tr><th>Product Name</th><th>Quantity</th><th>Price</th><th>Total</th><th>Actions</th></tr>';

        foreach ($_SESSION['cart'] as $index => $item) {
            echo '<tr>';
            echo '<td>' . $item['product_name'] . '</td>';
            echo '<td>';
            echo '<a href="update_cart.php?action=decrease&index=' . $index . '">-</a>';
            echo $item['quantity'];
            echo '<a href="update_cart.php?action=increase&index=' . $index . '">+</a>';
            echo '</td>';
            echo '<td>$' . $item['price'] . '</td>';
            echo '<td>$' . ($item['price'] * $item['quantity']) . '</td>';
            echo '<td><a href="update_cart.php?action=remove&index=' . $index . '">Remove</a></td>';
            echo '</tr>';
        }

        echo '</table>';
    } else {
        echo '<p>Your cart is empty.</p>';
    }
    ?>
    <!-- Add a button to continue shopping or proceed to checkout -->
    <a href="index.php">Continue Shopping</a> |
    <a href="checkout.php">Proceed to Checkout</a>
</body>
</html>