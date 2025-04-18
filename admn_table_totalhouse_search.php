<?php
  

	// require the database connection
	require 'classes/conn.php';
	if(isset($_POST['search_household'])){
		$keyword = $_POST['keyword'];
?>

<table class="table table-hover table-bordered table-responsive text-center" >
	<thead class="alert-info">
		<tr>
			<th> Family Surname </th>
			<th> Family Middle name </th>
			<th> House no. </th>
			<th> Street </th>
			<th> Barangay</th>
			<th> Municipality </th>
		</tr>
	</thead>

	<tbody>
		<?php
			
			$stmnt = $conn->prepare("SELECT * FROM `tbl_resident` WHERE `lname` LIKE '%$keyword%' or  `mi` LIKE '%$keyword%' or  `fname` LIKE '%$keyword%' 
			or `houseno` LIKE '%$keyword%' or  `street` LIKE '%$keyword%' or  `brgy` LIKE '%$keyword%'");
			$stmnt->execute();
			
			while($view = $stmnt->fetch()){
		?>
			<tr>
				<td> <?= $view['lname'];?> </td>
				<td> <?= $view['mi'];?> </td>
				<td> <?= $view['houseno'];?> </td>
				<td> <?= $view['street'];?> </td>
				<td> <?= $view['brgy'];?> </td>
				<td> <?= $view['municipal'];?> </td>
			</tr>
		<?php
		}
		?>
	</tbody>
</table>

<?php		
	}else{
?>

<table class="table table-hover table-bordered table-responsive text-center">
	<thead class="alert-info">
		<tr>
			<th> Family Surname </th>
			<th> Family Middle name </th>
			<th> House no. </th>
			<th> Street </th>
			<th> Barangay</th>  
			<th> Municipality </th> 
		</tr>
	</thead>

	<tbody>
		<?php if(is_array($view)) {?>
			<?php foreach($view as $view) {?>
				<tr>
					<td> <?= $view['lname'];?> </td>
					<td> <?= $view['mi'];?> </td>
					<td> <?= $view['houseno'];?> </td>
					<td> <?= $view['street'];?> </td>
					<td> <?= $view['brgy'];?> </td>
					<td> <?= $view['municipal'];?> </td>
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