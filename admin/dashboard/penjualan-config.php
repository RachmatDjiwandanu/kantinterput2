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
        <style>
            /* Initially hide the text input and select dropdown */
            #textInput, #selectOption {
                display: none;
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

                                                $harga = filter_input(INPUT_POST, 'harga');
                                                $total_barang = filter_input(INPUT_POST, 'total_barang');
                                                $stock = $total_barang;
                                                $mode = filter_input(INPUT_POST, 'aktifasi');
                                                
                                                if (!isset($aktifasi)) {
                                                    $aktifasi = filter_input(INPUT_POST, 'aktifasi');

                                                } else {
                                                    if ($stock < 1) {
                                                        $aktifasi = 1;
                                                    } else {
                                                        $aktifasi = 0;
                                                    }
                                                }
                                                
                                                echo "Aktifasi: " . $aktifasi;
                                                // Gunakan prepared statement untuk mencegah SQL injection
                                                    //no error
                                                                //Securly insert into database
                                                    $sql = 'UPDATE jual SET id_jual=:id_jual, harga=:harga, stock=:stock, total_barang=:total_barang, aktifasi=:aktifasi, mode=:mode WHERE id_jual=:id_jual';
                                                    $stmt = $conn->prepare($sql);

                                                    $stmt->bindParam(':id_jual', $id_jual);
                                                    $stmt->bindParam(':harga', $harga);
                                                    $stmt->bindParam(':stock', $stock);
                                                    $stmt->bindParam(':total_barang', $total_barang);
                                                    $stmt->bindParam(':aktifasi', $aktifasi);
                                                    $stmt->bindParam(':mode', $mode);
                                                        
                                                    $stmt->execute();
                                                    echo "<script>document.location.href='http://localhost/kantintp2/admin/dashboard/data-user.php';</script>";

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
                                                        <input disabled type="text" name="id_produk" class="form-control" id="id_produk" value="<?= $edit['id_produk'] ?>">
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
                                                        <select name="mode" class="form-select form-select mb-3" aria-label=".form-select-lg example" id="formType">
                                                            <option selected disabled>-- Pilih Mode Jual Produk --</option>
                                                            <option value="Auto" <?= ($edit['mode'] == 'Auto') ? 'selected' : '' ?>>Auto</option>
                                                            <option value="Manual" <?= ($edit['mode'] == 'Manual') ? 'selected' : '' ?>>Manual</option>
                                                        </select>
                                                    </div>
                                                    <div id="formField">
                                                        <div class="form-floating mb-3" id="textInput1">
                                                            <input type="text" name="total_barang" class="form-control" id="textInput" value="<?= $edit['stock'] ?>" >
                                                            <label class="mx-2" for="textInput">Stock</label>
                                                        </div>
                                                        <div>
                                                            <select name="aktifasi" class="form-select form-select mb-3" aria-label=".form-select-lg example" id="selectOption">
                                                                <option selected value="">-- Pilih Aktifasi Produk --</option>
                                                                <option value="0" <?= ($edit['aktifasi'] == '0') ? 'selected' : '' ?>>Aktif</option>
                                                                <option value="1" <?= ($edit['aktifasi'] == '1') ? 'selected' : '' ?>>Tidak Aktif</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <input class="btn btn-success btn-block w-100" type="submit" name="simpan" value="Simpan">
                                                    </div>
                                                    <div class="col-6">
                                                        <input class="btn btn-danger btn-block w-100" type="reset">
                                                    </div>   
                                                </div>
                                            </form>
                                            <script>
                                                const formTypeSelect = document.getElementById('formType');
                                                const textInput = document.getElementById('textInput');
                                                const textInput1 = document.getElementById('textInput1');
                                                const selectOption = document.getElementById('selectOption');

                                                // Initially, hide both the text input and select dropdown
                                                textInput.style.display = 'none';
                                                textInput1.style.display = 'none';
                                                selectOption.style.display = 'none';

                                                formTypeSelect.addEventListener('change', function() {
                                                    const selectedOption = formTypeSelect.value;

                                                    if (selectedOption === 'Auto') {
                                                        textInput.style.display = 'block';
                                                        textInput1.style.display = 'block';
                                                        selectOption.style.display = 'none';
                                                        selectOption.selectedIndex = 0; // Set it to the first (default) option
                                                    } else if (selectedOption === 'Manual') {
                                                        textInput.style.display = 'none';
                                                        textInput1.style.display = 'none';
                                                        selectOption.style.display = 'block';
                                                        textInput.value = '';
                                                    }
                                                });
                                            </script>
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