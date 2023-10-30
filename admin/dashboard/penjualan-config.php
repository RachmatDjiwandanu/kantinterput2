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
                            <div class="container px-5 admin">
                                        <?php
                                            require_once("conn.php");


                                            if (isset($_POST['simpan'])) {
                                                // Retrieve data from the form
                                                $id_jual = $_POST['id_jual'];
                                                $harga = $_POST['harga'];
                                                $aktifasi = $_POST['aktifasi'];
                                                
                                                // Set other variables like tgl_update and user_update
                                                $tgl_update = date("Y-m-d");
                                                $user_update = $_SESSION['nama'];
                                            
                                                // Use a prepared statement to update the database
                                                $sql = 'UPDATE jual SET harga = :harga, aktifasi = :aktifasi, tgl_update = :tgl_update, user_update = :user_update WHERE id_jual = :id_jual';
                                                $stmt = $conn->prepare($sql);
                                            
                                                // Bind the parameters
                                                $stmt->bindParam(':id_jual', $id_jual, PDO::PARAM_INT);
                                                $stmt->bindParam(':harga', $harga, PDO::PARAM_INT);
                                                $stmt->bindParam(':aktifasi', $aktifasi, PDO::PARAM_INT);
                                                $stmt->bindParam(':tgl_update', $tgl_update);
                                                $stmt->bindParam(':user_update', $user_update);
                                            
                                                // Execute the update
                                                if ($stmt->execute()) {
                                                    echo "<script>document.location.href='http://localhost/kantinterput2/admin/dashboard/penjualan.php';</script>";
                                                } else {
                                                    echo "Update failed.";
                                                }
                                            }

                                            // Gunakan prepared statement untuk mencegah SQL injection
                                            $id_jual = $_GET['id_jual'];
                                            $stmt = $conn->prepare("SELECT * FROM jual AS j 
                                                INNER JOIN produk AS u ON j.id_produk = u.id_produk
                                                INNER JOIN gambar AS t ON j.id_gambar = t.id_gambar 
                                                WHERE id_jual = :id_jual");

                                            $stmt->bindParam(':id_jual', $id_jual);
                                            $stmt->execute();
                                            $edit = $stmt->fetch(PDO::FETCH_ASSOC);
                                        ?>
                                            <form action="" method="POST">
                                                <input type="hidden" name="id_jual" id="id_jual" value="<?= $edit['id_jual']; ?>">
                                                <div class="row">
                                                    <div class="form-floating mb-3">
                                                        <input disabled type="text" name="id_jual" class="form-control" id="id_jual" value="<?= $edit['id_jual'] ?>">
                                                        <label class="mx-2" for="id_jual">Id Jual</label>
                                                    </div>
                                                    <div class="form-floating mb-3">
                                                        <input disabled type="text" name="id_produk" class="form-control" id="id_produk" value="<?="(" . $edit['id_produk'] . ") " . $edit['nama_produk'] ?>">
                                                        <label class="mx-2" for="id_produk">Id Produk</label>
                                                    </div>
                                                    <div class="form-floating mb-3">
                                                        <input disabled type="text" name="id_gambar" class="form-control" id="id_gambar" value="<?= $edit['id_gambar'] ?>">
                                                        <label class="mx-2" for="id_gambar">Id Gambar</label>
                                                    </div>
                                                    <div class="form-floating mb-3">
                                                        <input type="text" name="harga" class="form-control" id="harga" value="<?= $edit['harga'] ?>">
                                                        <label class="mx-2" for="harga">Harga</label>
                                                    </div>
                                                    <div>
                                                        <select name="aktifasi" class="form-select form-select mb-3" aria-label=".form-select-lg example">
                                                            <option selected value="">-- Pilih Aktifasi Produk --</option>
                                                            <option value="1" <?= ($edit['aktifasi'] == '1') ? 'selected' : '' ?>>Aktif</option>
                                                            <option value="0" <?= ($edit['aktifasi'] == '0') ? 'selected' : '' ?>>Tidak Aktif</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-6">
                                                        <input class="btn btn-success btn-block w-100" type="submit" name="simpan" value="Simpan">
                                                    </div>
                                                    <div class="col-6">
                                                        <input class="btn btn-danger btn-block w-100" type="reset">
                                                    </div>   
                                                </div>
                                            </form>
                                        </div>
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