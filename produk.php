<?php
// Suppress PHP errors and save the current error reporting level
$previousErrorReporting = error_reporting(0);

// Include your database connection code here
require_once("admin/dashboard/conn.php");

// Initialize variables with default values
$nama_produk = "Product Not Found";
$harga = "N/A";
$topping = "None"; // Default topping
$availabilityMessage = "";

// Get the product ID from the URL
if (isset($_GET['id_jual'])) {
    $id_jual = isset($_GET['id_jual']) ? $_GET['id_jual'] : null;

    // Query the database to fetch product information
    $query = "SELECT *, t.gambarPath
            FROM jual AS j
            INNER JOIN produk AS u ON j.id_produk = u.id_produk
            INNER JOIN gambar AS t ON j.id_gambar = t.id_gambar
            WHERE j.id_jual = :id_jual"; // Update the query to use named placeholder
    
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':id_jual', $id_jual, PDO::PARAM_INT); // Bind the parameter

    $stmt->execute();

    $product_data = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($product_data) {
        // Assign product details if found
        $nama_produk = $product_data['nama_produk'];
        $harga = $product_data['harga'];
        $gambarPath = $product_data['gambarPath'];
        $kategori = $product_data['kategori'];
        
        if ($product_data['aktifasi'] == 1) {
            $availabilityMessage = "Available";
        }
    }
}

// Restore the previous error reporting level
error_reporting($previousErrorReporting);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="Ogani Template">
    <meta name="keywords" content="Ogani, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo $nama_produk; ?></title>
    <?php include 'bs-cdn.php';?>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;900&display=swap" rel="stylesheet">
    <!-- Css Styles -->
    <link rel="stylesheet" href="/css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="/css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="/css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="/css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="/css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="/css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="/css/style.css" type="text/css">
</head>

<body>
<?php include 'header.php';?>
    <!-- Product Details Section Begin -->
    <section class="product-details spad">
    <div class="container">
        <?php if ($availabilityMessage === "Available"): ?>
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="product__details__pic">
                        <div class="product__details__pic__item">
                            <?php echo '<img class="product__details__pic__item--large" src="' . str_replace($_SERVER["DOCUMENT_ROOT"], "", $gambarPath) . '" alt="" />' ?>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="product__details__text">
                        <form action="lol.php" method="POST">
                            <h3><?php echo $nama_produk; ?></h3>
                            <div class="product__details__price">Rp<?php echo $harga; ?></div>
                            <div class="product__details__quantity">
                                <div class="quantity">
                                    <div class="pro-qty">
                                        <input type="text" value="1">
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="primary-btn">ADD TO CARD</button><br><br>
                            <?php if ($kategori == 'Mie'): ?>
                                <span>Topping :</span>
                                <select class="form-select w-50 my-1" aria-label="Topping"  id="toppingSelect" name="topping">
                                    <option value="none">None</option>
                                    <option value="Sawi">Sawi</option>
                                </select>
                            <?php endif; ?>
                            <ul>
                                <li><b>Availability</b> <span><?php echo $availabilityMessage; ?></span></li>
                                <?php if ($kategori == 'Mie'): ?>
                                <li><b>Topping</b> <span id="selectedTopping">None</span></li>
                                <?php endif; ?>
                            </ul>
                        </form>
                    </div>
                </div>
            </div>
        <?php else: ?>
            <h3>Product Not Available</h3>
        <?php endif; ?>
    </div>
</section>
    <!-- Product Details Section End -->
    <!-- Related Product Section Begin -->
    <!-- Related Product Section End -->

    <!-- Footer Section Begin -->
    <footer class="footer spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="footer__about">
                        <div class="footer__about__logo">
                            <a href="./index.html"><img src="img/logo.png" alt=""></a>
                        </div>
                        <ul>
                            <li>Address: 60-49 Road 11378 New York</li>
                            <li>Phone: +65 11.188.888</li>
                            <li>Email: hello@colorlib.com</li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 offset-lg-1">
                    <div class="footer__widget">
                        <h6>Useful Links</h6>
                        <ul>
                            <li><a href="#">About Us</a></li>
                            <li><a href="#">About Our Shop</a></li>
                            <li><a href="#">Secure Shopping</a></li>
                            <li><a href="#">Delivery infomation</a></li>
                            <li><a href="#">Privacy Policy</a></li>
                            <li><a href="#">Our Sitemap</a></li>
                        </ul>
                        <ul>
                            <li><a href="#">Who We Are</a></li>
                            <li><a href="#">Our Services</a></li>
                            <li><a href="#">Projects</a></li>
                            <li><a href="#">Contact</a></li>
                            <li><a href="#">Innovation</a></li>
                            <li><a href="#">Testimonials</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12">
                    <div class="footer__widget">
                        <h6>Join Our Newsletter Now</h6>
                        <p>Get E-mail updates about our latest shop and special offers.</p>
                        <form action="#">
                            <input type="text" placeholder="Enter your mail">
                            <button type="submit" class="site-btn">Subscribe</button>
                        </form>
                        <div class="footer__widget__social">
                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-instagram"></i></a>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="#"><i class="fa fa-pinterest"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="footer__copyright">
                        <div class="footer__copyright__text"><p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
  Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
  <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p></div>
                        <div class="footer__copyright__payment"><img src="/img/payment-item.png" alt=""></div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer Section End -->

    <!-- Js Plugins -->
    <script src="/js/jquery-3.3.1.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>
    <script src="/js/jquery.nice-select.min.js"></script>
    <script src="/js/jquery-ui.min.js"></script>
    <script src="/js/jquery.slicknav.js"></script>
    <script src="/js/mixitup.min.js"></script>
    <script src="/js/owl.carousel.min.js"></script>
    <script src="/js/main.js"></script>
    <script>
    // Function to capitalize the first letter of a string
        function capitalizeFirstLetter(string) {
            return string.charAt(0).toUpperCase() + string.slice(1);
        }

        // Get a reference to the select element and the "selectedTopping" span
        const toppingSelect = document.getElementById('toppingSelect');
        const selectedToppingSpan = document.getElementById('selectedTopping');

        // Add an event listener to the select element
        toppingSelect.addEventListener('change', function () {
            // Get the selected option's value and capitalize the first letter
            const selectedTopping = toppingSelect.value;
            const capitalizedTopping = capitalizeFirstLetter(selectedTopping);

            // Update the "selectedTopping" span with the capitalized value
            selectedToppingSpan.textContent = capitalizedTopping;
        });
    </script>


</body>

</html>