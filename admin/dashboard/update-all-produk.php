<?php
require_once("conn.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['aktifasi'])) {
    $aktifasiValue = $_POST['aktifasi'];

    // Update the aktifasi value for all products
    $query = "UPDATE jual SET aktifasi = :aktifasiValue";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':aktifasiValue', $aktifasiValue, PDO::PARAM_INT);

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
} else {
    // Invalid request
    $response['success'] = false;
    $response['message'] = 'Invalid request';
    header('Content-Type: application/json');
    echo json_encode($response);
    exit;
}
?>