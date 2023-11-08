<?php
if (isset($_GET['id_jual'])) {
    $productId = $_GET['id_jual'];

    // Include your database connection code here
    require_once("conn.php");

    // Update the aktifasi value for the specified product
    $query = "UPDATE jual SET aktifasi = IF(aktifasi = 1, 0, 1) WHERE id_jual = :id_jual";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':id_jual', $productId, PDO::PARAM_INT);

    if ($stmt->execute()) {
        // You can add a success message here if needed
        echo "Aktifasi updated successfully.";
        // Use JavaScript to refresh the page after a delay
        echo "<script>setTimeout(function() { window.location.href = 'penjualan.php'; }, 1000);</script>";
    } else {
        // You can add an error message here if the update fails
        echo "Failed to update Aktifasi.";
    }

    // Close the database connection
    $conn = null;
} else {
    // Handle the case where id_jual is not provided in the query string
    echo "Product ID (id_jual) is missing.";
}
?>
