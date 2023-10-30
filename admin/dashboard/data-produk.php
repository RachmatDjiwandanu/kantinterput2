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
                                            <th>No</th>
                                            <th>Nama Produk</th>
                                            <th>Kategori</th>
                                            <th>Gambar</th>
                                            <th>Tanggal Input</th>
                                            <th>User Input</th>
                                            <th>Tanggal Update</th>
                                            <th>User Update</th>
                                            <th>Id User</th>
                                            <th>Change</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Produk</th>
                                            <th>Kategori</th>
                                            <th>Gambar</th>
                                            <th>Tanggal Input</th>
                                            <th>User Input</th>
                                            <th>Tanggal Update</th>
                                            <th>User Update</th>
                                            <th>Id User</th>
                                            <th>Change</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php
                                            require_once("conn.php");
                                            $no = 1;
                                            $query = "SELECT * FROM produk AS j 
                                            INNER JOIN user AS u ON j.id_user = u.id_user
                                            INNER JOIN gambar AS t ON j.id_gambar = t.id_gambar;";

                                            $stmt = $conn->query($query);

                                            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                        ?>
                                        <tr>
                                            <td><?= $no++; ?></td>
                                            <td><?= $row['nama_produk']; ?></td>
                                            <td><?= $row['kategori']; ?></td>
                                            <td class="w-25">
                                                <img src="<?php echo str_replace($_SERVER['DOCUMENT_ROOT'], '', $row['gambarPath']); ?>" alt="Image Description" class="img-fluid custom-img ">
                                            </td>
                                            <td><?= $row['tgl_input']; ?></td>
                                            <td><?= $row['nama']; ?></td>
                                            <td><?= $row['tgl_update']; ?></td>
                                            <td><?= $row['user_update']; ?></td>
                                            <td><?= $row['id_user']; ?></td>
                                            <td>
                                                <div class="d-grid gap-2" role="group" aria-label="First group">
                                                    <a class="btn btn-warning btn-sm" type="button" href="data-produk-update.php?id_produk=<?= $row['id_produk']; ?>"><i class="fa-solid fa-pen-to-square"></i></a>
                                                    <a class="btn btn-danger btn-sm" type="button" onclick="return confirm('Data akan di Hapus?')" href="data-produk-delete.php?id_produk=<?= $row['id_produk']; ?>"><i class="fa-solid fa-trash"></i></a>
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