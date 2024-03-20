<!DOCTYPE html>
<html lang="en">

<head>
    <!-- ========== Meta Tags ========== -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="modinatheme">
    <!-- ======== Page title ============ -->
    <title>Staff</title>
    <!-- ========== Favicon Icon ========== -->
    <link rel="shortcut icon" href="assets/img/logo_p.svg">
    <!-- ===========  All Stylesheet ================= -->
    <!--  Icon css plugins -->
    <link rel="stylesheet" href="assets/css1/icons.css">
    <!--  animate css plugins -->
    <link rel="stylesheet" href="assets/css1/animate.css">
    <!--  magnific-popup css plugins -->
    <link rel="stylesheet" href="assets/css1/magnific-popup.css">
    <!--  owl carousel css plugins -->
    <link rel="stylesheet" href="assets/css1/owl.carousel.min.css">
    <!-- metis menu css file -->
    <link rel="stylesheet" href="assets/css1/metismenu.css">
    <!--  owl theme css plugins -->
    <link rel="stylesheet" href="assets/css1/owl.theme.css">
    <!--  Bootstrap css plugins -->
    <link rel="stylesheet" href="assets/css1/bootstrap.min.css">
    <!--  main style css file -->
    <link rel="stylesheet" href="assets/css1/style.css">
    <!-- template main style css file -->
    <link rel="stylesheet" href="style.css">

</head>

