

<!DOCTYPE html>
<html>
    
<head>
    <link rel = "stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    </head>
    <body>
        
        <div class="header">
        <h1 class="salary">Salary Management System</h1>
        </div>
        
        
        <?php


            include_once 'plogout.php';
                if(!isset($_SESSION['nameid'])){
                header("location:plogin.php");
                }
            //include_once 'new.php';

        ?>
      
    <section class="mainheader">
        <ul>
        <li  class="image"><img src = "cropped.gif"></li>
        <li><a href = "employee.php" class= "active_employee">Employee details</a></li>
        <li><a href = "salary.php" class= "active_salary">Salary</a></li>
        <li><a href = "decrement.php" class= "active_decrement">Decrement</a></li>
        <li><a href = "leave.php" class= "active_leave">Leave</a></li>
        <li><a href = "salary_hand.php" class= "active_salaryh">Salary In HAND</a></li>

      </ul>
    </section>
        
 
    
   
      
    </body>
</html>

