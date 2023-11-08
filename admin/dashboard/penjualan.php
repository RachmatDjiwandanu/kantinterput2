<!DOCTYPE html>
<html lang="en">
    <head>
        <style>
        /* Custom CSS to limit the pixel size */
        .custom-img {
            max-width: 300px; /* Set the maximum width you want */
            max-height: 200px; /* Set the maximum height you want */
            margin: auto;    
            display: block;
        }
        </style>
    <?php include 'header.php' ?>
    </head>
    <body class="sb-nav-fixed">
        <?php include 'navbar.php' ?>
            <div id="layoutSidenav_content">
            <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Tables</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                            <li class="breadcrumb-item active">Data User</li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                DataTable Example
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>Id Jual</th>
                                            <th>Nama Produk</th>
                                            <th>Kategori</th>
                                            <th>Gambar</th>
                                            <th>Harga</th>
                                            <th>Aktifasi</th>
                                            <th>Tanggal Update</th>
                                            <th>User Update</th>
                                            <th>Change</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Id Jual</th>
                                            <th>Nama Produk</th>
                                            <th>Kategori</th>
                                            <th>Gambar</th>
                                            <th>Harga</th>
                                            <th>Aktifasi</th>
                                            <th>Tanggal Update</th>
                                            <th>User Update</th>
                                            <th>Change</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php
                                            require_once("conn.php");
                                            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                                                // Handle the POST request to update "aktifasi"
                                                if (isset($_POST['id_jual'])) {
                                                    $productId = $_POST['id_jual'];
                                                    $response = array();
                                            
                                                    // Update the aktifasi value for the specified product
                                                    $query = "UPDATE jual SET aktifasi = IF(aktifasi = 1, 0, 1) WHERE id_jual = :id_jual";
                                                    $stmt = $conn->prepare($query);
                                                    $stmt->bindParam(':id_jual', $productId, PDO::PARAM_INT);
                                            
                                                    if ($stmt->execute()) {
                                                        $response['success'] = true;
                                                        $response['aktifasi'] = $stmt->fetch(PDO::FETCH_COLUMN);
                                                    } else {
                                                        $response['success'] = false;
                                                    }
                                            
                                                    // Send a JSON response
                                                    header('Content-Type: application/json');
                                                    echo json_encode($response);
                                                    exit;
                                                }
                                            }
                                            
                                            $no = 1;
                                            $query = "SELECT j.*, u.nama_produk, u.kategori, t.gambarPath 
                                            FROM jual AS j
                                            INNER JOIN produk AS u ON j.id_produk = u.id_produk
                                            INNER JOIN gambar AS t ON j.id_gambar = t.id_gambar";

                                            $stmt3 = $conn->query($query);

                                            while ($row = $stmt3->fetch(PDO::FETCH_ASSOC)) {
                                        ?>
                                        
                                        <tr>
                                            <td><?= $row['id_jual']; ?></td>
                                            <td><?= $row['nama_produk']; ?></td>
                                            <td><?= $row['kategori']; ?></td>
                                            <td class="w-25">
                                                <img src="<?php echo str_replace($_SERVER['DOCUMENT_ROOT'], '', $row['gambarPath']); ?>" alt="Image Description" class="img-fluid custom-img ">
                                            </td>
                                            <td><?= $row['harga']; ?></td>
                                            <td><?= $row['aktifasi'] == 0 ? 'Tidak Aktif' : 'Aktif'; ?></td>
                                            <td><?= $row['tgl_update'] ? $row['tgl_update'] : 'N/A'; ?></td>
                                            <td><?= $row['user_update'] ? $row['user_update'] : 'N/A';  ?></td>
                                            <td>
                                                <div class="d-grid gap-2" role="group" aria-label="First group">
                                                    <a type="button" class="btn btn-success btn-sm" href="penjualan-config.php?id_jual=<?= $row['id_jual']; ?>"><i class="fa-solid fa-gear" style="color: #ffffff;"></i></a>
                                                    <a type="button" class="btn toggle-aktifasi btn-sm <?= $row['aktifasi'] == 1 ? 'btn-success' : 'btn-danger'; ?>" onclick="toggleAktifasi(<?= $row['id_jual']; ?>, this); refreshPage();">
                                                        <i id="aktifasi-icon" class="fa-solid <?= $row['aktifasi'] == 1 ? 'fa-eye' : 'fa-eye-slash'; ?>" style="color: #ffffff;"></i>
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php
                                        }
                                    ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </main>
                <?php include 'footer.php' ?>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
        <script>
            function toggleAktifasi(productId, button) {
                // Send an AJAX request to update the "aktifasi" value
                const xhr = new XMLHttpRequest();
                xhr.open('POST', 'penjualan.php', true);
                xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
                xhr.onload = function () {
                    if (xhr.status === 200) {
                        const response = JSON.parse(xhr.responseText);
                        if (response.success) {
                            // Update the button and UI based on the response
                            button.classList.remove('btn-success', 'btn-danger');
                            button.classList.add(response.aktifasi === 1 ? 'btn-success' : 'btn-danger');
                            window.location.reload();
                            // Reload the page
                        } else {
                            console.error('Failed to update aktifasi');
                        }
                    }
                };

                // Send the product ID as POST data
                xhr.send('id_jual=' + productId);
            }
            function refreshPage() {
                window.location.reload();
            }
        </script>
    </body>
</html>