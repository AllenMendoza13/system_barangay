<?php 
    require('classes/main.class.php');
    require('classes/resident.class.php');
    
    $userdetails = $bmis->get_userdata();
    $bmis->create_travelpermit();

?>

<!DOCTYPE html>

<html>
  <head> 
    <title> Barangay Calaocan Information System </title>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0/jquery.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-modal/2.2.6/js/bootstrap-modalmanager.min.js" integrity="sha512-/HL24m2nmyI2+ccX+dSHphAHqLw60Oj5sK8jf59VWtFWZi9vx7jzoxbZmcBeeTeCUc7z1mTs3LfyXGuBU32t+w==" crossorigin="anonymous"></script>
      <!-- responsive tags for screen compatibility -->
      <meta name="viewport" content="width=device-width, initial-scale=1"><!-- bootstrap css --> 
      <link href="bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css">
      <!-- fontawesome icons --> 
      <script src="https://kit.fontawesome.com/67a9b7069e.js" crossorigin="anonymous"></script>
  
        <style>

            /* Navbar Buttons */

            .btn1 {
            border-radius: 20px;
            border: none; /* Remove borders */
            color: white; /* White text */
            font-size: 16px; /* Set a font size */
            cursor: pointer; /* Mouse pointer on hover */
            margin-left: 13%;
            padding: 8px 22px;
            }

            .btn2 {
            border-radius: 20px;
            border: none; /* Remove borders */
            color: white; /* White text */
            font-size: 16px; /* Set a font size */
            cursor: pointer; /* Mouse pointer on hover */
            padding: 8px 22px;
            margin-left: .1%;
            }

            .btn3 {
            border-radius: 20px;
            border: none; /* Remove borders */
            color: white; /* White text */
            font-size: 16px; /* Set a font size */
            cursor: pointer; /* Mouse pointer on hover */
            padding: 8px 22px;
            margin-left: .1%;
            }

            .btn4 {
            border-radius: 20px;
            border: none; /* Remove borders */
            color: white; /* White text */
            font-size: 16px; /* Set a font size */
            cursor: pointer; /* Mouse pointer on hover */
            padding: 8px 22px;
            margin-left: .1%;
            }

            .btn5 {
            border-radius: 20px;
            border: none; /* Remove borders */
            color: white; /* White text */
            font-size: 16px; /* Set a font size */
            cursor: pointer; /* Mouse pointer on hover */
            padding: 8px 22px;
            margin-left: .1%;
            }

            /* Darker background on mouse-over */
            .btn1:hover {
            background-color: RoyalBlue;
            color: black;
            }

            .btn2:hover {
            background-color: RoyalBlue;
            color: black;
            }

            .btn3:hover {
            background-color: RoyalBlue;
            color: black;
            }

            .btn4:hover {
            background-color: RoyalBlue;
            color: black;
            }

            .btn5:hover {
            background-color: RoyalBlue;
            color: black;
            }

            /* Back-to-Top */

            .top-link {
            transition: all 0.25s ease-in-out;
            position: fixed;
            bottom: 0;
            right: 0;
            display: inline-flex;
            cursor: pointer;
            align-items: center;
            justify-content: center;
            margin: 0 3em 3em 0;
            border-radius: 50%;
            padding: 0.25em;
            width: 80px;
            height: 80px;
            background-color: #3661D5;
            }
            .top-link.show {
            visibility: visible;
            opacity: 1;
            }
            .top-link.hide {
            visibility: hidden;
            opacity: 0;
            }
            .top-link svg {
            fill: white;
            width: 24px;
            height: 12px;
            }
            .top-link:hover {
            background-color: #3498DB;
            }
            .top-link:hover svg {
            fill: #000000;
            }

            .screen-reader-text {
            position: absolute;
            clip-path: inset(50%);
            margin: -1px;
            border: 0;
            padding: 0;
            width: 1px;
            height: 1px;
            overflow: hidden;
            word-wrap: normal !important;
            clip: rect(1px, 1px, 1px, 1px);
            }
            .screen-reader-text:focus {
            display: block;
            top: 5px;
            left: 5px;
            z-index: 100000;
            clip-path: none;
            background-color: #eee;
            padding: 15px 23px 14px;
            width: auto;
            height: auto;
            text-decoration: none;
            line-height: normal;
            color: #444;
            font-size: 1em;
            clip: auto !important;
            }

            .container1
            {
                background-color: #3498DB;
                height: 342px;
                color: black;
                font-family: Arial, Helvetica, sans-serif;
                text-align: center;
            }

            .applybutton
            {
                width: 100% !important;
                height: 50px !important;
                border-radius: 20px;
                margin-top: 5%;
                margin-bottom: 8%;
                font-size: 25px;
                letter-spacing: 2px;
            }

            .paa
            {
                margin-top: 10px;
                position: relative;
                left: -28%;
            }

            .text1{
                margin-top: 30px;
                font-size: 50px;
            }

            .picture{
                height: 120px;
                width: 120px;
            }

            /* width */
            ::-webkit-scrollbar {
            width: 5px;
            }

            /* Track */
            ::-webkit-scrollbar-track {
            background: #f1f1f1; 
            }
            
            /* Handle */
            ::-webkit-scrollbar-thumb {
            background: #888; 
            }

            /* Handle on hover */
            ::-webkit-scrollbar-thumb:hover {
            background: #555; 
            }

            .card5 {
                width: 195px;
                height: 210px;
                overflow: auto;
                margin: auto;
                color: white;
            }

            .card4 {
                width: 195px;
                height: 210px;
                overflow: auto;
                margin: auto;
                color: white;
            }

            .card3 {
                width: 195px;
                height: 210px;
                overflow: hidden;
                margin: auto;
                color: white;
            }

            .card2 {
                width: 195px;
                height: 210px;
                overflow: auto;
                margin: auto;
                color: white;
            }

            .card1 {
                width: 195px;
                height: 210px;
                overflow: auto;
                margin: auto;
                color: white;
            }

            a{
                color:white;
                }
            .shfooter .collapse {
                display: inherit;
            }
                @media (max-width:767px) {
            .shfooter ul {
                    margin-bottom: 0;
            }

            .shfooter .collapse {
                    display: none;
            }

            .shfooter .collapse.show {
                    display: block;
            }

            .shfooter .title .fa-angle-up,
            .shfooter .title[aria-expanded=true] .fa-angle-down {
                    display: none;
            }

            .shfooter .title[aria-expanded=true] .fa-angle-up {
                    display: block;
            }

            .shfooter .navbar-toggler {
                    display: inline-block;
                    padding: 0;
            }

            }

            .resize {
                text-align: center;
            }
            .resize {
                margin-top: 3rem;
                font-size: 1.25rem;
            }
            /*RESIZESCREEN ANIMATION*/
            .fa-angle-double-right {
                animation: rightanime 1s linear infinite;
            }

            .fa-angle-double-left {
                animation: leftanime 1s linear infinite;
            }
            @keyframes rightanime {
                50% {
                    transform: translateX(10px);
                    opacity: 0.5;
            }
                100% {
                    transform: translateX(10px);
                    opacity: 0;
            }
            }
            @keyframes leftanime {
                50% {
                    transform: translateX(-10px);
                    opacity: 0.5;
            }
                100% {
                    transform: translateX(-10px);
                    opacity: 0;
            }
            }

            /* Contact Chip */

            .chip {
            display: inline-block;
            padding: 0 25px;
            height: 50px;
            line-height: 50px;
            border-radius: 25px;
            background-color: #2C54C1;
            margin-top: 5px;
            }

            .chip img {
            float: left;
            margin: 0 10px 0 -25px;
            height: 50px;
            width: 50px;
            border-radius: 50%;
            }

            .zoom {
            transition: transform .3s;
            }

            .zoom:hover {
            -ms-transform: scale(1.4); /* IE 9 */
            -webkit-transform: scale(1.4); /* Safari 3-8 */
            transform: scale(1.4); 
            }

        </style>
  </head>

    <body>

        <!-- Back-to-Top and Back Button -->

        <a data-toggle="tooltip" title="Back-To-Top" class="top-link hide" href="" id="js-top">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 12 6"><path d="M12 6H0l6-6z"/></svg>
            <span class="screen-reader-text">Back to top</span>
        </a>

        <!-- Eto yung navbar -->

        <nav class="navbar navbar-dark bg-primary sticky-top">
            <a class="navbar-brand" href="resident_homepage.php">Barangay Calaocan Information System</a>
            <a href="resident_homepage.php" data-toggle="tooltip" title="Home" class="btn1 bg-primary"><i class="fa fa-home fa-lg"></i></a>
            <a href="#down3" data-toggle="tooltip" title="Procedure" class="btn5 bg-primary"><i class="fa fa-question fa-lg"></i></a>
            <a href="#down2" data-toggle="tooltip" title="Information" class="btn4 bg-primary"><i class="fa fa-info fa-lg"></i></a>
            <a href="#down1" data-toggle="tooltip" title="Registration" class="btn3 bg-primary"><i class="fa fa-edit fa-lg"></i></a>
            <a href="#down" data-toggle="tooltip" title="Contact" class="btn2 bg-primary"><i class="fa fa-phone fa-lg"></i></a>
           
            <div class="dropdown ml-auto">
                <button title="Your Account" class="btn btn-primary dropdown-toggle" style="margin-right: 2px;" type="button" data-toggle="dropdown"><?= $userdetails['surname'];?>, <?= $userdetails['firstname'];?>
                    <span class="caret" style="margin-left: 2px;"></span>
                </button>
                <ul class="dropdown-menu" style="width: 175px;" >
                    <a class="btn" href="resident_profile.php?id_resident=<?= $userdetails['id_resident'];?>"> <i class="fas fa-user"> &nbsp; </i>Personal Profile  </a>
                    <a class="btn" href="resident_changepass.php?id_resident=<?= $userdetails['id_resident'];?>"> <i class="fas fa-lock" >&nbsp;</i> Change Password  </a>
                    <a class="btn" href="logout.php"> <i class="fas fa-sign-out-alt">&nbsp;</i> Logout  </a>
                </ul>
            </div>
        </nav>

        <div class="container-fluid container1"> 
            <div class="row"> 
                <div class="col"> 
                    <div class="header">
                        <h1 class="text1">Livestock Travel Permit</h1>
                        <h5>The described livestock is permitted to travel from one location to another.<br>It serves as an authorization for the transportation of livestock and ensures compliance with <br>regulations and standards regarding animal movement and health.</h5>
                    </div>


                    <br>

                    <img class="picture" src="icons/Documents/docu1.png">
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <img class="picture" src="icons/Documents/docu3.png">
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <img class="picture" src="icons/Documents/docu2.png">
                </div>
            </div>
        </div>

        <div id="down3"></div>

        <br>
        <br>
        <br>

        <div class="container text-center">
            <div class="row">
                <div class="col">
                    <h1>Procedure</h1>
                    <hr style="background-color: black;">
                </div>
            </div>

            <br>

            <div class="row">
                <div class="col">
                    <i class="fas fa-laptop fa-7x"></i>

                    <br>
                    <br>

                    <h3>Step 1: Fill-Up</h3>
                    <p>First step is to Fill-Up the entire form in our system.</p>
                </div>

                <div class="col">
                    <i class="fas fa-user-check fa-7x"></i>

                    <br>
                    <br>

                    <h3>Step 2: Assessment</h3>
                    <p>Second step is to verify all of the information you've been given
                    in our system that we can use to make the information of your document
                    accurately.</p>
                </div>

                <div class="col">
                    <i class="fas fa-file fa-7x"></i>

                    <br>
                    <br>

                    <h3>Step 3: Release</h3>
                    <p>Fourth step is for releasing of your document.</p>
                </div>
            </div>

            <div id="down2"></div>

            <br>
            <br>
            <br>

            <div class="row">
                <div class="col">
                    <h1>Other Details</h1>
                    <hr style="background-color: black;">
                </div>
            </div>

            <br> 

            <div class="row text2">
                <div class="col">
                    <div class="card bg-primary card1">
                        <div class="card-header">
                            <h5> Eligibility <br><br> <i class="fas fa-user-check fa-2x"></i>  </h5>
                        </div>
                        <div class="card-body">
                            <ul style="text-align: left; font-size: 16px;">
                                <p class="card-text">
                                    <li> A Philippines Resident. </li>
                                    <li> Recent Cedula. </li>
                                </p>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card bg-primary card2">
                        <div class="card-header">
                            <h5> Validity <br><br> <i class="fas fa-clipboard-check fa-2x"></i>  </h5>
                        </div>
                        <div class="card-body">
                            <ul style="text-align: left; font-size: 16px;">
                                <p class="card-text">
                                    <li> Valid for Six (6) Months. Not valid without Barangay dry seal </li>
                                </p>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card bg-primary card3">
                        <div class="card-header">
                            <h5> Fees <br><br> <i class="fas fa-coins fa-2x"></i>  </h5>
                        </div>
                        <div class="card-body">
                            <ul style="text-align: justify;">
                                <p class="card-text">
                                    <li> 100% Free </li>
                                </p>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card bg-primary card4">
                        <div class="card-header">
                            <h5 style="font-size: 19.4px;"> Processing Time <br><br> <i class="fas fa-clock fa-2x"></i>  </h5>
                        </div>
                        <div class="card-body">
                            <ul style="text-align: justify;">
                                <p class="card-text">
                                    <li> Within Working Hours (8:00am - 5:00pm) </li>
                                </p>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div id="down1"></div>

        <br>
        <br>
        <br>

        <!-- Button trigger modal -->

        <div class="container">

            <h1 class="text-center">Registration</h1>
            <hr style="background-color:black;">

            <div class="col">   
                <button type="button" class="btn btn-primary applybutton" data-toggle="modal" data-target="#exampleModalCenter">
                    Request Form
                </button>
            </div>


            <!-- Modal -->

            <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalCenterTitle">Livestock Travel Permit</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                        <!-- Modal Body -->

                        <div class="modal-body">
                            <form method="post" class="was-validated">

                                <div class="row"> 

                                    <div class="col" colspan="2">
                                        <div class="form-group">
                                            <label for="prev_owner">Previous Owner:</label>
                                            <input name="prev_owner" type="text" class="form-control" 
                                                   placeholder="Enter Full Name (Last Name, First Name)" 
                                                   value="<?= $userdetails['surname'] . ', ' . $userdetails['firstname'] ?>" required>
                                            <div class="valid-feedback">Valid.</div>
                                            <div class="invalid-feedback">Please fill out this field.</div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="buyers_name">Buyer's Name:</label>
                                            <input name="buyers_name" type="text" class="form-control" 
                                            placeholder="Enter Buyer's Name" required>
                                                <div class="valid-feedback">Valid.</div>
                                                <div class="invalid-feedback">Please fill out this field.</div>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="purpose">Purpose:</label>
                                            <select class="form-control" name="purpose" id="purpose" placeholder="Enter Purpose" required>
                                                <option value="">Choose your Purpose</option>
                                                <option value="Transportation">Transportaion</option>
                                                <option value="Sale">Sale</option>
                                                <option value="Exhibition/Show">Exhibition/Show</option>
                                                <option value="Medical Treatment">Medical Treatment</option>
                                                <option value="Breeding">Breeding</option>
                                                <option value="Other">Other</option>
                                            </select>
                                            <div class="valid-feedback">Valid.</div>
                                            <div class="invalid-feedback">Please fill out this field.</div>
                                        </div>
                                    </div>
                                </div>
                                    
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label> House No: </label>
                                            <input type="text" class="form-control" name="houseno"  
                                            placeholder="Enter House No." value="<?= $userdetails['houseno']?>"  required>
                                            <div class="valid-feedback">Valid.</div>
                                            <div class="invalid-feedback">Please fill out this field.</div>
                                        </div>
                                    </div>

                                    <div class="col">
                                        <div class="form-group">
                                            <label> Street: </label>
                                            <input type="text" class="form-control" name="street"  
                                            placeholder="Enter Purok" value="<?= $userdetails['street']?>" required>
                                            <div class="valid-feedback">Valid.</div>
                                            <div class="invalid-feedback">Please fill out this field.</div>
                                        </div>
                                    </div>

                                    <div class="col">
                                        <div class="form-group">
                                            <label> Barangay: </label>
                                            <input type="text" class="form-control" name="brgy"  value="Yuson"
                                            placeholder="Enter Barangay" value="<?= $userdetails['brgy']?>" required>
                                            <div class="valid-feedback">Valid.</div>
                                            <div class="invalid-feedback">Please fill out this field.</div>
                                        </div>
                                    </div>

                                    <div class="col">
                                        <div class="form-group">
                                            <label> Municipality: </label>
                                            <input type="text" class="form-control" name="municipal" value="Guimba"
                                            placeholder="Enter Municipality" value="<?= $userdetails['municipal']?>" required>
                                            <div class="valid-feedback">Valid.</div>
                                            <div class="invalid-feedback">Please fill out this field.</div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="breed">Livestock Breed:</label>
                                            <select class="form-control" name="breed" id="breed" placeholder="Enter Breed" required>
                                                <option value="">Select Breed</option>
                                                <option value="Cattle">Cattle</option>
                                                <option value="Sheep">Sheep</option>
                                                <option value="Goat">Goat</option>
                                                <option value="Pig">Pig</option>
                                                <option value="Horse">Horse</option>
                                                <option value="Chicken">Chicken</option>
                                                <option value="Turkey">Turkey</option>
                                                <option value="Duck">Duck</option>
                                                <option value="Goose">Goose</option>
                                                <option value="Other">Other</option>
                                            </select>
                                            <div class="valid-feedback">Valid.</div>
                                            <div class="invalid-feedback">Please fill out this field.</div>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="gender">Gender</label>
                                            <select class="form-control" name="gender" id="gender" placeholder="Enter Gender" required>
                                                <option value="">Choose your Status</option>
                                                <option value="Female">Female</option>
                                                <option value="Male">Male</option>
                                            </select>
                                            <div class="valid-feedback">Valid.</div>
                                            <div class="invalid-feedback">Please fill out this field.</div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="row">
        <div class="col">
            <div class="form-group">
                <label for="color">Livestock Color:</label>
                <select class="form-control" name="color" id="color" required>
                    <option value="">Select Color</option>
                    <option value="Black">Black</option>
                    <option value="White">White</option>
                    <option value="Brown">Brown</option>
                    <option value="Gray">Gray</option>
                    <option value="Spotted">Spotted</option>
                    <option value="Red">Red</option>
                    <option value="Tan">Tan</option>
                    <option value="Cream">Cream</option>
                    <option value="Other">Other</option>
                </select>
                <div class="valid-feedback">Valid.</div>
                <div class="invalid-feedback">Please select a color.</div>
            </div>
        </div>
        <div class="col">
            <div class="form-group">
                <label for="destination">Destination:</label>
                <select class="form-control" name="destination" id="destination" required>
                    <option value="">Select Destination</option>
                    <option value="Farm">Farm</option>
                    <option value="Market">Market</option>
                    <option value="Abattoir/Slaughterhouse">Abattoir/Slaughterhouse</option>
                    <option value="Show/Exhibition">Show/Exhibition</option>
                    <option value="Other">Other</option>
                </select>
                <div class="valid-feedback">Valid.</div>
                <div class="invalid-feedback">Please select a destination.</div>
            </div>
        </div>
    </div>
                            
                        </div>

                        <!-- Modal Footer -->
            
                        <div class="modal-footer">
                            <div class="paa">
                                <input name="id_resident" type="hidden" class="form-control" value="<?= $userdetails['id_resident']?>">
                                <input name="addedby" type="hidden" class="form-control" value="<?= $userdetails['surname']?> <?= $userdetails['firstname']?> <?= $userdetails['mname']?>">
                                <button type="button" class="btn btn-dark" data-dismiss="modal">Close</button>
                                <button name ="create_travelpermit" type="submit" class="btn btn-primary">Submit Request</button>
                            </div>
                        </div> 
                    </div>
                </div>
            </div>
        </div>
        </form>
        

        <br>
        <br>
        <br>

        <!-- Footer -->

        <footer id="footer" class="bg-primary text-white d-flex-column text-center">
            <hr class="mt-0">

            <div class="text-center">
                <h1>Services</h1>
                <ul class="list-unstyled list-inline">

                &nbsp;

                <li class="list-inline-item">
                    <a href="#!" class="sbtn btn-large mx-1" title="Documents">
                    <i class="fas fa-file fa-2x"></i>
                    </a>
                </li>

                &nbsp;

                <li class="list-inline-item">
                    <a href="#!" class="sbtn btn-large mx-1" title="Card">
                    <i class="fas fa-id-card fa-2x"></i>
                    </a>
                </li>

                &nbsp;

                <li class="list-inline-item">
                    <a href="#!" class="sbtn btn-large mx-1" title="Friend">
                    <i class="fas fa-user-friends fa-2x"></i>
                    </a>
                </li>

                &nbsp;

                <li class="list-inline-item">
                    <a href="#!" class="sbtn btn-large mx-1" title="Blotter">
                    <i class="fas fa-user-shield fa-2x"></i>
                    </a>
                </li>

                &nbsp;

                <li class="list-inline-item">
                    <a href="#!" class="sbtn btn-large mx-1" title="Contact">
                    <i class="fas fa-phone fa-2x"></i>
                    </a>
                </li>
                </ul>
            </div>

            <hr class="mb-0">

            <!--Footer Links-->

            <div class="container text-left text-md-center">
                <div class="row">

                    <!--First column-->

                    <div class="col-md-3 mx-auto shfooter">
                        <h5 class="my-2 font-weight-bold d-none d-md-block">Documentation</h5>
                        <div class="d-md-none title" data-target="#Documentation" data-toggle="collapse">
                            <div class="mt-3 font-weight-bold">Documentation
                                <div class="float-right navbar-toggler">
                                    <i class="fas fa-angle-down"></i>
                                    <i class="fas fa-angle-up"></i>
                                </div>
                            </div>
                        </div>
                        <ul class="list-unstyled collapse" id="Documentation">
                            <li><a href="services_certofres.php">Certificate of Residency</a></li>
                            <li><a href="services_brgyclearance.php">Barangay Clearance</a></li>
                            <li><a href="services_certofindigency.php">Certificate of Indigency</a></li>
                            <li><a href="services_business.php">Business Permit</a></li>
                            <li><a href="services_travelpermit.php">Travel Permit</a></li>

                        </ul>
                    </div>

                    <!--/.First column-->

                    <hr class="clearfix w-100 d-md-none mb-0">

                    <!--Third column-->

                    <div class="col-md-3 mx-auto shfooter">
                        <h5 class="my-2 font-weight-bold d-none d-md-block">Other Services</h5>
                        <div class="d-md-none title" data-target="#OtherServices" data-toggle="collapse">
                            <div class="mt-3 font-weight-bold">Other Services
                                <div class="float-right navbar-toggler">
                                    <i class="fas fa-angle-down"></i>
                                    <i class="fas fa-angle-up"></i>
                                </div>
                            </div>
                        </div>

                        <ul class="list-unstyled collapse" id="OtherServices">
                            <li><a href="services_blotter.php">Peace and Order</a></li>
                        </ul>
                    </div>

                    <!--/.Third column-->

                    <hr class="clearfix w-100 d-md-none mb-0">
 
                    <!--Fourth column-->

                    <div class="col-md-3 mx-auto shfooter" id="down">
                        <h5 class="my-2 font-weight-bold d-none d-md-block">Contact Us:</h5>
                        <div class="d-md-none title" data-target="#Get-Help" data-toggle="collapse">
                        <div class="mt-3 font-weight-bold">Contact Us:
                            <div class="float-right navbar-toggler">
                            <i class="fas fa-angle-down"></i>
                            <i class="fas fa-angle-up"></i>
                            </div>
                        </div>
                        </div>
                        <ul class="list-unstyled collapse" id="Get-Help">
                            <li>
                                <div class="zoom">
                                    <div class="chip" style="font-size:10px;">
                                      <img src="icons/Contact/Rafael.jpg" alt="Person" width="96" height="96">
                                      Rafael M Tosper Jr | 09677690471
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="zoom">
                                    <div class="chip" style="font-size:10px;">
                                        <img src="icons/Contact/yanyan.jpg" alt="Person" width="96" height="96">
                                    Marian C. Simon | 09669982735
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="zoom">
                                    <div class="chip" style="font-size:10px;">
                                        <img src="icons/Contact/Katrina.jpg" alt="Person" width="96" height="96">
                                         Katrina T Obena | 09062586156
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="zoom">
                                    <div class="chip" style="font-size:10px;">
                                        <img src="icons/Contact/kristine.jpg" alt="Person" width="96" height="96">
                                        Kristine Joy G Villiano | 09301112368
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="zoom">
                                    <div class="chip" style="font-size:10px;">
                                        <img src="icons/Contact/Jayvee.jpg" alt="Person" width="96" height="96">
                                        Jayvee T Mangalino| 09464092423
                                    </div>
                                </div>
                                <li>
                                <div class="zoom">
                                    <div class="chip" style="font-size:10px;">
                                        <img src="icons/Contact/Marjun.jpg" alt="Person" width="96" height="96">
                                        Marjun A. Tayag | 09133456775
                                    </div>
                                </div>
                            </li>
                            </li>
                        </ul>
                    </div>

                    <!--/.Fourth column-->

                </div>
            </div>

            <!--/.Footer Links-->

            <hr class="mb-0">

            <!--Copyright-->

            <div class="py-3 text-center">
                2023 -
                <script>
                document.write(new Date().getFullYear())
                </script> 
                 Barangay Calaocan Information System
            </div>

        </footer>

        <script>
            // Set a variable for our button element.
            const scrollToTopButton = document.getElementById('js-top');

            // Let's set up a function that shows our scroll-to-top button if we scroll beyond the height of the initial window.
            const scrollFunc = () => {
            // Get the current scroll value
            let y = window.scrollY;
            
            // If the scroll value is greater than the window height, let's add a class to the scroll-to-top button to show it!
            if (y > 0) {
                scrollToTopButton.className = "top-link show";
            } else {
                scrollToTopButton.className = "top-link hide";
            }
            };

            window.addEventListener("scroll", scrollFunc);

            const scrollToTop = () => {
            // Let's set a variable for the number of pixels we are from the top of the document.
            const c = document.documentElement.scrollTop || document.body.scrollTop;
            
            // If that number is greater than 0, we'll scroll back to 0, or the top of the document.
            // We'll also animate that scroll with requestAnimationFrame:
            // https://developer.mozilla.org/en-US/docs/Web/API/window/requestAnimationFrame
            if (c > 0) {
                window.requestAnimationFrame(scrollToTop);
                // ScrollTo takes an x and a y coordinate.
                // Increase the '10' value to get a smoother/slower scroll!
                window.scrollTo(0, c - c / 10);
            }
            };

            // When the button is clicked, run our ScrolltoTop function above!
            scrollToTopButton.onclick = function(e) {
            e.preventDefault();
            scrollToTop();
            }
        </script>

        <script>
            $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();   
            });
        </script>

        <script>
            $(document).ready(function(){
            // Add smooth scrolling to all links
            $("a").on('click', function(event) {

                // Make sure this.hash has a value before overriding default behavior
                if (this.hash !== "") {
                // Prevent default anchor click behavior
                event.preventDefault();

                // Store hash
                var hash = this.hash;

                // Using jQuery's animate() method to add smooth page scroll
                // The optional number (800) specifies the number of milliseconds it takes to scroll to the specified area
                $('html, body').animate({
                    scrollTop: $(hash).offset().top
                }, 800, function(){

                    // Add hash (#) to URL when done scrolling (default click behavior)
                    window.location.hash = hash;
                });
                } // End if
            });
            });
        </script>

        <script src="bootstrap/js/bootstrap.bundle.js" type="text/javascript"> </script>

    </body>
</html>
