<?php
  

error_reporting(E_ALL ^ E_WARNING);
ini_set('display_errors', 1);
require('classes/resident.class.php');
$userdetails = $bmis->get_userdata();
$bmis->validate_admin();
$create = $bmis->create_certofres_walkin();
$bmis->delete_certofres();
$view = $bmis->view_certofres();
$id_resident = $_GET['id_resident'];
$resident = $residentbmis->get_single_certofres($id_resident);

?>

<?php
include('dashboard_sidebar_start.php');
?>

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
</style>

<!-- Begin Page Content -->

<div class="container-fluid">

    <!-- Page Heading -->

    <div class="row">
        <div class="col text-center">
            <h1> Certificate of Residency Requests</h1>
        </div>
    </div>

    <hr>
    <br><br>

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
                <a href="admn_certofres.php" class="btn btn-info" style="width: 70px; font-size: 15px; border-radius:5px;">Reload</a>
            </form>
        </div>
    </div>

    <br>
    <button class="btn btn-success" style="width: 95px; height: 40px; font-size: 14px; border-radius:5px; margin-bottom: 5px; margin-left: auto; margin-right: auto;" data-toggle="modal" data-target="#modalResidency"><i class="fas fa-plus icon" style="padding-left: 0; padding-top: 0; padding-bottom: 0;"></i>Add</button>
    <div class="modal fade" id="modalResidency" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Certificate of Residency Form</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <!-- Modal Body -->

                <div class="modal-body">
                    <form method="post">

                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="lname">Last Name:</label>
                                    <input name="lname" type="text" style="text-align:left;" class="form-control"
                                        placeholder="Enter Last Name" required>
                                    <div class="valid-feedback">Valid.</div>
                                    <div class="invalid-feedback">Please fill out this field.</div>
                                </div>
                            </div>

                            <div class="col">
                                <div class="form-group">
                                    <label for="fname">First Name:</label>
                                    <input name="fname" type="text" style="text-align:left;" class="form-control"
                                        placeholder="Enter First Name" required>
                                    <div class="valid-feedback">Valid.</div>
                                    <div class="invalid-feedback">Please fill out this field.</div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="mi" class="mtop">Middle Name: </label>
                                    <input name="mi" type="text" style="text-align:left;" class="form-control"
                                        placeholder="Enter Middle Name">
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="age" class="mtop">Age: </label>
                                    <input type="number" name="age" id="age" style="text-align:left;" class="form-control" placeholder="Enter your Age" required>
                                    <div class="valid-feedback">Valid.</div>
                                    <div class="invalid-feedback">Please fill out this field with a valid age.</div>

                                    <script>
                                        // Get the input element
                                        var ageInput = document.getElementById("age");

                                        // Add an event listener for input changes
                                        ageInput.addEventListener("input", function() {
                                            // Get the entered value
                                            var age = parseInt(ageInput.value);

                                            // Check if the value is a number and within the valid range
                                            if (isNaN(age) || age < 0 || age > 100) {
                                                // If not valid, set the input as invalid
                                                ageInput.setCustomValidity("Please enter a valid age between 0 and 150 years.");
                                            } else {
                                                // If valid, clear any previous validation message
                                                ageInput.setCustomValidity("");
                                            }
                                        });
                                    </script>
                                </div>
                            </div>

                            <!--<label for="Age" class="mtop">Nationality: </label>-->
                            <input type="hidden" name="nationality" class="form-control"
                                placeholder="Enter your Nationality" value="Filipino" required>

                        </div>

                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label> House No: </label>
                                    <input type="text" class="form-control" name="houseno"
                                        placeholder="Enter House No." style="text-align:left;" required>
                                    <div class="valid-feedback">Valid.</div>
                                    <div class="invalid-feedback">Please fill out this field.</div>
                                </div>
                            </div>

                            <div class="col">
                                <div class="form-group">
                                    <label> Street: </label>
                                    <input type="text" class="form-control" name="street"
                                        placeholder="Enter Street" style="text-align:left;" required>
                                    <div class="valid-feedback">Valid.</div>
                                    <div class="invalid-feedback">Please fill out this field.</div>
                                </div>
                            </div>
                            <!--<label> Barangay: </label>-->
                            <input type="hidden" class="form-control" name="brgy" value="Calaocan" required readonly>

                            <!--<label> Municipality: </label>-->
                            <input type="hidden" class="form-control" name="municipal"
                                placeholder="Enter Municipality" value="Santiago City" required readonly>
                        </div>

                        <div class="row">

                            <div class="col">
                                <div class="form-group">
                                    <label class="mtop">Date Needed: </label>
                                    <input type="date" class="form-control" name="date" style="text-align:left;" required min="<?php echo date('Y-m-d'); ?>" required>
                                    <div class="valid-feedback">Valid.</div>
                                    <div class="invalid-feedback">Please fill out this field.</div>
                                </div>
                            </div>

                            <div class="col">
                                <div class="form-group">
                                    <label for="purposes">Purpose:</label>
                                    <select class="form-control" name="purpose" style="text-align:left;" id="purpose" required>
                                        <option value="">Choose Purpose</option>
                                        <option value="Job/Employment">Job/Employment</option>
                                        <option value="Business Establishment">Business Establishment</option>
                                        <option value="Financial Transaction">Financial Transaction</option>
                                        <option value="Certify that you are living in a certain barangay">Certify that you are living in a certain barangay</option>
                                        <option value="Other important transactions.">Other important transactions.</option>
                                    </select>
                                    <div class="valid-feedback">Valid.</div>
                                    <div class="invalid-feedback">Please fill out this field.</div>
                                </div>
                            </div>
                        </div>

                </div>
                <!-- Modal Footer -->

                <div class="modal-footer" style="justify-content: flex-start;">
                    <div class="paa">
                        <input name="id_resident" type="hidden" class="form-control" value="<?= $userdetails['id_resident'] ?>">
                        <button name="create_certofres_walkin" type="submit" class="btn btn-primary">Submit Request</button>
                        <button type="button" class="btn btn-dark" data-dismiss="modal">Close</button>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <?php
        include('admn_table_certofres_search.php');
        ?>
    </div>
</div>

<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
<br>
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