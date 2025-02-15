<?php require_once '../../core/config.php'; ?>
<?php require_once PATH . 'core/connection.php'; ?>

<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
if (isset($_SESSION['report1_result'])) {

    $query_res = $_SESSION['report1_result'];
    unset($_SESSION['report1_result']);
}

if ($_SERVER['REQUEST_METHOD'] == 'GET') {

    // if user not logged in
    if (!isset($_SESSION['logged'])) {
        header("Location: " . URL . "views/site/LogIn.php");
        exit;
    }

    //wrong url 
    if (!isset($_GET['plate_id'])) {
        header("Location: " . URL . "views/site/index.php");
        exit;
    }
    $plate_id = $_GET['plate_id'];
    $current_date = new DateTime();
    $current_date = $current_date->format('d-m-Y');
} else {
    header("Location: " . URL . "views/site/index.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rent</title>
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
    <style type="text/css">
    a:link {
        color: rgb(34, 34, 34);
        background-color: transparent;
        text-decoration: none;
    }

    a:hover {
        color: rgb(196, 207, 212);
        background-color: transparent;
        text-decoration: underline;
    }

    .sign {
        width: 104%;
    }

    .gender {
        width: 30%;
        color: rgb(15, 0, 0);

    }

    .un {
        width: 76%;
        color: rgb(15, 0, 0);
        font-weight: 700;
        font-size: 14px;
        letter-spacing: 1px;
        background: rgb(236, 236, 236);
        padding: 10px 20px;
        border: none;
        border-radius: 20px;
        outline: none;
        box-sizing: border-box;
        border: 2px solid rgba(255, 255, 255, 0.02);
        margin-bottom: 50px;
        margin-left: 46px;
        text-align: center;
        margin-bottom: 27px;
        font-family: 'Ubuntu', sans-serif;
    }

    form.form1 {
        padding-top: 40px;
    }

    .submit {

        cursor: pointer;
        border-radius: 5em;
        color: rgb(255, 255, 255);
        background: #a2a3a3;
        border: 0;
        padding-left: 40px;
        padding-right: 40px;
        padding-bottom: 10px;
        padding-top: 10px;
        font-family: 'Ubuntu', sans-serif;
        margin-left: 45%;
        font-size: 13px;
        box-shadow: 0 0 20px 1px rgba(0, 0, 0, 0.04);
    }

    .forgot {
        width: 104%;
        padding-top: 15px;
    }

    value {
        clear: both;
        float: right;
        margin-bottom: 10px;
        width: 100px;
    }
    </style>
    <script src='http://code.jquery.com/jquery-1.9.1.js'></script>
    <script>
    function validateForm1() {
        var x1 = document.forms["myform1"]["lname"].value;
        var x2 = document.forms["myform1"]["fname"].value;
        var y = document.forms["myform1"]["pass"].value;
        var z = document.forms["myform1"]["email"].value;
        if (x1 == null || x1 == "") {
            alert("Last name must be filled out");
            return false;
        }
        if (x2 == null || x2 == "") {
            alert("First name must be filled out");
            return false;
        }
        if (y == null || y == "") {
            alert("password must be filled out");
            return false;
        }
        var emailRegEx = /^[A-Z0-9_-]+@[A-Z0-9]+\.[A-Z]{2,4}$/i;
        if (z.search(emailRegEx) == -1) {
            alert("Please enter a valid email address.");
            return false;
        }
        return true;
    }
    </script>
</head>

<!-- 



        Important Note
        default value of payment = 0



    -->

<body>


    <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
        <div class="container">
            <a class="navbar-brand" href="../site/index.php">Hot<span>Wheels</span></a>
            <!-- AHEZ -->
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav"
                aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="oi oi-menu"></span> Menu
            </button>

            <div class="collapse navbar-collapse" id="ftco-nav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active"><a href="../site/index.php" class="nav-link">Home</a></li>
                    <li class="nav-item"><a href="../site/about.php" class="nav-link">About</a></li>
                    <li class="nav-item"><a href="../site/services.php" class="nav-link">Services</a></li>
                    <li class="nav-item"><a href="../site/car.php" class="nav-link">Cars</a></li>
                    <li class="nav-item"><a href="../site/contact.php" class="nav-link">Contact</a></li>
                    <?php
                    if (isset($_SESSION['logged'])) {

                    ?>
                    <li class="nav-item">
                        <a href="../user/Welcome_User.php" class="nav-link"><strong>Hello
                                <?= $_SESSION['logged']['full_name'] ?></strong></a>

                    </li>
                    <li class="nav-item"><a href=" <?= URL . "handlers/auth/logout.php"; ?>" class="nav-link">Sign
                            out</a></li>
                    <?php
                        if ($_SESSION['logged']['is_admin'] == "1") {
                        ?>
                    <li class="nav-item"><a href="<?= URL . "views/admin/admin.php" ?>" class=" nav-link">To Admin
                            Panel</a></li>
                    <?php
                        }

                        ?>

                    <?php
                    } else {
                    ?>
                    <li class="nav-item"><a href="../site/LogIn.php" class="nav-link">Log in</a></li>
                    <li class="nav-item"><a href="../site/SignUp.php" class="nav-link">Sign Up</a></li>
                    <?php
                    }
                    ?>
                </ul>
            </div>
        </div>
    </nav>

    <!-- END nav -->

    <section class="hero-wrap hero-wrap-2 js-fullheight"
        style="background-image: url('../../public/images/yellowCar.jpeg');" data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container">
            <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-start">
                <div class="col-md-9 ftco-animate pb-5">
                    <p class="breadcrumbs"><span class="mr-2"><a href="../site/index.php">Home <i
                                    class="ion-ios-arrow-forward"></i></a></span> <span>Rent Car<i
                                class="ion-ios-arrow-forward"></i></span></p>
                    <h1 class="mb-3 bread">Rent Car</h1>

                </div>
            </div>

    </section>

    <section class="ftco-section ftco-degree-bg">
        <div class="container">
            <div class="row">
                <div class="col-md-12 ftco-animate">
                    <h2 class="mb-3">Rent Car</h2>
                    <div class="card-body">
                        <?php require_once PATH . "views/inc/messages.php" ?>
                        <form method="POST" action="<?= URL . "handlers/reservation/store.php"; ?>">
                            <input type="hidden" name="user_id" value="<?= $_SESSION['logged']['user_id'] ?>" />
                            <div>
                                <label>plate ID: </label>
                                <input type="text" name="plate_id" id="plate_id" value="<?= $plate_id ?>" readonly>
                            </div>
                            <br>
                            <div>
                                <!-- <label>office ID: </label> -->
                                <!-- <input type="hidden" name="office_Id" id="office_Id" value="1"> -->
                                <label for="office_Id">Office: </label>
                                <select name="office_Id" id="office_Id">
                                    <?php
                                    $query = "SELECT `office`.* FROM `office`";
                                    $result = mysqli_query($conn, $query);
                                    $offices = mysqli_fetch_all($result, MYSQLI_ASSOC);
                                    foreach ($offices as $office) {
                                    ?>

                                    <?php
                                        echo  "<option value='$office[office_Id]'>$office[country], $office[city]</option>";
                                        ?>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                            <br>
                            <div>
                                <!-- <label>Reservation Date: </label> -->
                                <input type="hidden" name="reservation_date" id="reservation_date"
                                    value="<?= $current_date ?>">
                            </div>
                            <!-- <br> -->
                            <div>
                                <label>Pick Up Date: </label>
                                <input type="date" name="pick_up_date" id="pick_up_date">
                            </div>
                            <br>
                            <div>
                                <label>Return Date: </label>
                                <input type="date" name="return_date" id="return_date">
                            </div>
                            <br>
                            <div>
                                <input type="radio" id="purchase" name="purchase" value="cash_on_delivery" required>
                                cash on delivery
                                <br>
                                <input type="radio" id="purchase" name="purchase" value="using_balance" required> buy
                                using your balance
                            </div>
                            <br>

                            <?php
                            require_once PATH . 'handlers/reservation/store_helper.php';

                            $query = "SELECT `car`.* FROM `car` WHERE `plate_id` = '$plate_id'";
                            $result = mysqli_query($conn, $query);
                            $cars = mysqli_fetch_all($result, MYSQLI_ASSOC);
                            $price_per_day = floatval($cars[0]['price_per_day']);
                            ?>
                            <div>
                                <input type="hidden" name="price_per_day" id="price_per_day"
                                    value="<?php echo $price_per_day ?>"></input>
                                <span STYLE="font-size:14.0pt;" id="message"></span>
                            </div>

                            <div class="d-flex">
                                <input class="btn btn-primary py-3 px-5" type="submit" name="submit" value="Rent">
                            </div>

                        </form>
                    </div>
                    <!-- <input class="submit" type="submit" id="submitButton" value="Edit" /> -->
                    <!-- <input class="submit" type="submit" id="submitButton" value="Delete" /> -->
                </div>
            </div>
    </section> <!-- .section -->

    <footer class="ftco-footer ftco-bg-dark ftco-section">
        <div class="container">
            <div class="row mb-5">
                <div class="col-md">
                    <div class="ftco-footer-widget mb-4">
                        <h2 class="ftco-heading-2"><a href="#" class="logo">Hot<span>Wheels</span></a></h2>
                        <p>A small new car rent office which provide multiple types of car to rent starting from low end
                            to high end and luxurious cars .</p>
                        <ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-5">
                            <li class="ftco-animate"><a href="https://twitter.com/login"><span
                                        class="icon-twitter"></span></a></li>
                            <li class="ftco-animate"><a href="https://www.facebook.com/"><span
                                        class="icon-facebook"></span></a></li>
                            <li class="ftco-animate"><a href="https://www.instagram.com/"><span
                                        class="icon-instagram"></span></a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-md">
                    <div class="ftco-footer-widget mb-4">
                        <h2 class="ftco-heading-2">Have a Questions?</h2>
                        <div class="block-23 mb-3">
                            <ul>
                                <li><span class="icon icon-map-marker"></span><span class="text">sector 10, Uttara,
                                        IUBAT, BDT</span></li>
                                <li><a href="tel://01321749193
                                             "><span class="icon icon-phone"></span><span class="text">01321749193
                                             </span></a></li>
                                <li><a href="https://mail.google.com/"><span class="icon icon-envelope"></span><span
                                            class="text">AHM Wheels@gmail.com</span></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 text-center">

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