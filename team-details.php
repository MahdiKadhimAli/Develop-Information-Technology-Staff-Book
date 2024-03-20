<!DOCTYPE html>
<html lang="en">

<head>
    <!-- ========== Meta Tags ========== -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="modinatheme">
    <!-- ======== Page title ============ -->
    <title>Staff Details</title>
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
    <link rel="stylesheet" href="assets/css/metismenu.css">
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




    <div class="page-banner-wrap bg-cover" style="background-image: url('assets/img/home3/cta-bg.jpg')">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-12">
                    <div class="page-heading text-white">
                        <h1 style="text-transform: capitalize;" style='text-transform: capitalize;'>Staff Details</h1>
                    </div>
                    <div class="breadcrumb-wrap">
                        <nav>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                                <li class="breadcrumb-item"><a href="team.php">Staff </a></li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>

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
    $id = $_GET['id'];
    $sql = "SELECT * FROM db WHERE id = $id";
    $result = $connection->query($sql);



    #check query
    if (!$result) {
        die("Error:" . $connection->error);
    }
    //read data each row
    while ($row = $result->fetch_assoc()) {
        echo
        "
    <section class='team-member-details-wrapper section-padding pt-0'>
   
    <div class='container'>
    
            <div class='member-profile-wrapper'>
                <div class='row align-items-center'>
                    <div class='col-lg-4 col-xl-3 col-md-4'>
                        <div >
                        <img class='member-profile-img bg-cover bg-center ' src='back-end/{$row['img']}' alt='Team Member Image'>
                            </div>
                            
                    </div>
                    <div class='col-lg-8 d-sm-flex justify-content-between col-md-8 col-xl-9'>
                        <div class='member-info'>
                            <h2 style='text-transform: capitalize;'>$row[name]</h2>
                            <span style='text-transform: capitalize;'>$row[certificate]</span>
                            <p>$row[description]</p>

                            <div class='social-profiles'>
                                <a href='#'><i class='fab fa-facebook-f'></i></a>
                                <a href='#'><i class='fab fa-twitter'></i></a>
                                <a href='#'><i class='fab fa-instagram'></i></a>
                                <a href='#'><i class='fab fa-linkedin-in'></i></a>
                            </div>
                        </div>
                        <div class='member-contact-info'>
                            <div class='single-contact'>
                                <h6 style='text-transform: capitalize;'>information technology collage</h6>
                                <p>$row[department]</p>
                            </div>

                            
                            <div class='single-contact'>
                                <h6 style='text-transform: capitalize;'>Email</h6>
                                <p> $row[email]</p>
                            </div>
                            <div class='single-contact'>
                                <h6 style='text-transform: capitalize;'>Date</h6>
                                <p>$row[date]</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class='member-biography'>
                <div class='row'>
                    <div class='col-lg-3 col-md-4 text-center col-12'>
                        <div class='icon-box'>
                            <div class='icon'>
                                <img src='assets/img/file.png' alt=''>
                            </div>
                            <h2 style='text-transform: capitalize;'>Biography</h2>
                        </div>
                    </div>
                    <div class='col-lg-9 col-md-8 col-12'>
                        <div class='biography-info'>
                          
                      
                            <div class='single-contact'>
                                <h6 style='text-transform: capitalize;'>General specialty</h6>
                                <p>$row[general_specialty]</p>
                            </div>

                            <div class='single-contact'>
                                <h6 style='text-transform: capitalize;'>Specific specialty</h6>
                                <p>$row[specific_specialty]</p>
                            </div>
                            <div class='single-contact'>
                                <h6 style='text-transform: capitalize;'>Country granting the certificate</h6>
                                <p>$row[country_granting_the_certificate]</p>
                            </div>

                            <div class='single-contact'>
                                <h6 style='text-transform: capitalize;'>The body granting the certificate </h6>
                                <p>$row[the_body_granting_the_certificate]</p>
                            </div>

                            <div class='single-contact'>
                                <h6 style='text-transform: capitalize;'>Date of granting the certificate </h6>
                                <p>$row[date_of_granting_the_certificate]</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
           
    

    <div class='member-skill'>
        <div class='row'>
            <div class='col-lg-3 col-md-4 col-12'>
                <div class='icon-box text-center'>
                    <div class='icon'>
                        <img src='assets/img/icons/tools.png' alt=''>
                    </div>
                    <h2>Scientific Research</h2>
                </div>
            </div>
            <div class='col-lg-9 col-md-8 col-12'>
                <div class='skill-bars'>
                    <div data-bs-spy='scroll'>
                        <div class='list-group list-group-light'>
                        <a href='$row[search_link0]' target='_blank' class='list-group-item list-group-item-action d-flex justify-content-between align-items-center px-3 border-0 rounded-3 mb-2 list-group-item-primary'>
                        <span> $row[search_name0]</span>
                        <i class='fa fa-link'></i>
                    </a>
                    
                    <a href='$row[search_link1]' target='_blank' class='list-group-item list-group-item-action d-flex justify-content-between align-items-center px-3 border-0 rounded-3 mb-2 list-group-item-primary'>
                    <span> $row[search_name1]</span>
                    <i class='fa fa-link'></i>
                </a>
                <a href='$row[search_link2]' target='_blank' class='list-group-item list-group-item-action d-flex justify-content-between align-items-center px-3 border-0 rounded-3 mb-2 list-group-item-primary'>
                    <span> $row[search_name2]</span>
                    <i class='fa fa-link'></i>
                </a>
                <a href='$row[search_link3]' target='_blank' class='list-group-item list-group-item-action d-flex justify-content-between align-items-center px-3 border-0 rounded-3 mb-2 list-group-item-primary'>
                    <span> $row[search_name3]</span>
                    <i class='fa fa-link'></i>
                </a>
                <a href='$row[search_link4]' target='_blank' class='list-group-item list-group-item-action d-flex justify-content-between align-items-center px-3 border-0 rounded-3 mb-2 list-group-item-primary'>
                    <span> $row[search_name4]</span>
                    <i class='fa fa-link'></i>
                </a>
                <a href='$row[search_link5]' target='_blank' class='list-group-item list-group-item-action d-flex justify-content-between align-items-center px-3 border-0 rounded-3 mb-2 list-group-item-primary'>
                    <span> $row[search_name5]</span>
                    <i class='fa fa-link'></i>
                </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    </div>

    </div>
    ";
    } ?>
    <!-- <div class="member-contact-form">
        <div class="row">
            <div class="col-lg-3 col-md-4 text-center col-12">
                <div class="icon-box">
                    <div class="icon">
                        <img src="assets/img/icons/mail.png" alt="">
                    </div>
                    <h2>Contact Me</h2>
                </div>
            </div>
            <div class="col-lg-9 col-md-8 col-12">
                <div class="contact-form7-wrapper">
                    <div class="contact-form">
                        <form action="mail.php" class="row" id="contact-form">
                            <div class="col-md-6 col-12">
                                <div class="single-personal-info">
                                    <input type="text" id="fname" placeholder="Name">
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="single-personal-info">
                                    <input type="email" id="email" placeholder="Email">
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="single-personal-info">
                                    <input type="text" id="phone" placeholder="Number">
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="single-personal-info">
                                    <input type="text" id="subject" placeholder="Subject">
                                </div>
                            </div>
                            <div class="col-md-12 col-12">
                                <div class="single-personal-info">
                                    <textarea id="message" placeholder="message"></textarea>
                                </div>
                            </div>
                            <div class="col-md-12 col-12">
                                <input class="submit-btn" type="submit" value="Submit Now">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div> -->
    </div>
    </section>

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