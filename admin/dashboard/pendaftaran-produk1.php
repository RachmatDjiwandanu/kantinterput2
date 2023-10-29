<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Dashboard - SB Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link href="css/styles.css" rel="stylesheet" />
    <script src="alertsweet.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js">
    </script>
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <style>
    .input-group-append {
        cursor: pointer;
    }
    </style>
</head>

<body class="sb-nav-fixed">
    <?php include 'navbar.php' ?>
    <div id="layoutSidenav_content">
        <main id="admin" class="admin">
            <div class="container-fluid px-4">
                <h1 class="mt-4">Form Pendaftaran</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item"><a href="http://localhost/terput2/admin/dashboard/">Dashboard</a></li>
                    <li class="breadcrumb-item active">Pendaftaran</li>
                </ol>
                <div class="accordion" id="accordionPanelsStayOpenExample">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="panelsStayOpen-headingOne">
                            <button class="accordion-button fw-bold" type="button" data-bs-toggle="collapse"
                                data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true"
                                aria-controls="panelsStayOpen-collapseOne">
                                Form Pendaftaran
                            </button>
                        </h2>
                        <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show"
                            aria-labelledby="panelsStayOpen-headingOne">
                            <div class="accordion-body px-5 my-2">
                                <?php
                                    require_once("conn.php");
                                            if(isset($_POST['daftar'])){
                                                $nama_produk = filter_input(INPUT_POST, 'nama_produk');
                                                $kategori = filter_input(INPUT_POST, 'kategori');
                                                $harga = filter_input(INPUT_POST, 'harga');
                                                $tgl_input = date("Y-m-d");
                                                $user_input = $_SESSION['nama'];
                                                $id_user = $_SESSION['id_user'];

                                                if (empty($kategori) || $kategori === "") {
                                                    $error = "Please select a category.";
                                                } 
                                                if (empty($nama_produk) || empty($harga))  {
                                                    echo "<script>formkosong();</script>";
                                                    $error ="Error";
                                                }

                                                if(!isset($error)){
                                                    $uploadedFile = $_FILES["gambar"];

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
                                                    $sql = 'INSERT INTO produk (nama_produk, harga, kategori, gambarNama, gambarPath, tgl_input, user_input, id_user) 
                                                    VALUES (:nama_produk, :harga, :kategori, :gambarNama, :gambarPath, :tgl_input, :user_input, :id_user)';
                                                                $query = $conn->prepare($sql);

                                                                $query->bindParam(':nama_produk', $nama_produk);
                                                                $query->bindParam(':harga', $harga);
                                                                $query->bindParam(':kategori', $kategori);
                                                                $query->bindParam(':gambarNama', $gambarNama);
                                                                $query->bindParam(':gambarPath', $gambarPath);
                                                                $query->bindParam(':tgl_input', $tgl_input);
                                                                $query->bindParam(':user_input', $user_input);
                                                                $query->bindParam(':id_user', $id_user);
                                                        
                                                                $query->execute();
                                                    }
                                            }

                                            ?>
                                <form action="" method="POST" enctype="multipart/form-data">
                                    <div class="row">
                                        <div class="form-floating mb-3">
                                            <input type="text" name="nama_produk" class="form-control" id="nama_produk"
                                                placeholder="Nama Produk">
                                            <label class="mx-2" for="nama_produk">Nama Produk</label>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input type="number" name="harga" class="form-control" id="harga"
                                                placeholder="Harga">
                                            <label class="mx-2" for="harga">Harga</label>
                                        </div>
                                        <div class="">
                                            <select name="kategori" class="form-select mb-3"
                                                aria-label=".form-select-lg example">
                                                <option selected hidden disabled value="">Pilih Kategori Produk</option>
                                                <option value="Gorengan">Gorengan</option>
                                                <option value="Minuman">Minuman</option>
                                                <option value="Snack">Snack</option>
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label for="formFile" class="form-label">Input Gambar PNG, JPEG, JPG</label>
                                            <input class="form-control" type="file" id="formFile" name="gambar">
                                        </div>
                                        <div class="col-6">
                                            <input class="btn btn-primary btn-block w-100" type="submit" name="daftar"
                                                value="daftar">
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
            </div>
        </main>
    <?php include 'footer.php' ?>
    </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
    </script>
    <script src="js/scripts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="assets/demo/chart-area-demo.js"></script>
    <script src="assets/demo/chart-bar-demo.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js"
        crossorigin="anonymous"></script>
    <script src="js/datatables-simple-demo.js"></script>
    <script>
    $('.panel-collapse').on('show.bs.collapse', function() {
        $(this).siblings('.panel-heading').addClass('active');
    });

    $('.panel-collapse').on('hide.bs.collapse', function() {
        $(this).siblings('.panel-heading').removeClass('active');
    });
    </script>
    <script>
    $(document).ready(function() {
        $('#datepicker').datepicker({
            format: 'yyyy-mm-dd', // Use the appropriate format for your database (e.g., 'yyyy-mm-dd')
            autoclose: true
        });
    });
    </script>
</body>

</html>