<?php require_once '../../core/config.php'; ?>
<?php require_once PATH . 'core/connection.php'; ?>
<?php require_once PATH . 'core/validations.php'; ?>
<?php

if (session_status() === PHP_SESSION_NONE) {
	session_start();
}
?>

<?php

if (isset($_SESSION['logged'])) {
	header("Location: " . URL . "views/site/index.php");
	exit;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Sign Up</title>
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




    <style type="text/css">
    a:link {
        color: rgb(245, 245, 245);
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




    /* The message box is shown when the user clicks on the password field */
    #message {
        display: none;
        background: #f1f1f1;
        color: #000;
        position: relative;
        padding: 20px;
        margin-top: 10px;
    }

    #message p {
        padding: 10px 35px;
        font-size: 18px;
    }

    /* Add a green text color and a checkmark when the requirements are right */
    .valid {
        color: green;
    }

    .valid:before {
        position: relative;
        left: -35px;
        content: "&#10004;";
    }

    /* Add a red text color and an "x" icon when the requirements are wrong */
    .invalid {
        color: red;
    }

    .invalid:before {
        position: relative;
        left: -35px;
        content: "&#10006;";
    }
    </style>
    <script>
    function validateForm1() {
        var x1 = document.getElementById("lname");
        var x2 = document.getElementById("fname");
        //   var y = document.forms["myform1"]["pass"].value;
        var myInput = document.getElementById("password");
        var z = document.getElementById("email");
        if (x1 == null || x1 == "") {
            alert("Last name must be filled out");
            return false;
        }
        if (x2 == null || x2 == "") {
            alert("First name must be filled out");
            return false;
        }
        var emailRegEx = /^[A-Z0-9_-]+@[A-Z0-9]+\.[A-Z]{2,4}$/i;
        if (z.search(emailRegEx) == -1) {
            alert("Please enter a valid email address.");
            return false;
        }

        // When the user clicks on the password field, show the message box
        myInput.onfocus = function() {
            document.getElementById("message").style.display = "block";
        }

        // When the user clicks outside of the password field, hide the message box
        myInput.onblur = function() {
            document.getElementById("message").style.display = "none";
        }

        // When the user starts to type something inside the password field
        myInput.onkeyup = function() {
            // Validate lowercase letters
            var lowerCaseLetters = /[a-z]/g;
            if (myInput.value.match(lowerCaseLetters)) {
                letter.classList.remove("invalid");
                letter.classList.add("valid");
            } else {
                letter.classList.remove("valid");
                letter.classList.add("invalid");
            }

            // Validate capital letters
            var upperCaseLetters = /[A-Z]/g;
            if (myInput.value.match(upperCaseLetters)) {
                capital.classList.remove("invalid");
                capital.classList.add("valid");
            } else {
                capital.classList.remove("valid");
                capital.classList.add("invalid");
            }

            // Validate numbers
            var numbers = /[0-9]/g;
            if (myInput.value.match(numbers)) {
                number.classList.remove("invalid");
                number.classList.add("valid");
            } else {
                number.classList.remove("valid");
                number.classList.add("invalid");
            }

            // Validate length
            if (myInput.value.length >= 8) {
                length.classList.remove("invalid");
                length.classList.add("valid");
            } else {
                length.classList.remove("valid");
                length.classList.add("invalid");
            }
            return true;
        }
    }
    </script>
</head>

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
                    <li class="nav-item active"><a href="index.php" class="nav-link">Home</a></li>
                    <li class="nav-item"><a href="about.php" class="nav-link">About</a></li>
                    <li class="nav-item"><a href="services.php" class="nav-link">Services</a></li>
                    <li class="nav-item"><a href="car.php" class="nav-link">Cars</a></li>
                    <li class="nav-item"><a href="contact.php" class="nav-link">Contact</a></li>
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
                    <li class="nav-item"><a href="LogIn.php" class="nav-link">Log in</a></li>
                    <li class="nav-item"><a href="SignUp.php" class="nav-link">Sign Up</a></li>
                    <?php
					}
					?>
                </ul>
            </div>
        </div>
    </nav>
    <section class="hero-wrap hero-wrap-2 js-fullheight"
        style="background-image: url('../../public/images/yellowCar.jpeg');" data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container">
            <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-start">
                <div class="col-md-9 ftco-animate pb-5">
                    <p class="breadcrumbs"><span class="mr-2"><a href="../site/index.php">Home <i
                                    class="ion-ios-arrow-forward"></i></a></span> <span>Sign UP <i
                                class="ion-ios-arrow-forward"></i></span></p>
                    <h1 class="mb-3 bread">Sign UP</h1>

                </div>
            </div>

    </section>



    <section class="ftco-section ftco-degree-bg">
        <div class="container">
            <div class="row">
                <div class="col-md-12 ftco-animate">
                    <div class="card-body">
                        <?php require_once PATH . "views/inc/messages.php" ?>
                        <form id="myform1" class="myform1" method="POST" onsubmit="validateForm1()"
                            action="<?= URL . "handlers/auth/register.php" ?>">
                            <p class="sign" align="center"><b>Sign Up</b></p>
                            <div class="d-flex">
                                <input class="un" type="text" name="fname" id="fname" placeholder="First name"
                                    required />
                                <br />
                                <input class="un" type="text" name="lname" id="lname" placeholder="Last name"
                                    required />
                                <br />
                            </div>
                            <div class="d-flex">
                                <input class="un" type="text" name="email" id="email" placeholder="Email" required />
                                <br />
                                <input class="un" type="password" name="password" id="password" placeholder="password"
                                    pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
                                    title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters"
                                    required />
                                <br />
                            </div>

                            <div id="message">
                                <h3>Password must contain the following:</h3>
                                <p id="letter" class="invalid">A <b>lowercase</b> letter</p>
                                <p id="capital" class="invalid">A <b>capital (uppercase)</b> letter</p>
                                <p id="number" class="invalid">A <b>number</b></p>
                                <p id="length" class="invalid">Minimum <b>8 characters</b></p>
                            </div>
                            <div class="d-flex">
                                <input class="un" type="date" name="bdate" id="bdate" placeholder="bdate" required />
                                <input class="un" type="country" name="country" id="country" placeholder="country"
                                    required />
                                <input class="un" type="city" name="city" id="city" placeholder="city" required />
                            </div>
                            <input class="gender" type="radio" id="gender" name="gender" value="male" required> Male
                            <div class="d-flex">
                            </div>
                            <input class="gender" type="radio" id="gender" name="gender" value="female" required> Female
                            <br />

                            <input class="submit" type="submit" id="submit" name="submit" value="Sign Up" />
                            <p class="forgot" align="center"><a href="LogIn.php">Old User, Login?</p>
                        </form>
                    </div>


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