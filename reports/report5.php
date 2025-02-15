<!-- Daily payments within specific period. -->
<?php require_once '../../core/config.php'; ?>
<?php require_once PATH . 'core/connection.php'; ?>
<?php require_once PATH . 'core/validations.php'; ?>

<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
if (isset($_SESSION['report5_result'])) {

    $query_res = $_SESSION['report5_result'];
    unset($_SESSION['report5_result']);
}
?>
<?php

// if user is already logged in
if (!isset($_SESSION['logged'])) {
    header("Location: " . URL . "views/site/LogIn.php");
    exit;
}
if ($_SESSION['logged']['is_admin'] == "0") {
    header("Location: " . URL . "views/site/index.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Admin Main</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700,800&display=swap"
        rel="stylesheet">

    <link rel="stylesheet" href="../../public/css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="../../public/css/animate.css">

    <link rel="stylesheet" href="../../public/css/owl.carousel.min.css">
    <link rel="stylesheet" href="../../public/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="../../public/css/magnific-popup.css">

    <link rel="stylesheet" href="../../public/css/aos.css">

    <link rel="stylesheet" href="../../public/css/ionicons.min.css">

    <link rel="stylesheet" href="../../public/css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="../../public/css/jquery.timepicker.css">


    <link rel="stylesheet" href="../../public/css/flaticon.css">
    <link rel="stylesheet" href="../../public/css/icomoon.css">
    <link rel="stylesheet" href="../../public/css/style.css">
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
        <div class="container">
            <a class="navbar-brand" href="../admin/admin.php">ADMIN<span>CONTROLSECTION</span></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav"
                aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="oi oi-menu"></span> Menu
            </button>

            <div class="collapse navbar-collapse" id="ftco-nav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item "><a href="../admin/admin.php" class="nav-link">Home</a></li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink1" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Office
                        </a>
                        <ul class="dropdown-menu ml-auto" aria-labelledby="navbarDropdownMenuLink">
                            <li><a class="dropdown-item" href="../office/Add_office.php" class="nav-link">Add Office</a>
                            </li>
                            <li><a class="dropdown-item" href="../office/delete_office.php" class="nav-link">Delete
                                    Office</a></li>
                            <li><a class="dropdown-item" href="../office/all.php" class="nav-link">View
                                    Offices</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink1" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Customization Tools
                        </a>
                        <ul class="dropdown-menu ml-auto" aria-labelledby="navbarDropdownMenuLink">
                            <li><a class="dropdown-item" href="<?= URL . "views/car/all_cars.php" ?> "
                                    class="nav-link">View cars</a></li>
                            <li><a class="dropdown-item" href="../car/Add_Car.php" class="nav-link">Add car</a></li>
                            <!-- <li><a class="dropdown-item" href="../car/Edit_car.php" class="nav-link">Customize car</a> -->
                    </li>
                    <li><a class="dropdown-item" href="../car/Delete_car.php" class="nav-link">Delete car</a>
                    </li>
                </ul>
                </li>
                <li class="nav-item dropdown active">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink2" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        Reports
                    </a>
                    <ul class="dropdown-menu ml-auto" aria-labelledby="navbarDropdownMenuLink">
                        <li><a class="dropdown-item" href="../reports/report1.php" class="nav-link">Report1</a></li>
                        <li><a class="dropdown-item" href="../reports/report2.php" class="nav-link">Report2</a></li>
                        <li><a class="dropdown-item" href="../reports/report3.php" class="nav-link">Report3</a></li>
                        <li><a class="dropdown-item" href="../reports/report4.php" class="nav-link">Report4</a></li>
                        <li><a class="dropdown-item active" href="../reports/report5.php" class="nav-link">Report5</a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item dropdown ">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink2" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        Reservations
                    </a>
                    <ul class="dropdown-menu ml-auto" aria-labelledby="navbarDropdownMenuLink">
                        <li><a class="dropdown-item" href="../reservation/all.php" class="nav-link">View
                                Reservations</a></li>
                        <li><a class="dropdown-item" href="../reservation/cancel_reservation.php"
                                class="nav-link">Delete Reservations</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= URL . "views/site/index.php" ?>" id="navbarDropdownMenuLink2"
                        role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        To User Pages
                    </a>
                </li>
            </div>
        </div>
    </nav>
    <!-- END nav -->
    <section class="hero-wrap hero-wrap-2 js-fullheight" style="background-image: url('../../public/images/test1.jpg');"
        data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container">
            <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-start">
                <div class="col-md-9 ftco-animate pb-5">
                    <p class="breadcrumbs"><span class="mr-2"><a href="../admin/admin.php">Home <i
                                    class="ion-ios-arrow-forward"></i></a></span> <span>Report 5 <i
                                class="ion-ios-arrow-forward"></i></span></p>
                    <h1 class="mb-3 bread">Report 5</h1>
                </div>
            </div>
        </div>
    </section>
    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center mb-5">
                <div class="col-md-7 text-center heading-section ftco-animate">

                    <h2 class="mb-3">Reports</h2>
                </div>
            </div>

            <div>
                <div class="services services-2 w-100 text-center">
                    <div class="icon d-flex align-items-center justify-content-center"
                        style="background-image: url('../../public/images/document.png')">

                    </div>
                    <div class="text w-100">
                        <h3 class="heading mb-2">Report 5</h3>
                        <p>
                            Daily payments within specific period
                        </p>
                    </div>
                </div>

            </div>
        </div>

        <section class="ftco-section contact-section">

            <div class="container">
                <?php require_once PATH . "views/inc/messages.php" ?>
                <div class="row d-flex mb-5 contact-info">

                    <div class="col-md-8 block-9 mb-md-5">
                        <form class="bg-light p-5 contact-form" action="<?= URL . "handlers/reports/r5.php"; ?>"
                            method="POST" enctype="multipart/form-data">

                            <div class="form-group">
                                <label for="html">Date Range is from:</label><br>
                                <input type="date" name="lower_date" id="lower_date.png" class="form-control"
                                    placeholder="yyyy-mm-dd" value='' required>
                            </div>

                            <div class="form-group">
                                <label for="html">To:</label><br>
                                <input type="date" name="upper_date" id="upper_date" class="form-control"
                                    placeholder="yyyy-mm-dd" required>
                            </div>


                            <input type="submit" name="submit" value="Search" class="btn btn-primary py-3 px-5">
                        </form>

                    </div>
                </div>

            </div>
            <div class="container">
                <?php
                if (isset($query_res)) {
                    // print_r($query_res);
                    // unset($query_res);
                ?>
                <table class="table table-bordered">
                    <thead class="thead-dark text-center">
                        <tr>
                            <th scope="col">reservation_date</th>
                            <th scope="col">daily_payment</th>
                        </tr>
                    </thead>

                    <tbody class="text-center">
                        <?php
                            foreach ($query_res as  $car) {
                            ?>
                        <tr>
                            <td> <?php echo $car["reservation_date"] ?></td>
                            <td> <?php echo $car["daily_payment"] ?></td>
                        </tr>
                        <?php
                            }
                            ?>
                    </tbody>
                </table>


                <?php } ?>
            </div>
        </section>


        <footer class="ftco-footer ftco-bg-dark ftco-section">
            <div class="container">
                <div class="row mb-5">
                    <div class="col-md">
                        <div class="ftco-footer-widget mb-4">
                            <h2 class="ftco-heading-2"><a href="#" class="logo">Admin<span>ControlSection</span></a>
                            </h2>
                            <div class="col-md">
                                <div class="ftco-footer-widget mb-4">
                                    <h2 class="ftco-heading-2">Admin Information</h2>
                                    <div class="block-23 mb-3">
                                        <ul>
                                            <li><span class="icon icon-map-marker"></span><span class="text">678 gish
                                                    road,
                                                    Mandara, IUBAT, BDT</span></li>
                                            <li><a href="#"><span class="icon icon-phone"></span><span class="text">+20
                                                        0106
                                                         </span></a></li>
                                            <li><a href="https://mail.google.com/"><span
                                                        class="icon icon-envelope"></span><span
                                                        class="text">a.salem3214@gmail.com</span></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </footer>

        <!-- loader -->
        <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px">
                <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee" />
                <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10"
                    stroke="#F96D00" />
            </svg></div>


        <script src="../../public/js/jquery.min.js"></script>
        <script src="../../public/js/jquery-migrate-3.0.1.min.js"></script>
        <script src="../../public/js/popper.min.js"></script>
        <script src="../../public/js/bootstrap.min.js"></script>
        <script src="../../public/js/jquery.easing.1.3.js"></script>
        <script src="../../public/js/jquery.waypoints.min.js"></script>
        <script src="../../public/js/jquery.stellar.min.js"></script>
        <script src="../../public/js/owl.carousel.min.js"></script>
        <script src="../../public/js/jquery.magnific-popup.min.js"></script>
        <script src="../../public/js/aos.js"></script>
        <script src="../../public/js/jquery.animateNumber.min.js"></script>
        <script src="../../public/js/bootstrap-datepicker.js"></script>
        <script src="../../public/js/jquery.timepicker.min.js"></script>
        <script src="../../public/js/scrollax.min.js"></script>
        <script
            src="../../public/https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false">
        </script>
        <script src="../../public/js/google-map.js"></script>
        <script src="../../public/js/main.js"></script>

</body>

</html>