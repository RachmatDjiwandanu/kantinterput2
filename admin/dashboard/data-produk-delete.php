<?php
require_once("conn.php");
$id_produk = $_GET["id_produk"]; // Get the id_produk you want to delete

try {
    $conn->beginTransaction(); // Start a database transaction

    // Delete from the table with the foreign key reference
    $query1 = "DELETE FROM jual WHERE id_produk = :id_produk";
    $stmt1 = $conn->prepare($query1);
    $stmt1->bindParam(':id_produk', $id_produk, PDO::PARAM_INT);
    $stmt1->execute();

    // Delete from the primary table
    $query2 = "DELETE FROM produk WHERE id_produk = :id_produk";
    $stmt2 = $conn->prepare($query2);
    $stmt2->bindParam(':id_produk', $id_produk, PDO::PARAM_INT);
    $stmt2->execute();

    $conn->commit(); // Commit the transaction

    // Check if both deletes were successful
    if ($stmt1->rowCount() > 0 && $stmt2->rowCount() > 0) {
        echo "<script>alert('Data berhasil dihapus.');window.location='data-produk.php';</script>";
    } else {
        echo "<script>alert('Gagal menghapus data.');window.location='data-produk.php';</script>";
    }
} catch (PDOException $e) {
    $conn->rollBack(); // Roll back the transaction if there was an error
    echo "Error: " . $e->getMessage();
}
?>