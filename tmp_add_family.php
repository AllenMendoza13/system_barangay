<?php
require('classes/conn.php');
//$table = $_SESSION['tmp_add_family'];
$table = $_POST['table_name'];

if(isset($_POST['delete'])){
    $table = $_POST['table_name'];
    $id = $_POST['delete'];
    $q = $conn->prepare('DELETE FROM '.$table.' WHERE id ='.$id);
    $q->execute();
}

if (isset($_POST['add'])) {
    $q = "INSERT INTO $table
            (family_lastname, family_firstname, family_middleinitial, relationshipid, 
            family_age, familycivilid, occupation, income) 
          VALUES 
            (:lastname, :firstname, :middleinitial, :relationship, 
            :age, :civilstatus, :occupation, :income)";

    $qq = $conn->prepare($q);
    $qq->bindParam(':lastname', $_POST['family_lastname'], PDO::PARAM_STR);
    $qq->bindParam(':firstname', $_POST['family_firstname'], PDO::PARAM_STR);
    $qq->bindParam(':middleinitial', $_POST['family_middleinitial'], PDO::PARAM_STR);
    $qq->bindParam(':relationship', $_POST['family_relationship'], PDO::PARAM_STR);
    $qq->bindParam(':age', $_POST['family_age'], PDO::PARAM_INT);
    $qq->bindParam(':civilstatus', $_POST['family_civilstatus'], PDO::PARAM_STR);
    $qq->bindParam(':occupation', $_POST['family_occupation'], PDO::PARAM_STR);
    $qq->bindParam(':income', $_POST['family_income'], PDO::PARAM_STR);
    $qq->execute();
}


?>

<div class="container-fluid">
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

        <?php
        
        $q = "SELECT * FROM $table";
        $rs = $conn->prepare($q);
        $rs->execute();
        
        while ($row = $rs->fetch(PDO::FETCH_ASSOC)) { 
            echo '<tr>';
            echo '<input type="hidden" id="table_name" value="'.$table.'"/>';
            echo '<td>' . htmlspecialchars($row['family_lastname']) . '</td>';
            echo '<td>' . htmlspecialchars($row['family_firstname']) . '</td>';
            echo '<td>' . htmlspecialchars($row['family_middleinitial']) . '</td>';
            echo '<td>' . htmlspecialchars($row['relationshipid']) . '</td>';
            echo '<td>' . htmlspecialchars($row['family_age']) . '</td>';
            echo '<td>' . htmlspecialchars($row['familycivilid']) . '</td>';
            echo '<td>' . htmlspecialchars($row['occupation']) . '</td>';
            echo '<td>' . htmlspecialchars($row['income']) . '</td>';
            echo '<td><a href="javascript:void(0);" onclick="delete_('.$row['id'].')">Remove</a></td>';
            echo '</tr>';
        }
        
        
        ?>
    </table>
</div>
