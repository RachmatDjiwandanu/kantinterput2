<?php
session_start();

if (isset($_SESSION['cart'])) {
    $last_activity = $_SESSION['last_activity'] ?? 0;
    $current_time = time();
    $cleanup_interval = 900; // 15 minutes in seconds

    if ($current_time - $last_activity > $cleanup_interval) {
        unset($_SESSION['cart']);
        unset($_SESSION['last_activity']);
    }
}
?>