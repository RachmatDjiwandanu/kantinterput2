<?php
session_start();
require_once("conn.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id_jual'])) {
    $id_jual = $_POST['id_jual'];
    $harga = $_POST['harga']; // Update with the actual field name
    $tgl_update = date("Y-m-d");
    $user_update = $_SESSION['nama'];

    // Update the data in the database
    $query = "UPDATE jual SET harga = :harga, tgl_update = :tgl_update, user_update = :user_update WHERE id_jual = :id_jual";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':id_jual', $id_jual, PDO::PARAM_INT);
    $stmt->bindParam(':harga', $harga, PDO::PARAM_STR); // Update with the actual field type
    $stmt->bindParam(':tgl_update', $tgl_update);
    $stmt->bindParam(':user_update', $user_update);

    $response = array();

    if ($stmt->execute()) {
        $response['success'] = true;
    } else {
        $response['success'] = false;
    }

    // Send a JSON response
    header('Content-Type: application/json');
    echo json_encode($response);
    exit;
}
?>