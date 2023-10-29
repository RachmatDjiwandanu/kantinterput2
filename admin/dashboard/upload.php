<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $uploadedFile = $_FILES["gambar"];
    require_once("conn.php");
    if ($uploadedFile["error"] === UPLOAD_ERR_OK) {
        $gambarNama = $uploadedFile["name"];
        $gambarPath = $_SERVER['DOCUMENT_ROOT'] . "/image/" . $gambarNama;

        if (move_uploaded_file($uploadedFile["tmp_name"], $gambarPath)) {
            try {
                $sql = "INSERT INTO Gambar (GambarNama, GambarPath) VALUES (?, ?)";
                $stmt = $conn->prepare($sql);
                $stmt->execute([$gambarNama, $gambarPath]);

                echo "Gambar berhasil diunggah dan disimpan di basis data.";
            } catch (PDOException $e) {
                echo "Koneksi atau operasi basis data gagal: " . $e->getMessage();
            }
        } else {
            echo "Gagal mengunggah gambar ke server.";
        }
    } else {
        echo "Terjadi kesalahan saat mengunggah gambar.";
    }
}
?>