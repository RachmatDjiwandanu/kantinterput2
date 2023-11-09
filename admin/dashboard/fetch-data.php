<?php
// fetch_data.php
require_once("conn.php");

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id_jual'])) {
    $id_jual = $_GET['id_jual'];

    // Fetch data based on the product ID
    $query = "SELECT j.*, u.nama_produk, u.kategori, t.gambarPath 
    FROM jual AS j
    INNER JOIN produk AS u ON j.id_produk = u.id_produk
    INNER JOIN gambar AS t ON j.id_gambar = t.id_gambar
    WHERE id_jual = :id_jual";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':id_jual', $id_jual, PDO::PARAM_INT);

    if ($stmt->execute()) {
        $data = $stmt->fetch(PDO::FETCH_ASSOC);
        header('Content-Type: application/json');
        echo json_encode($data);
        exit;
    } else {
        header('HTTP/1.1 500 Internal Server Error');
        exit;
    }
}
?>