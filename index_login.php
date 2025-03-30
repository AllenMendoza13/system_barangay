<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

session_start();

if (!isset($_SESSION)) {
    $showdate = date("Y-m-d");
    date_default_timezone_set('Asia/Manila');
    $showtime = date("h:i:a");
    $_SESSION['storedate'] = $showdate;
    $_SESSION['storetime'] = $showtime;
}

//include('autoloader.php');
require('classes/main.class.php');
$bmiclass = new BMISClass;
$bmiclass->login();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Barangay Calaocan Information System</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/index1.css" type="text/css">
    <script src="https://kit.fontawesome.com/67a9b7069e.js" crossorigin="anonymous"></script>
    <script src="customjs/main.js" type="text/javascript"></script>
    <style>
        body {
            background: url('assets/kapitan1.jpg') fixed;
            /* Set background image to fixed */
            background-size: cover;
            /* Ensure the background image covers the entire viewport */
            background-repeat: no-repeat;
            margin: 0;
            /* Remove default margin */
            padding: 0;
            /* Remove default padding */
        }

        .logo-container {
            position: fixed;
            /* Set position to fixed */
            top: 50%;
            /* Center vertically */
            left: -50px;
            /* Adjust right position */
            transform: translateY(-50%);
            /* Center vertically */
            z-index: 999;
            /* Set a high z-index to ensure it's above other elements */
            text-align: right;
            /* Align text to right */
            padding: 20px;
            /* Add padding */
            margin-top: 30px;
            border-radius: 10px;
            /* Add border radius */
        }

        .logo {
            width: 80%;
            /* Adjust the size as needed */
            height: auto;
            background-color: transparent;
            /* Remove background color */
        }

        .title-text {
            font-size: 25px;
            /* Adjust the font size as needed */
            color: #000000;
            /* Set the desired text color */
            margin-top: 10px;
            /* Adjust the spacing */
            font-weight: bold;
        }

        .form-container {
            position: fixed;
            /* Set position to fixed */
            top: 50%;
            /* Center vertically */
            right: 10%;
            /* Adjust right position */
            transform: translateY(-50%);
            /* Center vertically */
            max-width: 500px;
            /* Set max width for the form */
            background-color: rgba(255, 255, 255, 0.8);
            border-radius: 10px;
            padding: 5px;
            /* Increase padding for better spacing */
        }

        /* Adjust the margin of the login button */
        .btn-primary:hover {
            background-color: #007bff;
        }

        .input-container .icon {
            padding: 10px;
            background: dodgerblue;
            color: white;
            min-width: 50px;
            text-align: center;
            border-top-left-radius: 5px;
            border-bottom-left-radius: 5px;
        }

        .input-container .input-field {
            width: 85%;
            /* Set input field width to 100% */
            height: 40px;
            padding: 10px;
            outline: none;
            border: 1px solid #ccc;
            border-top-right-radius: 5px;
            border-bottom-right-radius: 5px;
        }


        .icon {
            padding: 15px;
            background: dodgerblue;
            color: white;
            min-width: 80px;
            text-align: center;
            border-top-left-radius: 5px;
            border-bottom-left-radius: 5px;
        }

        .login-button {
            margin-top: 20px;
            width: 100%;
        }

        .registration-section {
            text-align: center;
            margin-top: 5px;
        }

        .create-button {
            background-color: #28a745;
            border: none;
        }

        .create-button:hover {
            background-color: #218838;
        }

        .g-recaptcha {
            width: 100%;
            /* Make it responsive */
            max-width: 310px;
            /* Limit the max-width to 310px */
            margin: 0 auto;
            /* Center it */
        }

        /* @media (max-width: 576px) {
            .form-container {
                right: 5%;
            }

            .eye-icon {
                left: 250px;
            }
        } */

        @media (max-width: 768px) {
            .form-container {
                width: 90%;
                right: 5%;
                left: 5%;
                max-width: none;
                padding: 15px;
            }

            .title-text {
                font-size: 18px;
            }

            .logo-container {
                position: relative;
                text-align: center;
                left: 0;
                top: 0;
                margin-bottom: 20px;
            }

            .logo {
                width: 50%;
            }

            .input-container .icon {
                min-width: 40px;
            }

            .input-container .input-field {
                width: 100%;
            }

            .eye-icon {
                left: auto;
                right: 10px;
            }

            .btn {
                font-size: 14px;
                padding: 10px;
            }
        }

        @media (max-width: 576px) {
            .eye-icon {
                right: 15px;
                left: auto;
            }
        }
    </style>
    <style>
        .input-container {
            position: relative;
        }

        .eye-icon {
            position: absolute;
            left: 400px;
            top: 50%;
            transform: translateY(-50%);
            cursor: pointer;
        }

        @media (max-width: 576px) {
            .eye-icon {
                left: 250px;
            }
        }
    </style>
</head>

<body>
    <section class="main-section">
        <div class="container">
            <div class="row">
                <div class="col-md-6 logo-container">
                </div>
                <div class="col-md-6 form-container">
                    <div class="card main-card mt-3">
                        <div class="card-body">
                            <form method="post" class="input-container" action="">
                                <div class="mb-3">
                                    <center>
                                        <p class="title-text">Barangay Calaocan Information System</p>
                                    </center>
                                    <label for="email" class="form-label"><b>Email:</b></label>
                                    <div class="input-container">
                                        <i class="fa fa-envelope icon"></i>
                                        <input class="input-field" type="email" id="email" placeholder="Enter Email" name="email" required>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label for="password" class="form-label"><b>Password:</b></label>
                                    <div class="input-container">
                                        <i class="fa fa-key icon"></i>
                                        <input class="input-field" type="password" id="password" placeholder="Enter Password" name="password" required>
                                        <i class="fa fa-eye-slash eye-icon" onclick="togglePasswordVisibility()"></i>
                                    </div>
                                </div>

                                <button class="btn btn-primary login-button" type="submit" name="login">Log-in</button>
                                <a href="index.php" class="btn btn-danger login-button" type="submit" name="login" style="background-color: #0B5345; border: 2px solid #0B5345;">Back to homepage</a>
                            </form>

                            <hr>

                            <div class="registration-section">
                                <p1><strong>Haven't registered yet?</strong></p1><br>
                                <p1>Hindi ka pa rehistrado?</p1><br>
                                <button class="btn btn-success create-button" onclick="trying();">Create Account</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script>
        function myFunction() {
            var x = document.getElementById("password");
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
        }

        function trying() {
            window.location.href = "resident_registration.php";
        }
    </script>

    <script>
        function togglePasswordVisibility() {
            var passwordInput = document.getElementById("password");
            var eyeIcon = document.querySelector(".eye-icon");

            if (passwordInput.type === "password") {
                passwordInput.type = "text";
                eyeIcon.classList.remove("fa-eye-slash");
                eyeIcon.classList.add("fa-eye");
            } else {
                passwordInput.type = "password";
                eyeIcon.classList.remove("fa-eye");
                eyeIcon.classList.add("fa-eye-slash");
            }
        }
    </script>
</body>

</html>