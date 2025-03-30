    <?php
    if(!isset($_SESSION['admin'])){header('Location: index.php');}

    ini_set('display_errors', 0);
    error_reporting(E_ALL ^ E_WARNING);
    include('classes/staff.class.php');
    include('classes/resident.class.php');

    $userdetails = $bmis->get_userdata();
    $bmis->validate_admin();
    $rescount = $residentbmis->count_resident();
    $rescountm = $residentbmis->count_male_resident();
    $rescountf = $residentbmis->count_female_resident();
    $rescountfh = $residentbmis->count_head_resident();
    $rescountfm = $residentbmis->count_member_resident();
    $rescountvoter = $residentbmis->count_voters();
    $rescountsenior = $residentbmis->count_resident_senior();

    $staffcount = $staffbmis->count_staff();
    $staffcountm = $staffbmis->count_mstaff();
    $staffcountf = $staffbmis->count_fstaff();

    $view = $residentbmis->view_resident();
    $residentbmis->create_resident();
    $upstaff = $residentbmis->update_resident();
    $residentbmis->delete_resident();

    include('dashboard_sidebar_start.php');

    ?>

    <!-- Page Wrapper -->

    <!-- End of Sidebar -->
    <style>
        .input-icons i {
            position: absolute;
        }

        .input-icons {
            width: 80%;
            margin-bottom: 10px;
            margin-left: auto;
            margin-right: auto;
        }

        .icon {
            padding: 10px;
            min-width: 40px;
        }

        .form-control {
            text-align: center;
        }

        .tbox {
        position: absolute;
        display: none;
        padding: 14px 17px;
        z-index: 900;
    }

    .tinner {
        padding: 15px;
        -moz-border-radius: 5px;
        border-radius: 5px;
        background: #fff url(assets/images/preload.gif) no-repeat 50% 50%;
        border-right: 1px solid #333;
        border-bottom: 1px solid #333;
    }

    .tmask {
        position: absolute;
        display: none;
        top: 0px;
        left: 0px;
        height: 100%;
        width: 100%;
        background: #000;
        z-index: 800
    }

    .tclose {
        position: absolute;
        top: 0px;
        right: 0px;
        width: 30px;
        height: 30px;
        cursor: pointer;
        background: url(../assets/images/close.png) no-repeat
    }

    .tclose:hover {
        background-position: 0 -30px
    }

    #error {
        background: #ff6969;
        color: #fff;
        text-shadow: 1px 1px #cf5454;
        border-right: 1px solid #000;
        border-bottom: 1px solid #000;
        padding: 0
    }

    #error .tcontent {
        padding: 10px 14px 11px;
        border: 1px solid #ffb8b8;
        -moz-border-radius: 5px;
        border-radius: 5px
    }

    #success {
        background: #2ea125;
        color: #fff;
        text-shadow: 1px 1px #1b6116;
        border-right: 1px solid #000;
        border-bottom: 1px solid #000;
        padding: 10;
        -moz-border-radius: 0;
        border-radius: 0
    }

    #bluemask {
        background: #4195aa
    }

    #frameless {
        padding: 0
    }

    #frameless .tclose {
        left: 6px
    }
    </style>

    <!-- Begin Page Content -->
    <div class="container-fluid">
        <h1 class="mb-4 text-center">Barangay Residents Data</h1>

        <hr>
        <br>

        <div class="row">
            <div class="col">
                <form method="POST">
                    <div class="input-icons">
                        <i class="fa fa-search icon"></i>
                        <input type="search" class="form-control" name="keyword" value="" required="" style="border-radius: 30px;" />
                    </div>
                    <button class="btn btn-success" name="search_certofres" style="width: 70px; font-size: 15px; border-radius:5px; margin-left:42%;">
                        Search
                    </button>
                    <a href="admn_resident_crud.php" class="btn btn-info" style="width: 70px; font-size: 15px; border-radius:5px;">Reload</a>
                </form>
            </div>
            <div class="col-md-12" style="text-align: center;">
    <a href="resident_add.php" class="btn btn-success" style="display: flex; align-items: center; justify-content: center; width: 95px; height: 40px; font-size: 14px; border-radius: 5px; margin-bottom: 5px;">
        <i class="fas fa-plus icon" style="margin-right: 5px;"></i>Add
    </a>
    <?php include('admn_table_resident_search.php'); ?>
