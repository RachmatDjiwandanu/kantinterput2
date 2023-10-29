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
                                            <th>Id Produk</th>
                                            <th>Nama Produk</th>
                                            <th>Kategori</th>
                                            <th>Gambar</th>
                                            <th>Harga</th>
                                            <th>Stock</th>
                                            <th>Total Stock</th>
                                            <th>Penjualan</th>
                                            <th>Tanggal Update</th>
                                            <th>User Update</th>
                                            <th>Change</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Id Produk</th>
                                            <th>Nama Produk</th>
                                            <th>Kategori</th>
                                            <th>Gambar</th>
                                            <th>Harga</th>
                                            <th>Stock</th>
                                            <th>Total Stock</th>
                                            <th>Aktifasi</th>
                                            <th>Tanggal Update</th>
                                            <th>User Update</th>
                                            <th>Change</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php
                                            require_once("conn.php");
                                            $no = 1;
                                            $query = "SELECT * FROM jual AS j 
                                            INNER JOIN produk AS u ON j.id_produk = u.id_produk
                                            INNER JOIN gambar AS t ON j.id_gambar = t.id_gambar;";

                                            $stmt = $conn->query($query);

                                            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                        ?>
                                        <tr>
                                            <td><?= $row['id_produk']; ?></td>
                                            <td><?= $row['nama_produk']; ?></td>
                                            <td><?= $row['kategori']; ?></td>
                                            <td class="w-25">
                                                <img src="<?php echo str_replace($_SERVER['DOCUMENT_ROOT'], '', $row['gambarPath']); ?>" alt="Image Description" class="img-fluid custom-img ">
                                            </td>
                                            <td><?= $row['harga']; ?></td>
                                            <td><?= $row['stock']; ?></td>
                                            <td><?= $row['total_barang']; ?></td>
                                            <td><?= $row['aktifasi']; ?></td>
                                            <td><?= $row['tgl_update']; ?></td>
                                            <td><?= $row['user_update']; ?></td>
                                            <td>
                                                <div class="d-grid gap-2" role="group" aria-label="First group">
                                                    <a type="button" class="btn btn-success btn-sm" href="penjualan-config.php?id_jual=<?= $row['id_jual']; ?>"><i class="fa-solid fa-gear" style="color: #ffffff;"></i></a>
                                                    <a type="button" class="btn btn-info btn-sm" href="edit-user.php?id_user=<?= $row['id_user']; ?>"><i class="fa-solid fa-eye" style="color: #ffffff;"></i></a>
                                                    <a type="button" class="btn btn-danger btn-sm"><i class="fa-solid fa-eye-slash" style="color: #ffffff;"></i></a>
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
    </body>
</html>