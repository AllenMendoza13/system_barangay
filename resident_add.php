    <?php
        ini_set('display_errors',0);
        error_reporting(E_ALL ^ E_WARNING);
        include('classes/conn.php');
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
        $residentbmis->create_resident_admin();

        $randomStr = $residentbmis->randomStr();

        //$data = $bms->get_userdata();
        $_SESSION['tmp_add_family'] = 'tmp_add_family'.$randomStr;
        $result = $conn->prepare('DROP TABLE IF EXISTS ' . $_SESSION['tmp_add_family']);
        $result->execute();

        $str = "CREATE TABLE " . $_SESSION['tmp_add_family'] . " (
            `id` int(11) NOT NULL AUTO_INCREMENT,
            `family_lastname` varchar(128) DEFAULT '',
            `family_firstname` varchar(128) DEFAULT '',
            `family_middleinitial` varchar(128) DEFAULT '',
            `relationshipid` varchar(128) DEFAULT 0,
            `family_age` varchar(128) DEFAULT '',
            `familycivilid` varchar(128) DEFAULT 0,
            `occupation` varchar(128) DEFAULT '',
            `income` varchar(128) DEFAULT '',
            PRIMARY KEY(`id`)
        ) ENGINE=InnoDB DEFAULT CHARSET=latin1;";

        $insert = $conn->prepare($str);
        $insert->execute();


    ?>

    <!DOCTYPE html>
    <html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Barangay Calaocan Information System</title>

        <!-- Custom fonts for this template-->
        <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
        <link
            href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
            rel="stylesheet">
        
        <!-- Custom styles for this template-->
        <link href="css/sb-admin-2.min.css" rel="stylesheet">
        <script src="https://kit.fontawesome.com/67a9b7069e.js" crossorigin="anonymous"></script>
    </head>

    <body id="page-top">

        <!-- Page Wrapper -->
        <?php
            include('dashboard_sidebar_start.php');
            ?>
            <!-- End of Sidebar -->
    <style>


    .search{
            text-align: center;
        }

    .password-input {
        position: relative;
    }

    .password-input input {
        padding-right: 30px; /* Adjust the padding to accommodate the icon */
    }

    .password-input .toggle-password {
        position: absolute;
        top: 50%;
        right: 10px; /* Adjust the position as needed */
        transform: translateY(-50%);
        cursor: pointer;
        z-index: 1;
    }
    </style>

    <script>
    function ajax_new_v2(url_, table_id) {
        $.ajax({
            url: url_,
            method: "POST",
            data: {record: 1},
            success: function(data) {
                $('#' + table_id).html(data);
                $('#myTable').DataTable();
                openContainer(table_id); 
            }
        });
    }

    function tmp_add_family() {
        let myForm = new FormData();
        myForm.append('family_lastname', document.getElementById('family_lastname').value);
        myForm.append('family_firstname', document.getElementById('family_firstname').value);
        myForm.append('family_middleinitial', document.getElementById('family_middleinitial').value);
        myForm.append('family_relationship', document.getElementById('family_relationship').value);
        myForm.append('family_age', document.getElementById('family_age').value);
        myForm.append('family_civilstatus', document.getElementById('family_civilstatus').value);
        myForm.append('family_occupation', document.getElementById('family_occupation').value);
        myForm.append('family_income', document.getElementById('family_income').value);
        myForm.append('add', 1);
        myForm.append('table_name', document.getElementById('tbl_name').value);
        $.ajax({
            url: 'tmp_add_family.php',
            type: 'POST',
            data: myForm,
            contentType: false,
            processData: false,
            success: function(data) {
                $('#tmp_add').html(data);
                $('#tmp_add').css('opacity', '1');
                document.getElementById('family_lastname').value = '';
                document.getElementById('family_firstname').value = '';
                document.getElementById('family_middleinitial').value = '';
                document.getElementById('family_age').value = '';
                document.getElementById('family_occupation').value = '';
                document.getElementById('family_income').value = '';
            },
            error: function() {
                alert('Error Processing Request ');
            }
        });
    }


    function delete_(id) {
        let myForm = new FormData();
        myForm.append('table_name', document.getElementById('table_name').value);
        myForm.append('delete', id)
        $.ajax({
            url: 'tmp_add_family.php',
            type: 'POST',
            data: myForm,
            contentType: false,
            processData: false,
            success: function(data) {
                $('#tmp_add').html(data);
                $('#tmp_add').css('opacity', '1');
            },
            error: function() {
                alert('Error Processing Request ');
            }
        });
    }
    </script>

        <!-- Begin Page Content -->
        <div class="container-fluid">
            <h1 class="mb-4 text-center">Barangay Residents Data</h1>

            <hr>
            <br>

            <!-- Page Heading -->
                        
   

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <form method="post">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-12 col-md-4">
                                        <div class="form-group">
                                            <label>Last Name:</label>
                                            <input type="hidden" name="admin_id" value="<?=$_SESSION['id_admin']?>">
                                            <input type="text" class="form-control" name="lname" placeholder="Enter Last Name" pattern="[A-Za-z]{2,}" title="Please enter at least 2 letters, and only use letters." required>
                                            <div class="valid-feedback">Valid.</div>
                                            <div class="invalid-feedback">Please fill out this field.</div>
                                        </div>
                                    </div>

                                    <div class="col-12 col-md-4">
                                        <div class="form-group">
                                            <label>First Name:</label>
                                            <input type="text" class="form-control" name="fname" placeholder="Enter First Name" pattern="[A-Za-z ]{2,}" title="Please enter at least 2 letters, and only use letters." required>
                                            <div class="valid-feedback">Valid.</div>
                                            <div class="invalid-feedback">Please fill out this field.</div>
                                        </div>
                                    </div>

                                    <div class="col-12 col-md-4">
                                        <div class="form-group">
                                            <label>Middle Name:</label>
                                            <input type="text" class="form-control" name="mi" placeholder="Enter Middle Name" pattern="[A-Za-z]{2,}" title="Please enter at least 2 letters, and only use letters.">
                                            <div class="valid-feedback">Valid.</div>
                                            <div class="invalid-feedback">Please fill out this field.</div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-12 col-md-4">
                                        <div class="form-group">
                                            <label>Contact Number:</label>
                                            <input type="tel" class="form-control" name="contact" maxlength="11" pattern="[0-9]{11}" placeholder="Enter Contact Number" required>
                                            <div class="valid-feedback">Valid.</div>
                                            <div class="invalid-feedback">Please fill out this field.</div>
                                        </div>
                                    </div>

                                    <div class="col-12 col-md-4">
                                        <div class="form-group">
                                            <label>Email:</label>
                                            <input type="email" class="form-control" name="email" placeholder="Enter Email" required>
                                            <div class="valid-feedback">Valid.</div>
                                            <div class="invalid-feedback">Please fill out this field.</div>
                                        </div>
                                    </div>

                                    <div class="col-12 col-md-4">
                                        <div class="form-group">
                                            <label>Password:</label>
                                            <div class="password-input position-relative">
                                                <input type="password" class="form-control" id="password-field" name="password" placeholder="Enter Password" minlength="8" maxlength="16"  title="Password must be 8-16 characters long and contain at least one uppercase letter, one lowercase letter, one digit, and one special character (@, _, #, or *)." required>
                                                <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password position-absolute end-0 top-50 translate-middle-y me-3" style="cursor:pointer;"></span>
                                            </div>
                                            <div class="valid-feedback">Valid.</div>
                                            <div class="invalid-feedback">Password must be 8-16 characters long and contain at least one uppercase letter, one lowercase letter, one digit, and one special character (@, _, #, or *).</div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-12 col-md-3">
                                        <div class="form-group">
                                            <label>House Number:</label>
                                            <input type="text" class="form-control" name="houseno" placeholder="Enter House Number" pattern="[A-Za-z0-9\s]{2}" title="Please enter at least 2 letters." required>
                                            <div class="invalid-feedback">Please fill out this field.</div>
                                        </div>
                                    </div>

                                    <div class="col-12 col-md-3">
                                        <div class="form-group">
                                            <label>Purok & Street:</label>
                                            <input type="text" class="form-control" name="street" placeholder="Enter Purok & Street Name" pattern="[A-Za-z0-9\s]{2,}" title="Please enter at least 10 letters." required>
                                            <div class="valid-feedback">Valid.</div>
                                            <div class="invalid-feedback">Please fill out this field.</div>
                                        </div>
                                    </div>

                                    <div class="col-12 col-md-3">
                                        <div class="form-group">
                                            <label>Barangay:</label>
                                            <input type="text" class="form-control" name="brgy" value="Calaocan" readonly required>
                                        </div>
                                    </div>

                                    <div class="col-12 col-md-3">
                                        <div class="form-group">
                                            <label>Municipality:</label>
                                            <input type="text" class="form-control" name="municipal" value="Santiago City" readonly required>
                                        </div>
                                    </div>
                                </div>

                                <!-- new form item -->
                                <div class="container-fluid">
                                    <div class="row d-flex mb-4">
                                        <div class="col-12 col-md-4" style="display: flex; flex-direction:column;">
                                            <h6>Do you have PSA birth certificate?</h6>
                                            <div style="display: flex; gap: 10px;">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="psa" id="psa" value="Yes">
                                                    <label class="form-check-label" for="psa">
                                                        Yes
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="psa" id="psa2" value="No">
                                                    <label class="form-check-label" for="psa2">
                                                        No
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
    
                                        <div class="col-12 col-md-4" style="display: flex; flex-direction:column;">
                                            <h6>Correction in your PSA birth certificate?</h6>
                                            <div style="display: flex; gap: 10px;">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="psa_correction" id="psa_yes" value="Yes">
                                                    <label class="form-check-label" for="psa_yes">
                                                        Yes
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="psa_correction" id="psa_no" value="No">
                                                    <label class="form-check-label" for="psa_no">
                                                        No
                                                    </label>
                                                </div>
                                                <input type="text" id="psa_c" name="psa_c" style="display: none;" class="form-control" placeholder="If yes please specify">
    
                                            </div>
                                        </div>
    
                                        <div class="col-12 col-md-4" style="display: flex; flex-direction: column;">
                                            <h6>Do you have National ID?</h6>
                                            <div style="display: flex; gap: 10px;">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="ntnlid" id="ntnlid" value="Yes">
                                                    <label class="form-check-label" for="ntnlid">
                                                        Yes
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="ntnlid" id="ntnlid2" No>
                                                    <label class="form-check-label" for="ntnlid2">
                                                        No
                                                    </label>
                                                </div>
                                                <input type="text" id="ntlid_input" name="ntlid_" style="display: none;" class="form-control" placeholder="National ID Number">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="container-fluid mb-4">
                                    <div class="row">
                                    <div class="col-12 col-md-3" style="display: flex; flex-direction:column;">
                                        <h6>Do you have domesticated animals?</h6>
                                        <div style="display: flex; gap: 10px;">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="d_a" id="da_yes" value="Yes">
                                                <label class="form-check-label" for="da_yes">
                                                    Yes
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="d_a" id="da_no" value="No">
                                                <label class="form-check-label" for="da_no">
                                                    No
                                                </label>
                                            </div>
                                            <input type="text" id="dom_a" name="dom_a" style="display: none;" class="form-control" placeholder="If yes please specify">

                                        </div>
                                    </div>

                                    <div class="col-12 col-md-3" style="display: flex; flex-direction:column;">
                                        <h6>Do you have trees in your yard?</h6>
                                        <div style="display: flex; gap: 10px;">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="trees" id="trees_yes" value="Yes">
                                                <label class="form-check-label" for="trees_yes">
                                                    Yes
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="trees" id="trees_no" value="No">
                                                <label class="form-check-label" for="trees_no">
                                                    No
                                                </label>
                                            </div>
                                            <input type="text" id="trees_" name="trees_" style="display: none;" class="form-control" placeholder="If yes please specify">

                                        </div>
                                    </div>

                                    <div class="col-12 col-md-3" style="display: flex; flex-direction:column;">
                                        <h6>Are you a farmer?</h6>
                                        <div style="display: flex; gap: 10px;">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="farmer" id="farmer_yes" value="Yes">
                                                <label class="form-check-label" for="farmer_yes">
                                                    Yes
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="farmer" id="farmer_no" value="No">
                                                <label class="form-check-label" for="farmer_no">
                                                    No
                                                </label>
                                            </div>
                                            <input type="text" id="farmer_" name="farmer_" style="display: none;" class="form-control" placeholder="If yes what field">

                                        </div>
                                    </div>

                                    <div class="col-12 col-md-3" style="display: flex; flex-direction:column;">
                                        <h6>Do you grow vegetables in your yard?</h6>
                                        <div style="display: flex; gap: 10px;">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="veges" id="veges_yes" value="Yes">
                                                <label class="form-check-label" for="veges_yes">
                                                    Yes
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="veges" id="veges_no" value="No">
                                                <label class="form-check-label" for="veges_no">
                                                    No
                                                </label>
                                            </div>
                                            <input type="text" id="veges_" name="veges_" style="display: none;" class="form-control" placeholder="If yes please specify">

                                        </div>
                                    </div>

                                    </div>
                                </div>
                                <!-- end -->

                                <div class="row">
                                    <div class="col-12 col-md-4">
                                        <div class="form-group">
                                            <label>Birth Date:</label>
                                            <input type="date" class="form-control" name="bdate" id="birthdate" oninput="calculateAge()" required max="<?php echo date('Y-m-d'); ?>">
                                            <div class="valid-feedback">Valid.</div>
                                            <div class="invalid-feedback">Please fill out this field.</div>
                                        </div>
                                    </div>

                                    <div class="col-12 col-md-4">
                                        <div class="form-group">
                                            <label>Birth Place:</label>
                                            <input type="text" class="form-control" name="bplace" placeholder="Enter Birth Place" required>
                                            <div class="valid-feedback">Valid.</div>
                                            <div class="invalid-feedback">Please fill out this field.</div>
                                        </div>
                                    </div>

                                    <div class="col-12 col-md-4">
                                        <div class="form-group">
                                            <label>Nationality:</label>
                                            <select class="form-control" name="nationality" onchange="updateNationality(this.value)" required>
                                                <option value="Filipino" selected>Filipino</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-12 col-md-4">
                                        <div class="form-group">
                                            <label>Civil Status:</label>
                                            <select class="form-control" name="status" id="status" required>
                                                <option value="">Choose your Status</option>
                                                <option value="Single">Single</option>
                                                <option value="Married">Married</option>
                                                <option value="Live-in">Live-in partner</option>
                                                <option value="Widowed">Widowed</option>
                                                <option value="Divorced">Divorced</option>
                                            </select>
                                            <div class="valid-feedback">Valid.</div>
                                            <div class="invalid-feedback">Please fill out this field.</div>
                                        </div>
                                    </div>

                                    <div class="col-12 col-md-4">
                                        <div class="form-group">
                                            <label>Age:</label>
                                            <input class="form-control" name="age" id="age" required readonly>
                                        </div>
                                    </div>

                                    <div class="col-12 col-md-4">
                                        <div class="form-group">
                                            <label>Sex:</label>
                                            <select class="form-control" name="sex" id="sex" required>
                                                <option value="">Choose your Sex</option>
                                                <option value="Male">Male</option>
                                                <option value="Female">Female</option>
                                            </select>
                                            <div class="valid-feedback">Valid.</div>
                                            <div class="invalid-feedback">Please fill out this field.</div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="container-fluid m-1">
                                <div class="row">
                                    <div class="col-12 col-md-6">
                                        <label for="soi">Source of income</label>
                                        <input type="text" class="form-control" id="soi" name="soi" placeholder="">
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <label for="occupation">Occupation</label>
                                        <input type="text" class="form-control" id="occupation" name="occupation" placeholder="">
                                    </div>
                                </div>
                            </div>

                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-12 col-md-6">
                                        <div class="form-group">
                                            <label>Are you a registered voter?</label>
                                            <select class="form-control" name="voter" id="regvote" required>
                                                <option value="">...</option>
                                                <option value="Yes">Yes</option>
                                                <option value="No">No</option>
                                            </select>
                                            <div class="valid-feedback">Valid.</div>
                                            <div class="invalid-feedback">Please fill out this field.</div>
                                        </div>
                                    </div>

                                    <div class="col-12 col-md-6">
                                        <div class="form-group">
                                            <label>PWD?</label>
                                            <select class="form-control" name="pwd" id="pwd" required>
                                                <option value="">...</option>
                                                <option value="Yes">Yes</option>
                                                <option value="No">No</option>
                                            </select>
                                            <div class="valid-feedback">Valid.</div>
                                            <div class="invalid-feedback">Please fill out this field.</div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-12 col-md-4">
                                        <div class="form-group">
                                            <label>Indigent?</label>
                                            <select class="form-control" name="indigent" id="indigent" required>
                                                <option value="">...</option>
                                                <option value="Yes">Yes</option>
                                                <option value="No">No</option>
                                            </select>
                                            <div class="valid-feedback">Valid.</div>
                                            <div class="invalid-feedback">Please fill out this field.</div>
                                        </div>
                                    </div>

                                    <div class="col-12 col-md-4">
                                        <div class="form-group">
                                            <label>Single Parent?</label>
                                            <select class="form-control" name="single_parent" id="single_parent" required>
                                                <option value="">...</option>
                                                <option value="Yes">Yes</option>
                                                <option value="No">No</option>
                                            </select>
                                            <div class="valid-feedback">Valid.</div>
                                            <div class="invalid-feedback">Please fill out this field.</div>
                                        </div>
                                    </div>

                                    <div class="col-12 col-md-4">
                                        <div class="form-group">
                                            <label>Pregnant?</label>
                                            <select class="form-control" name="pregnant" id="pregnant" required>
                                                <option value="">...</option>
                                                <option value="Yes">Yes</option>
                                                <option value="No">No</option>
                                            </select>
                                            <div class="valid-feedback">Valid.</div>
                                            <div class="invalid-feedback">Please fill out this field.</div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-12 col-md-4">
                                        <div class="form-group">
                                            <label>Malnourished?</label>
                                            <select class="form-control" name="malnourished" id="malnourished" required>
                                                <option value="">...</option>
                                                <option value="Yes">Yes</option>
                                                <option value="No">No</option>
                                            </select>
                                            <div class="valid-feedback">Valid.</div>
                                            <div class="invalid-feedback">Please fill out this field.</div>
                                        </div>
                                    </div>

                                    <div class="col-12 col-md-4">
                                        <div class="form-group">
                                            <label>Member of 4Ps?</label>
                                            <select class="form-control" name="four_ps" id="four_ps" required>
                                                <option value="">...</option>
                                                <option value="Yes">Yes</option>
                                                <option value="No">No</option>
                                            </select>
                                            <div class="valid-feedback">Valid.</div>
                                            <div class="invalid-feedback">Please fill out this field.</div>
                                        </div>
                                    </div>

                                    <div class="col-12 col-md-4">
                                        <div class="form-group">
                                            <label>Member of Senior Citizen?</label>
                                            <select class="form-control" name="senior_citizen" id="senior_citizen" required>
                                                <option value="">...</option>
                                                <option value="Yes">Yes</option>
                                                <option value="No">No</option>
                                            </select>
                                            <div class="valid-feedback">Valid.</div>
                                            <div class="invalid-feedback">Please fill out this field.</div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-12 col-md-4">
                                        <div class="form-group">
                                            <label>Out of School Youth?</label>
                                            <select class="form-control" name="out_of_school_youth" id="out_of_school_youth" required>
                                                <option value="">...</option>
                                                <option value="Yes">Yes</option>
                                                <option value="No">No</option>
                                            </select>
                                            <div class="valid-feedback">Valid.</div>
                                            <div class="invalid-feedback">Please fill out this field.</div>
                                        </div>
                                    </div>

                                    <div class="col-12 col-md-4">
                                        <div class="form-group">
                                            <label>LGBTQ+?</label>
                                            <select class="form-control" name="lgbtq" id="lgbtq" required>
                                                <option value="">...</option>
                                                <option value="Yes">Yes</option>
                                                <option value="No">No</option>
                                            </select>
                                            <div class="valid-feedback">Valid.</div>
                                            <div class="invalid-feedback">Please fill out this field.</div>
                                        </div>
                                    </div>

                                    <div class="col-12 col-md-4">
                                        <div class="form-group">
                                            <label>IP Community:</label>
                                            <select class="form-control" name="ip_community" id="ip_community" required>
                                                <option value="">Select IP Community</option>
                                                <option value="YOGAD">YOGAD</option>
                                                <option value="ITAWIS">ITAWIS</option>
                                                <option value="IBANAG">IBANAG</option>
                                                <option value="GADDANG">GADDANG</option>
                                                <option value="IFUGAO">IFUGAO</option>
                                                <option value="N/A">N/A</option>
                                            </select>
                                            <div class="valid-feedback">Valid.</div>
                                            <div class="invalid-feedback">Please select an IP Community.</div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <!--<div class="col rb"> 
                                        <div class="form-group">
                                            <label>COVID-19 Vaccinated? </label>
                                            <select class="form-control" name="vaccinated" id="vaccinated" required>
                                                <option value="">...</option>
                                                <option value="Yes">Yes</option>
                                                <option value="No">No</option>
                                            </select>
                                            <div class="valid-feedback">Valid.</div>
                                            <div class="invalid-feedback">Please fill out this field.</div>
                                        </div>
                                    </div>
                                    <div class="col rb"> 
                                        <div class="form-group">
                                            <label>Pregnancy Status: </label>
                                            <select class="form-control" name="pregnancy" id="pregnancy" required>
                                                <option value="">...</option>
                                                <option value="Yes">Yes</option>
                                                <option value="No">No</option>
                                            </select>
                                            <div class="valid-feedback">Valid.</div>
                                            <div class="invalid-feedback">Please fill out this field.</div>
                                        </div>
                                    </div>-->

                            <div class="container-fluid">
                                <input type="hidden" id="tbl_name" name="tbl_name" value="<?= $_SESSION['tmp_add_family']?>">
                                <h5 style="font-weight: lighter;">Family Member</h5>
                                    <!-- <form action="POST"> -->
                                        <div class="row">
                                            <div class="col-12 col-md-6">
                                                <label for="family_lastname">Lastname</label>
                                                <input type="text" class="form-control" id="family_lastname" name="family_lastname" placeholder="">
                                            </div>
                                            <div class="col-12 col-md-6">
                                                <label for="family_firstname">Firstname</label>
                                                <input type="text" class="form-control" id="family_firstname" name="family_firstname" placeholder="">
                                            </div>
    
                                            <div class="col-12 col-md-6">
                                                <label for="family_middleinitial">Middle Initial</label>
                                                <input type="text" class="form-control" id="family_middleinitial" name="family_middleinitial" placeholder="">
                                            </div>
                                            <div class="col-12 col-md-6">
                                                <label for="family_relationship">Relationship</label>
                                                <!-- <input type="text" class="form-control" id="family_relationship" name="family_relationship" placeholder=""> -->
                                                <select name="family_relationship" id="family_relationship" class="form-control">
                                                    <option value="0">- Select -</option>
                                                    <option value="Mother">Mother</option>
                                                    <option value="Father">Father</option>
                                                    <option value="Brother">Brother</option>
                                                    <option value="Sister">Sister</option>
                                                    <option value="Grandfather">Grandfather</option>
                                                    <option value="Grandmother">Grandmother</option>
                                                </select>
                                            </div>
    
                                            <div class="col-12 col-md-6">
                                                <label for="family_age">Age</label>
                                                <input type="number" class="form-control" id="family_age" name="family_age" placeholder="">
                                            </div>
                                            <div class="col-12 col-md-6">
                                                <label for="family_civilstatus">Civil Status</label>
                                                <!--  <input type="text" class="form-control" id="family_civilstatus" name="family_civilstatus" placeholder=""> -->
                                                <select name="family_civilstatus" id="family_civilstatus" class="form-control">
                                                    <option value="0">- Select -</option>
                                                    <option value="Single">Single</option>
                                                    <option value="Married">Married</option>
                                                    <option value="Widowed">Widowed</option>
                                                    <option value="Widower">Widower</option>
                                                </select>
                                            </div>
    
                                            <div class="col-12 col-md-6">
                                                <label for="family_oocupation">Occupation</label>
                                                <input type="text" class="form-control" id="family_occupation" name="family_oocupation" placeholder="" >
                                            </div>
                                            <div class="col-12 col-md-6">
                                                <label for="family_income">Monthly Income</label>
                                                <input type="number" class="form-control" id="family_income" name="family_income" placeholder="">
                                            </div>
                                        </div> <br>
                                        <a href="javascript:void(0);" class="btn btn-primary" onclick="tmp_add_family()">Add + </a>
                                    <!-- </form> -->
                                </div><br><br>
                            
                            <div id="tmp_add" class="table table-responsive">
                                <table id="myTable" class="table table-striped table-bordered" align="center">
                                    <tr>
                                        <thead>
                                            <th>Lastname</th>
                                            <th>Firstname</th>
                                            <th>Middle Initial</th>
                                            <th>Relationship</th>
                                            <th>Age</th>
                                            <th>Civil Status</th>
                                            <th>Occupation</th>
                                            <th>Income</th>
                                            <th>Remove</th>
                                        </thead>
                                    </tr>
                                </table>
                            </div>


                            <br>

                            <input type="hidden" class="form-control" name="role" value="resident">
                            <center><button class="btn btn-primary btn-sm" type="submit" name="add_resident_admin"> Submit </button>
                            <a href="admin_dashboard.php" class="btn btn-info btn-sm">Back</a>
                            </center>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-sm"> </div>
        </div>
    </div>
                
                <br><br><br>
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

        <script>
        document.addEventListener("DOMContentLoaded", function () {
            function toggleInputField(radioYesId, radioNoId, inputFieldId) {
                const yesRadio = document.getElementById(radioYesId);
                const noRadio = document.getElementById(radioNoId);
                const inputField = document.getElementById(inputFieldId);

                function toggleDisplay() {
                    if (yesRadio.checked) {
                        inputField.style.display = "block";
                    } else {
                        inputField.style.display = "none";
                    }
                }

                if (yesRadio && noRadio && inputField) {
                    yesRadio.addEventListener("change", toggleDisplay);
                    noRadio.addEventListener("change", toggleDisplay);
                }
            }

            // Call the function for PSA Correction
            toggleInputField("psa_yes", "psa_no", "psa_c");

            // Call the function for National ID
            toggleInputField("ntnlid", "ntnlid2", "ntlid_input");

            toggleInputField("da_yes", "da_no", "dom_a");
            toggleInputField("trees_yes", "trees_no", "trees_");
            toggleInputField("farmer_yes", "farmer_no", "farmer_");
            toggleInputField("veges_yes", "veges_no", "veges_");
        });
    </script>

        <!-- Bootstrap core JavaScript-->
        <script src="vendor/jquery/jquery.min.js"></script>
        <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

        <!-- Core plugin JavaScript-->
        <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

        <!-- Custom scripts for all pages-->
        <script src="js/sb-admin-2.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-modal/2.2.6/js/bootstrap-modalmanager.min.js" integrity="sha512-/HL24m2nmyI2+ccX+dSHphAHqLw60Oj5sK8jf59VWtFWZi9vx7jzoxbZmcBeeTeCUc7z1mTs3LfyXGuBU32t+w==" crossorigin="anonymous"></script>
        <!-- responsive tags for screen compatibility -->
        <meta name="viewport" content="width=device-width, initial-scale=1 shrink-to-fit=no">
        <!-- bootstrap css --> 
        <link href="bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css"> 
        <!-- fontawesome icons -->
        <script src="https://kit.fontawesome.com/67a9b7069e.js" crossorigin="anonymous"></script>
        <script src="bootstrap/js/bootstrap.bundle.js" type="text/javascript"> </script>

    <?php 
        include('dashboard_sidebar_end.php');
    ?>