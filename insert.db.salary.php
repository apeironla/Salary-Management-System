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
                    
            
                    <li class = "right"><a href= #>Insert</a></li>
                    <li class = "right"><a href=#>Search</a></li>
                </ul>
            </div>
            
         
         <div class = "table-wrap">
             <?php
             
             $id_no = mysqli_real_escape_string($conn, $_POST['id_no']);
             $salary = mysqli_real_escape_string($conn, $_POST['salary']);
             $salary_type = mysqli_real_escape_string($conn, $_POST['salary_type']);
             $bonus = mysqli_real_escape_string($conn, $_POST['bonus']);
             $bonus_type = mysqli_real_escape_string($conn, $_POST['bonus_type']);
             $overtime = mysqli_real_escape_string($conn, $_POST['overtime']);
             $month = mysqli_real_escape_string($conn, $_POST['month']);
              $user = mysqli_real_escape_string($conn, $_POST['user']);
             
             
             $sql_in_salary = "insert into salary(salary_type,amount,bonus,bonus_type,overtime,empid,month_year,user_salary) values( '$salary_type','$salary','$bonus','$bonus_type','$overtime', '$id_no','$month','$user')";
             
             if(mysqli_query($conn,$sql_in_salary))
             {
                 echo "<h2>Record Inserted Successfully.<br><a href = 'in_incentives.php>Next</a></h2>";
             }else
             {
                 echo "Could not execute sql".mysqli_error($conn);
             }
             
             
             
             ?>
             
         </div>
        </section>
    </body>
</html>