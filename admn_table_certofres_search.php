<?php
  

	// require the database connection
	require 'classes/conn.php';
    $bmis->delete_certofres();
	if(isset($_POST['search_certofres'])){
		$keyword = $_POST['keyword'];
?>
<table class="table table-hover text-center table-bordered table-responsive" >
    <thead class="alert-info">
        
        <tr>
            <th> Resident ID </th>
            <th> Surname </th>
            <th> First Name </th>
            <th> Middle Name </th>
            <th> Age </th>
            <th> Nationality </th>
            <th> Address </th>
            <th> Date </th>
            <th> Purpose </th>
            <th> Actions</th>

        </tr>
    </thead>

    <tbody>    
        <?php
            $stmnt = $conn->prepare("SELECT * FROM `tbl_rescert` WHERE `lname` LIKE '%$keyword%' or  `mi` LIKE '%$keyword%' or  `fname` LIKE '%$keyword%' 
            or `age` LIKE '%$keyword%' or  `id_resident` LIKE '%$keyword%' or  `nationality` LIKE '%$keyword%' or  `houseno` LIKE '%$keyword%'
            or `street` LIKE '%$keyword%' or `brgy` LIKE '%$keyword%' or `municipal` LIKE '%$keyword%' or `date` LIKE '%$keyword%' or `purpose` LIKE '%$keyword%'");
            $stmnt->execute();
            
            while($view = $stmnt->fetch()){
        ?>
            <tr>
               
                <td> <?= $view['id_resident'];?> </td> 
                <td> <?= $view['lname'];?> </td>
                <td> <?= $view['fname'];?> </td>
                <td> <?= $view['mi'];?> </td>
                <td> <?= $view['age'];?> </td>
                <td> <?= $view['nationality'];?> </td>
                <td> <?= $view['houseno'];?>, <?= $view['street'];?>, <?= $view['brgy'];?>, <?= $view['municipal'];?></td>
                <td> <?= $view['date'];?> </td>
                <td> <?= $view['purpose'];?> </td>
                <td>    
                    <form action="" method="post">
                        
                        <input type="hidden" name="id_rescert" value="<?= $view['id_rescert'];?>">
                        <button class="btn btn-danger" type="submit" style="width: 80px; font-size: 14px; border-radius:5px;" name="delete_certofres"> Delete </button>
                    </form>
                </td>
            </tr>
        <?php
        }
        ?>
    </tbody>

</table>

<?php		
	}else{
?>

<table class="table table-hover text-center table-bordered table-responsive">
		<thead class="alert-info">
			<tr>
                
                <th> Resident ID </th>
                <th> Surname </th>
                <th> First Name </th>
                <th> Middle Name </th>
                <th> Age </th>
                <th> Nationality </th>
                <th> Address </th>
                <th> Date </th>
                <th> Purpose </th>
                <th style="width: 18%;"> Actions</th>
			</tr>
		</thead>

		<tbody>
		    <?php if(is_array($view)) {?>
                <?php foreach($view as $view) {?>
                    <tr>
                      
                        <td> <?= $view['id_resident'];?> </td> 
                        <td> <?= $view['lname'];?> </td>
                        <td> <?= $view['fname'];?> </td>
                        <td> <?= $view['mi'];?> </td>
                        <td> <?= $view['age'];?> </td>
                        <td> <?= $view['nationality'];?> </td>
                        <td> <?= $view['houseno'];?>, <?= $view['street'];?>, <?= $view['brgy'];?>, <?= $view['municipal'];?></td>
                        <td> <?= $view['date'];?> </td>
                        <td> <?= $view['purpose'];?> </td>
                        <td>    
                            <form action="" method="post">
                                <a class="btn btn-success" target="blank" style="width: 80px; font-size: 15px; border-radius:5px; margin-bottom: 2px;" href="rescert_form.php?id_rescert=<?= $view['id_rescert'];?>">Generate</a> 
                                <input type="hidden" name="id_rescert" value="<?= $view['id_rescert'];?>">
                                <button class="btn btn-danger" type="submit" style="width: 80px; font-size: 15px; border-radius:5px;" name="delete_certofres"> Delete </button>
                            </form>
                        </td>
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