<body class="body-wrapper">

    <!-- preloader -->
    <div id="preloader" class="preloader">
        <div class="animation-preloader">
            <div class="spinner">
            </div>
            <div class="txt-loading">
                <span data-text-preloader="S" class="letters-loading">
                    S
                </span>
                <span data-text-preloader="T" class="letters-loading">
                    T
                </span>
                <span data-text-preloader="A" class="letters-loading">
                    A
                </span>
                <span data-text-preloader="F" class="letters-loading">
                    F
                </span>
                <span data-text-preloader="F" class="letters-loading">
                    F
                </span>

            </div>
            <p class="text-center">Loading</p>
        </div>
        <div class="loader">
            <div class="row">
                <div class="col-3 loader-section section-left">
                    <div class="bg"></div>
                </div>
                <div class="col-3 loader-section section-left">
                    <div class="bg"></div>
                </div>
                <div class="col-3 loader-section section-right">
                    <div class="bg"></div>
                </div>
                <div class="col-3 loader-section section-right">
                    <div class="bg"></div>
                </div>
            </div>
        </div>
    </div>

    <div class="offset-menu">
        <span id="offset-menu-close-btn"><i class="fal fa-plus"></i></span>
        <div class="offset-menu-wrapper text-white">
            <div class="offset-menu-header">
                <div class="offset-menu-logo">
                    <a href="index.html"><img src="assets/img/logo.png" alt="logo"></a>
                </div>
            </div>
            <div class="offset-menu-section">
                <h3>About Us</h3>
                <p>We must explain to you how all seds this mistakens idea off denouncing pleasures and praising pain
                    was born and I will give you a completed</p>
                <a href="contact.html" class="theme-btn  mt-30">Consultation</a>
            </div>
            <div class="offset-menu-section">
                <h3>Contact Info</h3>
                <ul>
                    <li><span><i class="fal fa-map"></i></span>Rock St 12, Newyork City, USA</li>
                    <li><span><i class="fal fa-phone"></i></span>(000) 000-000-0000</li>
                    <li><span><i class="fal fa-envelope"></i></span>info@example.com</li>
                    <li><span><i class="fal fa-clock"></i></span>Week Days: 09.00 to 18.00</li>
                    <li><span><i class="fal fa-clock"></i></span>Sunday: Closed</li>
                </ul>
            </div>
            <div class="offset-menu-footer">
                <div class="offset-menu-social-icon">
                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                    <a href="#"><i class="fab fa-twitter"></i></a>
                    <a href="#"><i class="fab fa-linkedin-in"></i></a>
                    <a href="#"><i class="fab fa-dribbble"></i></a>
                    <a href="#"><i class="fab fa-youtube"></i></a>
                </div>
            </div> <!-- /.offset-menu-footer -->
        </div> <!-- /.offset-menu-wrapper -->
    </div> <!-- /.offset-menu -->



    <div class="page-banner-wrap bg-cover" style="background-image: url('assets/img/home3/cta-bg.jpg')">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-12">
                    <div class="page-heading text-white">
                        <h1>Academic Staff</h1>
                    </div>
                    <div class="breadcrumb-wrap">
                        <nav>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Staff</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="our-team-wrapper section-padding">
        <div class="container">
            <div class="row">
                <div class="col-xl-6 offset-xl-3 col-lg-8 offset-lg-2 text-center col-12">
                    <div class="block-contents">
                        <div class="section-title">
                            <h2>education institution</h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">


                <?php
                $servername = "localhost";
                $username = "root";
                $password = "";
                $database = "database_college";
                //create connection
                $connection = new mysqli($servername, $username, $password, $database);

                #check connection
                if ($connection->connect_error) {
                    die("Connection failed:" . $connection->connect_error);
                }
                $sql = "SELECT * FROM db";
                $result = $connection->query($sql);

                #check query
                if (!$result) {
                    die("Error:" . $connection->error);
                }
                //read data each row
                while ($row = $result->fetch_assoc()) {
                    echo
                    "

                <div class='col-md-6 col-xl-4 col-12'>
                    <div class='single-team-member'>
                        <div class='team-img'>
                        <img src='back-end/{$row['img']}' alt='Team Member Image'>
                        </div>
                        
                        <div class='team-details-bar'>
                            <div class='member-details'>
                                <div class='member-data'>
                                    <span>$row[certificate]</span>
                                    <h4 style='text-transform: capitalize;'>$row[name]</h4>
                                </div>
                                <div class='social-profile'>
                                <p><b> $row[department]</b></p>
                                </div>
                            </div>
                            <a href='team-details.php?id=" . $row["id"] . "' class='plus-btn'><i class='fal fa-external-link'></i></a>
                        </div>
                    </div>
                </div> 
                ";
                }
                ?>


                <!-- <div class="col-md-6 col-xl-4 col-12">
                    <div class="single-team-member">
                        <div class="team-img">
                            <img src="assets/img_dr/dr.mohamed.jpg" alt="">
                        </div>
                        <div class="team-details-bar">
                            <div class="member-details">
                                <div class="member-data">
                                    <span>Manager</span>
                                    <h4 style="text-transform: capitalize;">Dr. Mohammad Jawad</h4>
                                </div>
                                <div class="social-profile">
                                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                                    <a href="#"><i class="fab fa-twitter"></i></a>
                                    <a href="#"><i class="fab fa-instagram"></i></a>
                                    <a href="#"><i class="fab fa-linkedin"></i></a>
                                </div>
                            </div>
                            <a href="team-details.html" class="plus-btn"><i class="fal fa-bars"></i></a>
                        </div>
                    </div>
                </div> -->
            </div>
        </div>
    </section>


    <BR></BR>
    <footer class="footer-3 footer-wrap">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-5 order-3 col-md-6 mt-3 mt-lg-0 order-lg-1 col-12 text-center text-md-start">
                    <div class="copyright-info">
                        <p>&copy; 2024 Copyright By <a href="https:/t.me/M13mm" target="_blank" style="font-family: 'Roboto', sans-serif;">Mahdi Kadhim Ali</a>. All Rights Reserved</p>
                    </div>
                </div>
                <div class="col-lg-2 col-md-12 text-center order-1 order-lg-2 col-12">
                    <div class="footer-social">
                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fab fa-instagram"></i></a>
                        <a href="#"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
                <div class="col-lg-5 col-md-6 col-12 order-1 order-lg-2 ">
                    <div class="footer-menu-2 mt-3 mt-lg-0 text-center text-md-end">
                        <ul>
                            <li><a href="https://www.uobabylon.edu.iq/" target="_blank" style="font-family: 'Roboto', sans-serif;">University of Babylon</a></li>
                            <li><a href="https://it.uobabylon.edu.iq/" target="_blank" style="font-family: 'Roboto', sans-serif;">College of Information Technology</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </footer>



    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/modernizr.min.js"></script>
    <script src="assets/js/jquery.easing.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/isotope.pkgd.min.js"></script>
    <script src="assets/js/imageload.min.js"></script>
    <script src="assets/js/scrollUp.min.js"></script>
    <script src="assets/js/owl.carousel.min.js"></script>
    <script src="assets/js/magnific-popup.min.js"></script>
    <script src="assets/js/counterup.min.js"></script>
    <script src="assets/js/wow.min.js"></script>
    <script src="assets/js/metismenu.js"></script>
    <script src="assets/js/ajax-mail.js"></script>
    <script src="assets/js/active.js"></script>
</body>

</html>