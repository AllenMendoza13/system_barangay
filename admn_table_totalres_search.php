<?php
  

	// require the database connection
	require 'classes/conn.php';
	if(isset($_POST['search_totalres'])){
		$keyword = $_POST['keyword'];
?>
<table class="table table-hover table-bordered text-center table-responsive" >
        <thead class="alert-info">
                <tr>    
                        <th> Actions </th>
                        <th> Email </th>
                        <th> Surname </th>
                        <th> First name </th>
                        <th> Middle name </th>
                        <th> Age </th>
                        <th> Sex </th>
                        <th> Status </th>
                        <th> Address </th>
                        <th> Contact # </th>
                        <th> Birth date </th>
                        <th> Birth place </th>
                        <th> Nationality </th>
                        <th> Family Head </th>
                </tr>
        </thead>

        <tbody>
                <?php
                        
                $stmnt = $conn->prepare("SELECT * FROM `tbl_resident` WHERE `lname` LIKE '%$keyword%' or  `mi` LIKE '%$keyword%' or  `fname` LIKE '%$keyword%' 
                or  `age` LIKE '%$keyword%' or  `sex` LIKE '%$keyword%' or  `status` LIKE '%$keyword%' or  `houseno` LIKE '%$keyword%' or  `contact` LIKE '%$keyword%'
                or  `bdate` LIKE '%$keyword%' or  `bplace` LIKE '%$keyword%' or  `nationality` LIKE '%$keyword%' or  `family_role` LIKE '%$keyword%' or  `role` LIKE '%$keyword%' or  `email` LIKE '%$keyword%'
                or  `brgy` LIKE '%$keyword%' or  `street` LIKE '%$keyword%' or  `municipal` LIKE '%$keyword%'");
                $stmnt->execute();
                        
                while($view = $stmnt->fetch()){
                ?>
                        <tr>
                                <td>    
                                        <form action="" method="post">
                                            <a class="btn btn-success" style="width: 80px; font-size: 15px; border-radius:5px; margin-bottom: 2px;" href="update_resident_form.php?id_resident=<?= $view['id_resident'];?>">Update</a> 
                                            <input type="hidden" name="id_blotter" value="<?= $view['id_resident'];?>">
                                            <button class="btn btn-danger" style="width: 80px; font-size: 15px; border-radius:5px;" type="submit" name="delete_resident"> Archive </button>
                                        </form>
                                </td>
                                <td> <?= $view['email'];?> </td>
                                <td> <?= $view['lname'];?> </td>
                                <td> <?= $view['fname'];?> </td>
                                <td> <?= $view['mi'];?> </td>
                                <td> <?= $view['age'];?> </td>
                                <td> <?= $view['sex'];?> </td>
                                <td> <?= $view['status'];?> </td>
                                <td> <?= $view['houseno'];?>, <?= $view['street'];?>, <?= $view['brgy'];?>, <?= $view['municipal'];?></td>
                                <td> <?= $view['contact'];?> </td>
                                <td> <?= $view['bdate'];?> </td>
                                <td> <?= $view['bplace'];?> </td>
                                <td> <?= $view['nationality'];?> </td>
                                <td> <?= $view['family_role'];?> </td>
                        </tr>
                <?php
                }
                ?>
        </tbody>
</table>

<?php		
        }else{
?>

<table class="table table-hover table-bordered text-center table-responsive">
        <thead class="alert-info">
                <tr>    
                        <th> Actions </th>
                        <th> Email </th>
                        <th> Surname </th>
                        <th> First name </th>
                        <th> Middle name </th>
                        <th> Age </th>
                        <th> Sex </th>
                        <th> Status </th>
                        <th> Address </th>
                        <th> Contact # </th>
                        <th> Birth date </th>
                        <th> Birth place </th>
                        <th> Nationality </th>
                        <th> Family Head </th>
                </tr>
	</thead>
        <tbody>
                <?php if(is_array($view)) {?>
                        <?php foreach($view as $view) {?>
                                <tr>
                                        <td>    
                                        <form action="" method="post">
                                            <a class="btn btn-success" style="width: 80px; font-size: 15px; border-radius:5px; margin-bottom: 2px;" href="update_resident_form.php?id_resident=<?= $view['id_resident'];?>">Update</a> 
                                            <input type="hidden" name="id_blotter" value="<?= $view['id_resident'];?>">
                                            <button class="btn btn-danger" style="width: 80px; font-size: 15px; border-radius:5px;" type="submit" name="delete_resident"> Archive </button>
                                        </form>
                                </td>
                                        <td> <?= $view['email'];?> </td>
                                <td> <?= $view['lname'];?> </td>
                                <td> <?= $view['fname'];?> </td>
                                <td> <?= $view['mi'];?> </td>
                                <td> <?= $view['age'];?> </td>
                                <td> <?= $view['sex'];?> </td>
                                <td> <?= $view['status'];?> </td>
                                <td> <?= $view['houseno'];?>, <?= $view['street'];?>, <?= $view['brgy'];?>, <?= $view['municipal'];?></td>
                                <td> <?= $view['contact'];?> </td>
                                <td> <?= $view['bdate'];?> </td>
                                <td> <?= $view['bplace'];?> </td>
                                <td> <?= $view['nationality'];?> </td>
                                <td> <?= $view['family_role'];?> </td>
                                </tr>
                        
                        <?php
                                }
                        ?>
                <?php
                        }
                ?>
        </tbody>
</table>

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
	}
$con = null;
?>