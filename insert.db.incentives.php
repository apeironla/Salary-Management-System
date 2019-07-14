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
        
      <div class ="heading"><h2>Salary Manager</h2></div>
            <div class = "second">
                <ul>
                    <li><a href ="salary.php" >Salary</a></li>
                    <li><a href ="incentives.php">Incentives</a></li>
                    
            
                    <li class = "right"><a href= "in_incentives.php">Insert</a></li>
                    <li class = "right"><a href=#>Search</a></li>
                </ul>
            </div>
            
         
         <div class = "table-wrap">
             <?php
             
             $id_no = mysqli_real_escape_string($conn, $_POST['id_no']);
             $hra = mysqli_real_escape_string($conn, $_POST['hra']);
             $ta = mysqli_real_escape_string($conn, $_POST['ta']);
             $da = mysqli_real_escape_string($conn, $_POST['da']);
             $med = mysqli_real_escape_string($conn, $_POST['medical']);
             $date = mysqli_real_escape_string($conn, $_POST['date']);
             $user = mysqli_real_escape_string($conn, $_POST['user']);
             
             
             $sql_in_in = "insert into incentives(HRA,TA,DA,medical,empid,date,user_incentives) values( '$hra','$ta','$da','$med','$id_no', '$date','$user')";
             
             if(mysqli_query($conn,$sql_in_in))
             {
                 echo "<h2>Record Inserted Successfully.</h2>";
             }else
             {
                 echo "Could not execute sql".mysqli_error($conn);
             }
             
             
             
             ?>
             
         </div>
        </section>
    </body>
</html>