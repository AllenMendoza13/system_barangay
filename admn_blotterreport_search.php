<?php
	// require the database connection
	  
	require 'classes/conn.php';
	if(isset($_POST['search_bspermit'])){
		$keyword = $_POST['keyword'];
?>
<div class="container-fluid">


	<table class="table table-hover text-center table-bordered table-responsive" >
		<thead class="alert-info">
            
			<tr>
                <th> Actions</th>
                <th> Resident ID </th>
                <th> Surname </th>
                <th> First Name </th>
                <th> Middle Name </th>
                <th> Address </th>
                <th> Contact # </th>
                <th> Narrative Report </th>
                <th> Date & Time Applied</th> 
			</tr>
		</thead>
		<tbody>
		
                    
			<?php
				
				$stmnt = $conn->prepare("SELECT * FROM `tbl_blotter` WHERE `lname` LIKE '%$keyword%' or  `mi` LIKE '%$keyword%' or  `fname` LIKE '%$keyword%' 
				or `bsname` LIKE '%$keyword%' or  `id_resident` LIKE '%$keyword%' or  `houseno` LIKE '%$keyword%' or  `street` LIKE '%$keyword%'
				or `brgy` LIKE '%$keyword%' or `municipal` LIKE '%$keyword%' or `bsindustry` LIKE '%$keyword%' or `aoe` LIKE '%$keyword%' ");
				//$stmnt = $conn->prepare("SELECT * FROM tbl_blotter");
				$stmnt->execute();
				
				while($view = $stmnt->fetch()){
			?>
			<tr>
            <td>    
                <form action="" method="post">
                    <a class="btn btn-success" style="width: 80px; font-size: 15px; border-radius:5px; margin-bottom: 2px;" href="update_blotter_form.php?id_blotter=<?= $view['id_blotter'];?>">Update</a> 
                    <input type="hidden" name="id_blotter" value="<?= $view['id_blotter'];?>">
                    <button class="btn btn-danger" style="width: 80px; font-size: 15px; border-radius:5px;" type="submit" name="delete_blotter"> Delete </button>
                </form>
                </td>
                <td> <?= $view['case_no'];?> </td> 
                <td> <?= $view['lname'];?> </td>
                <td> <?= $view['fname'];?> </td>
                <td> <?= $view['mi'];?> </td>
                <td> <?= $view['houseno'];?>, <?= $view['street'];?>, <?= $view['brgy'];?>, <?= $view['municipal'];?> </td>
                <td>
				    <?php
				    $narrative = $view['narrative'];
				    $maxLength = 100; // Maximum length of the text to display
				    
				    // Check if the text exceeds the maximum length
				    if (strlen($narrative) > $maxLength) {
				        // Truncate the text and add "..."
				        $truncatedText = substr($narrative, 0, $maxLength) . '...';
				        echo $truncatedText;
				    } else {
				        // Display the full text
				        echo $narrative;
				    }
				    ?>
				</td>

                <td> <?= $view['timeapplied'];?> </td>
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
                <th> Control No. </th>
                <th> Surname </th>
                <th> First Name </th>
                <th> Middle Name </th>
                <th> Address </th>
                <th> Contact # </th>
				<th>Case </th>
				<th>Case Respondent</th>
                <th> Narrative Report </th>
                <th> Date & Time Applied</th> 
				<th> Actions</th>

            </tr>
		</thead>
		<tbody>
		<?php if(is_array($view)) {?>
                    <?php foreach($view as $view) {?>
			<tr>
         
                        <td> <?= $view['case_no'];?> </td> 
                        <td> <?= $view['lname'];?> </td>
                        <td> <?= $view['fname'];?> </td>
                        <td> <?= $view['mi'];?> </td>
                        <td> <?= $view['houseno'];?>, <?= $view['street'];?>, <?= $view['brgy'];?>, <?= $view['municipal'];?> </td>
                        <td> <?= $view['contact'];?> </td>
						<td> <?= $view['case_name'];?> </td>
						<td> <?= $view['case_respondent'];?> </td>
                        <td>
						    <?php
						    $narrative = $view['narrative'];
						    $maxLength = 100; // Maximum length of the text to display
						    
						    // Check if the text exceeds the maximum length
						    if (strlen($narrative) > $maxLength) {
						        // Truncate the text and add "..."
						        $truncatedText = substr($narrative, 0, $maxLength) . '...';
						        echo $truncatedText;
						    } else {
						        // Display the full text
						        echo $narrative;
						    }
						    ?>
						</td>

                        <td> <?= $view['timeapplied'];?> </td>
						<td>    
                        <form action="" method="post">
                        <a class="btn btn-success" style="width: 80px; font-size: 15px; border-radius:5px; margin-bottom: 2px;" href="update_blotter_form.php?id_blotter=<?= $view['id_blotter'];?>">Update</a> 
                            <input type="hidden" name="id_blotter" value="<?= $view['id_blotter'];?>">
                            <button class="btn btn-danger" style="width: 80px; font-size: 15px; border-radius:5px;" type="submit" name="delete_blotter"> Delete </button>
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
</div>
<?php
	}
$con = null;
?>