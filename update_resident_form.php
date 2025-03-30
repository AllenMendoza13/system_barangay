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

        $resident_id = $_GET['id_resident'];

        $q = $conn->prepare("SELECT * FROM tbl_resident WHERE id_resident = $resident_id");
        $q->execute();
        $rs = $q->fetch();

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
                                    <div class="col-12 col-md-2">
                                        <div class="form-group">
                                            <label>Last Name:</label>
                                            <input type="hidden" name="admin_id" value="<?=$_SESSION['id_admin']?>">
                                            <input type="hidden" name="resident_id" value="<?=$_GET['id_resident']?>">
                                            <input type="text" class="form-control" name="lname" placeholder="Enter Last Name" pattern="[A-Za-z]{2,}" value="<?=$rs['lname']?>" title="Please enter at least 2 letters, and only use letters." required>
                                            <div class="valid-feedback">Valid.</div>
                                            <div class="invalid-feedback">Please fill out this field.</div>
                                        </div>
                                    </div>

                                    <div class="col-12 col-md-2">
                                        <div class="form-group">
                                            <label>First Name:</label>
                                            <input type="text" class="form-control" name="fname" placeholder="Enter First Name" pattern="[A-Za-z ]{2,}" value="<?=$rs['fname']?>" title="Please enter at least 2 letters, and only use letters." required>
                                            <div class="valid-feedback">Valid.</div>
                                            <div class="invalid-feedback">Please fill out this field.</div>
                                        </div>
                                    </div>

                                    <div class="col-12 col-md-2">
                                        <div class="form-group">
                                            <label>Middle Name:</label>
                                            <input type="text" class="form-control" name="mi" placeholder="Enter Middle Name" pattern="[A-Za-z]{2,}" value="<?=$rs['mi']?>" title="Please enter at least 2 letters, and only use letters.">
                                            <div class="valid-feedback">Valid.</div>
                                            <div class="invalid-feedback">Please fill out this field.</div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-2">
                                        <div class="form-group">
                                            <label>Contact Number:</label>
                                            <input type="tel" class="form-control" name="contact" maxlength="11" pattern="[0-9]{11}" value="<?=$rs['contact']?>" placeholder="Enter Contact Number" required>
                                            <div class="valid-feedback">Valid.</div>
                                            <div class="invalid-feedback">Please fill out this field.</div>
                                        </div>
                                    </div>
    
                                    <div class="col-12 col-md-2">
                                        <div class="form-group">
                                            <label>Email:</label>
                                            <input type="email" class="form-control" name="email" placeholder="Enter Email" value="<?=$rs['email']?>" readonly required>
                                            <div class="valid-feedback">Valid.</div>
                                            <div class="invalid-feedback">Please fill out this field.</div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">

                                    <!-- <div class="col-12 col-md-4">
                                        <div class="form-group">
                                            <label>Password:</label>
                                            <div class="password-input position-relative">
                                                <input type="password" class="form-control" id="password-field" name="password" placeholder="Enter Password" minlength="8" maxlength="16"  title="Password must be 8-16 characters long and contain at least one uppercase letter, one lowercase letter, one digit, and one special character (@, _, #, or *)." required>
                                                <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password position-absolute end-0 top-50 translate-middle-y me-3" style="cursor:pointer;"></span>
                                            </div>
                                            <div class="valid-feedback">Valid.</div>
                                            <div class="invalid-feedback">Password must be 8-16 characters long and contain at least one uppercase letter, one lowercase letter, one digit, and one special character (@, _, #, or *).</div>
                                        </div>
                                    </div> -->
                                </div>
                            </div>

                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-12 col-md-3">
                                        <div class="form-group">
                                            <label>House Number:</label>
                                            <input type="text" class="form-control" name="houseno" placeholder="Enter House Number" pattern="[A-Za-z0-9\s]{2}" value="<?=$rs['houseno']?>" title="Please enter at least 2 letters." required>
                                            <div class="invalid-feedback">Please fill out this field.</div>
                                        </div>
                                    </div>

                                    <div class="col-12 col-md-3">
                                        <div class="form-group">
                                            <label>Purok & Street:</label>
                                            <input type="text" class="form-control" name="street" placeholder="Enter Purok & Street Name" pattern="[A-Za-z0-9\s]{2,}" value="<?=$rs['street']?>" title="Please enter at least 10 letters." required>
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
                                    <div class="row d-flex mb-4">
                                        <div class="col-12 col-md-2" style="display: flex; flex-direction:column;">
                                            <h6>PSA holder</h6>
                                            <input type="text" class="form-control" id="psa_holder" name="psa_holder" value="<?=$rs['psa_holder']?>" readonly placeholder="" required>
                                            <!-- <div style="display: flex; gap: 10px;">
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
                                            </div> -->
                                        </div>
    
                                        <div class="col-12 col-md-2" style="display: flex; flex-direction:column;">
                                            <h6>PSA correction?</h6>
                                            <input type="text" class="form-control" id="psa_correction" name="psa_correction" value="<?=$rs['psa_correction']?>" placeholder="" required>
                                            <!-- <div style="display: flex; gap: 10px;">
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
    
                                            </div> -->
                                        </div>
    
                                        <div class="col-12 col-md-2" style="display: flex; flex-direction: column;">
                                            <h6>National ID holder</h6>
                                            <input type="text" class="form-control" id="ntnlId" name="ntnlId" value="<?=$rs['ntnlId']?>" placeholder="" required>
                                            <!-- <div style="display: flex; gap: 10px;">
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
                                            </div> -->
                                        </div>
                                        <div class="col-12 col-md-2" style="display: flex; flex-direction:column;">
                                            <h6>Domesticated animals?</h6>
                                            <input type="text" class="form-control" id="domesticated_animals" name="domesticated_animals" value="<?=$rs['domesticated_animals']?>" placeholder="" required>
                                            <!-- <div style="display: flex; gap: 10px;">
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
        
                                            </div> -->
                                        </div>
        
                                        <div class="col-12 col-md-2" style="display: flex; flex-direction:column;">
                                            <h6>Planted trees</h6>
                                            <input type="text" class="form-control" id="trees" name="trees" value="<?=$rs['trees']?>" placeholder="" required>
                                            <!-- <div style="display: flex; gap: 10px;">
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
        
                                            </div> -->
                                        </div>
        
                                        <div class="col-12 col-md-2" style="display: flex; flex-direction:column;">
                                            <h6>Farmer</h6>
                                            <input type="text" class="form-control" id="farmer" name="farmer" value="<?=$rs['farmer']?>" placeholder="" required>
                                            <!-- <div style="display: flex; gap: 10px;">
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
        
                                            </div> -->
                                        </div>
                                
                                </div>
                                <!-- end -->

                                <div class="row">
                                    <div class="col-12 col-md-2">
                                        <div class="form-group">
                                            <label>Birth Date:</label>
                                            <input type="date" class="form-control" name="bdate" id="birthdate" oninput="calculateAge()" readonly value="<?=$rs['bdate']?>" required max="<?php echo date('Y-m-d'); ?>">
                                            <div class="valid-feedback">Valid.</div>
                                            <div class="invalid-feedback">Please fill out this field.</div>
                                        </div>
                                    </div>

                                    <div class="col-12 col-md-2">
                                        <div class="form-group">
                                            <label>Birth Place:</label>
                                            <input type="text" class="form-control" name="bplace" value="<?=$rs['bplace']?>" placeholder="Enter Birth Place" required>
                                            <div class="valid-feedback">Valid.</div>
                                            <div class="invalid-feedback">Please fill out this field.</div>
                                        </div>
                                    </div>

                                    <div class="col-12 col-md-2">
                                        <div class="form-group">
                                            <label>Nationality:</label>
                                            <select class="form-control" name="nationality" onchange="updateNationality(this.value)" required>
                                                <option value="Filipino" selected>Filipino</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-2">
                                        <div class="form-group">
                                            <label>Civil Status:</label>
                                            <input type="text" class="form-control" id="status" name="status" value="<?=$rs['status']?>" placeholder="" required>
                                            <div class="valid-feedback">Valid.</div>
                                            <div class="invalid-feedback">Please fill out this field.</div>
                                        </div>
                                    </div>
        
                                    <div class="col-12 col-md-2">
                                        <div class="form-group">
                                            <label>Age:</label>
                                            <input class="form-control" name="age" id="age" value="<?=$rs['age']?>" required readonly>
                                        </div>
                                    </div>
        
                                    <div class="col-12 col-md-2">
                                        <div class="form-group">
                                            <label>Sex:</label>
                                            <input type="text" class="form-control" id="sex" name="sex" value="<?=$rs['sex']?>" placeholder="" required>
                                            <div class="valid-feedback">Valid.</div>
                                            <div class="invalid-feedback">Please fill out this field.</div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="container-fluid m-1">
                                <div class="row">
                                    <div class="col-12 col-md-2">
                                        <label for="soi">Source of income</label>
                                        <input type="text" class="form-control" id="soi" name="soi" value="<?=$rs['s_of_income']?>" placeholder="">
                                    </div>
                                    <div class="col-12 col-md-2">
                                        <label for="occupation">Occupation</label>
                                        <input type="text" class="form-control" id="occupation" name="occupation" value="<?=$rs['occupation']?>" placeholder="">
                                    </div>
                                    <div class="col-12 col-md-2">
                                        <div class="form-group">
                                            <label>Are you a registered voter?</label>
                                            <input type="text" class="form-control" id="voter" name="voter" value="<?=$rs['voter']?>" placeholder="" required>
                                            <div class="valid-feedback">Valid.</div>
                                            <div class="invalid-feedback">Please fill out this field.</div>
                                        </div>
                                    </div>
        
                                    <div class="col-12 col-md-2">
                                        <div class="form-group">
                                            <label>PWD?</label>
                                            <input type="text" class="form-control" id="pwd" name="pwd" value="<?=$rs['pwd']?>" placeholder="" required>
                                            <div class="valid-feedback">Valid.</div>
                                            <div class="invalid-feedback">Please fill out this field.</div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-2">
                                        <div class="form-group">
                                            <label>Indigent?</label>
                                            <input type="text" class="form-control" id="indigent" name="indigent" value="<?=$rs['indigent']?>" placeholder="" required>
                                            <div class="valid-feedback">Valid.</div>
                                            <div class="invalid-feedback">Please fill out this field.</div>
                                        </div>
                                    </div>
        
                                    <div class="col-12 col-md-2">
                                        <div class="form-group">
                                            <label>Single Parent?</label>
                                            <input type="text" class="form-control" id="single_parent" name="single_parent" value="<?=$rs['single_parent']?>" placeholder="" required>
                                            <div class="valid-feedback">Valid.</div>
                                            <div class="invalid-feedback">Please fill out this field.</div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="container-fluid">
                                <div class="row">
                                </div>
                            </div>

                            <div class="container-fluid">
                                <div class="row">

                                    <div class="col-12 col-md-1">
                                        <div class="form-group">
                                            <label>Pregnant?</label>
                                            <input type="text" class="form-control" id="pregnancy" name="pregnancy" value="<?=$rs['pregnancy']?>" placeholder="" required>
                                            <div class="valid-feedback">Valid.</div>
                                            <div class="invalid-feedback">Please fill out this field.</div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-1">
                                        <div class="form-group">
                                            <label>Malnourished?</label>
                                            <input type="text" class="form-control" id="malnourished" name="malnourished" value="<?=$rs['malnourished']?>" placeholder="" required>
                                            <div class="valid-feedback">Valid.</div>
                                            <div class="invalid-feedback">Please fill out this field.</div>
                                        </div>
                                    </div>
    
                                    <div class="col-12 col-md-2">
                                        <div class="form-group">
                                            <label>Member of 4Ps?</label>
                                            <input type="text" class="form-control" id="four_ps" name="four_ps" value="<?=$rs['four_ps']?>" placeholder="" required>
    
                                            <div class="valid-feedback">Valid.</div>
                                            <div class="invalid-feedback">Please fill out this field.</div>
                                        </div>
                                    </div>
    
                                    <div class="col-12 col-md-2">
                                        <div class="form-group">
                                            <label>Member of Senior Citizen?</label>
                                            <input type="text" class="form-control" id="senior" name="senior" value="<?=$rs['senior_citizen']?>" placeholder="" required>
                                            <div class="valid-feedback">Valid.</div>
                                            <div class="invalid-feedback">Please fill out this field.</div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-2">
                                        <div class="form-group">
                                            <label>Out of School Youth?</label>
                                            <input type="text" class="form-control" id="out_of_school_youth" name="out_of_school_youth" value="<?=$rs['out_of_school_youth']?>" placeholder="" required>
                                            </select>
                                            <div class="valid-feedback">Valid.</div>
                                            <div class="invalid-feedback">Please fill out this field.</div>
                                        </div>
                                    </div>
    
                                    <div class="col-12 col-md-1">
                                        <div class="form-group">
                                            <label>LGBTQ+?</label>
                                            <input type="text" class="form-control" id="lgbtq" name="lgbtq" value="<?=$rs['lgbtq']?>" placeholder="" required>
                                            <div class="valid-feedback">Valid.</div>
                                            <div class="invalid-feedback">Please fill out this field.</div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-2">
                                        <div class="form-group">
                                            <label>IP Community:</label>
                                            <input type="text" class="form-control" id="ip_community" name="ip_community" value="<?=$rs['ip_community']?>" placeholder="" required>
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
                                    <h5>Family Members</h5>
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
                                            </thead>
                                        </tr>

                                        <?php
                                        
                                        $q = "SELECT * FROM tbl_family_member WHERE resident_id = $resident_id";
                                        $rs = $conn->prepare($q);
                                        $rs->execute();
                                        
                                        if ($rs->rowCount() > 0) {
                                            while ($row = $rs->fetch(PDO::FETCH_ASSOC)) { 
                                                echo '<tr>';
                                                echo '<td>' . htmlspecialchars($row['family_lastname']) . '</td>';
                                                echo '<td>' . htmlspecialchars($row['family_firstname']) . '</td>';
                                                echo '<td>' . htmlspecialchars($row['family_middleinitial']) . '</td>';
                                                echo '<td>' . htmlspecialchars($row['relationshipid']) . '</td>';
                                                echo '<td>' . htmlspecialchars($row['family_age']) . '</td>';
                                                echo '<td>' . htmlspecialchars($row['familycivilid']) . '</td>';
                                                echo '<td>' . htmlspecialchars($row['occupation']) . '</td>';
                                                echo '<td>' . htmlspecialchars($row['income']) . '</td>';
                                                echo '</tr>';
                                            }
                                        } else {
                                            echo '<tr><td colspan="8" style="text-align: center;">No family member found</td></tr>';
                                        }
                                        
                                        
                                        ?>
                                    </table>
                                </div>

                            <input type="hidden" class="form-control" name="role" value="resident">
                            <center><button  class="btn btn-primary btn-sm" type="submit" name="update_resident"> Submit </button>
                            <a   href="admin_dashboard.php" class="btn btn-info btn-sm">Cancel</a>
                            </center>
                        </form>
                    </div>
                </div>
            <div class="col-sm"> </div>
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