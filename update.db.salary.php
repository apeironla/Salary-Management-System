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
              <?php   
                    if(isset($_SESSION['nameid']) && $_SESSION['nameid'] == 'admin')
                    {    
            
                       echo "<li class = 'right'><a href= 'in_salary.php'>Insert</a></li>";
                        
                    }
                ?>
                    <li class = "right"><a href=#>Search</a></li>
                </ul>
            </div>
         
         <div class = "table-wrap">
             
             <?php 
             $id_no = mysqli_real_escape_string($conn, $_POST['id']);
             
             $amount = mysqli_real_escape_string($conn, $_POST['amount']);
             $type = mysqli_real_escape_string($conn, $_POST['type']);
             $bonus = mysqli_real_escape_string($conn, $_POST['bonus']);
             $btype = mysqli_real_escape_string($conn, $_POST['btype']);
             $overtime = mysqli_real_escape_string($conn, $_POST['overtime']);
             $date =mysqli_real_escape_string($conn, $_POST['date']);
           
        $up_emp = "update salary set  amount='$amount', salary_type='$type', bonus = '$bonus', bonus_type= '$btype', overtime = '$overtime', month_year= '$date' where empid = '$id_no' ";
        
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
