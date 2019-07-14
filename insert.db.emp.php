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
        <li class = "right"><a href= 'in_salary.php'
            '>Insert</a></li>
        <li class = "right"><a href=#>Search</a></li>
        </ul>
         
        </div>
         
         <div class = "table-wrap">
             <?php
              
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
              $user = mysqli_real_escape_string($conn, $_POST['user']);
             
             $sql_in_emp = "insert into employee (fname,lname,gender,date_of_birth,address,city,state,contact_no,designation,department,date_of_joining,remarks,user) values('$first_name','$last_name','$gen','$dob','$address','$city','$state','$contact', '$designation','$department','$joining','$remarks','$user')";
             
             if(mysqli_query($conn,$sql_in_emp))
             {
                 echo "<h2>Record Inserted Successfully"."<\br><a href = 'in_salary.php'>Next</a></h2>";
             }else
             {
                 echo "Could not execute sql".mysqli_error($conn);
             }
             
             
             
             ?>
             
         </div>
        </section>
    </body>
</html>