</div>


    <!-- End of Main Content -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-modal/2.2.6/js/bootstrap-modalmanager.min.js" integrity="sha512-/HL24m2nmyI2+ccX+dSHphAHqLw60Oj5sK8jf59VWtFWZi9vx7jzoxbZmcBeeTeCUc7z1mTs3LfyXGuBU32t+w==" crossorigin="anonymous"></script>
    <!-- responsive tags for screen compatibility -->
    <meta name="viewport" content="width=device-width, initial-scale=1 shrink-to-fit=no">
    <!-- custom css -->
    <link href="customcss/regiformstyle.css" rel="stylesheet" type="text/css">
    <!-- bootstrap css -->
    <link href="bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css">
    <!-- fontawesome icons -->
    <script src="https://kit.fontawesome.com/67a9b7069e.js" crossorigin="anonymous"></script>
    <script src="bootstrap/js/bootstrap.bundle.js" type="text/javascript"> </script>
    <script src="assets/js/tinybox.js"></script>

    <script>
        $(document).ready(function() {
            $('.residency').on('click', function() {
                var idResident = $(this).data('id');
                $('.resid').val(idResident);
                // Show the modal
                $('#modalResidency').modal('show');
            });

            $('.business').on('click', function() {
                var idResident = $(this).data('id');
                $('.busid').val(idResident);

                // Show the modal
                $('#modalBusiness').modal('show');
            });

            $('.clearance').on('click', function() {
                var idResident = $(this).data('id');
                $('.clearid').val(idResident);

                // Show the modal
                $('#modalClearance').modal('show');
            });

            $('.indigency').on('click', function() {
                var idResident = $(this).data('id');
                $('.indiid').val(idResident);

                // Show the modal
                $('#modalIndigency').modal('show');
            });

        });
    </script>

    <script>
        $(".toggle-password").click(function() {
            $(this).toggleClass("fa-eye fa-eye-slash");
            var input = $($(this).attr("toggle"));
            if (input.attr("type") == "password") {
                input.attr("type", "text");
            } else {
                input.attr("type", "password");
            }
        });

        function calculateAge() {
            var birthdate = document.getElementById('birthdate').value;
            var today = new Date();
            var birthdateObj = new Date(birthdate);
            var age = today.getFullYear() - birthdateObj.getFullYear();

            // Check if the birthday has occurred this year
            if (today.getMonth() < birthdateObj.getMonth() || (today.getMonth() === birthdateObj.getMonth() && today.getDate() < birthdateObj.getDate())) {
                age--;
            }

            // Update the "Age" input field
            document.getElementById('age').value = age;
        }
    </script>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="logout.php">Logout</a>
                </div>
            </div>
        </div>
    </div>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-modal/2.2.6/js/bootstrap-modalmanager.min.js" integrity="sha512-/HL24m2nmyI2+ccX+dSHphAHqLw60Oj5sK8jf59VWtFWZi9vx7jzoxbZmcBeeTeCUc7z1mTs3LfyXGuBU32t+w==" crossorigin="anonymous"></script>
    <!-- responsive tags for screen compatibility -->
    <meta name="viewport" content="width=device-width, initial-scale=1 shrink-to-fit=no">
    <!-- custom css -->
    <link href="customcss/regiformstyle.css" rel="stylesheet" type="text/css">
    <!-- bootstrap css -->
    <link href="bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css">
    <!-- fontawesome icons -->
    <script src="https://kit.fontawesome.com/67a9b7069e.js" crossorigin="anonymous"></script>
    <script src="bootstrap/js/bootstrap.bundle.js" type="text/javascript"> </script>

    <?php
    include('dashboard_sidebar_end.php');
    ?>