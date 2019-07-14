<?php 
include_once "pindex.php";
include_once "pconfig.php";

?>

<!DOCTYPE html>
<html>
    
<head>
    <link rel = "stylesheet" type="text/css" href="style.css">
 </head>
    <body>
    
     <section class = "body">
        
    <div class="heading"><h2>Employee Manager</h2></div>
         
     <div class = "second">

         <ul>
        <li><a href ="employee.php" >Employee</a></li>
        <li class = "right"><a href= #>Insert</a></li>
        <li class = "right"><a href=#>Search</a></li>
        </ul>
         
        </div>
         
         <div class = "table-wrap">
             
             <?php 
             $id_no = mysqli_real_escape_string($conn, $_POST['id']);
             $first_name = mysqli_real_escape_string($conn, $_POST['first_name']);
             $last_name = mysqli_real_escape_string($conn, $_POST['last_name']);
             $gen = mysqli_real_escape_string($conn, $_POST['gen']);
             $dob = mysqli_real_escape_string($conn, $_POST['dob']);
             $address = mysqli_real_escape_string($conn, $_POST['address']);
             $city = mysqli_real_escape_string($conn, $_POST['city']);
             $state = mysqli_real_escape_string($conn, $_POST['state']);
             $contact = mysqli_real_escape_string($conn, $_POST['contact']);
             $designation =mysqli_real_escape_string($conn, $_POST['designation']);
             $department = mysqli_real_escape_string($conn, $_POST['department']);
             $joining =mysqli_real_escape_string($conn, $_POST['dateofjoining']);
             $remarks = mysqli_real_escape_string($conn, $_POST['remarks']);
             
        $up_emp = "update employee set id = '$id_no', fname = '$first_name',lname = '$last_name',gender = '$gen',date_of_birth = '$dob', address='$address', city='$city', state = '$state', contact_no= '$contact', designation = '$designation', department= '$department',date_of_joining = '$joining', remarks = '$remarks' where id = '$id_no' ";
        
        if(mysqli_query($conn,$up_emp))
        {
            echo "Updated Successfully";
        }
             else {
    echo "Error updating record: " . mysqli_error($conn);
        
       
             }
             
             mysqli_close($conn);
             
             ?>
             
         </div>
        </section>
    </body>
</html>
