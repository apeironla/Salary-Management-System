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
         
            <div class ="heading"><h2>Decrement Manager</h2></div>
            <div class = "second">
                <ul>
                    <li><a href ="decrement.php" >Loan</a></li>
                    <li><a href = "fund.php">Fund</a></li>
                    <li><a href ="advance.php">Advance Pay</a></li>
                    
             <?php    
        if(isset($_SESSION['nameid']) && $_SESSION['nameid'] == 'admin')
        {
                   echo  "<li class = 'right'><a href= 'in_loan.php'>Insert</a></li>";
        }
?>
                    <li class = "right"><a href=#>Search</a></li>
                </ul>
            </div>
            
            
         
         <div class = "table-wrap">
             <?php
             
             $id_no = mysqli_real_escape_string($conn, $_POST['id_no']);
             $amount = mysqli_real_escape_string($conn, $_POST['loan_amount']);
             $ins = mysqli_real_escape_string($conn, $_POST['installment']);
             $date = mysqli_real_escape_string($conn, $_POST['date']);
             $user = mysqli_real_escape_string($conn, $_POST['user']);
            
             
             
             $sql_in_loan = "insert into loan(empid,loan_amount,installment,loan_date,user_loan) values( '$id_no','$amount','$ins','$date','$user')";
             
             if(mysqli_query($conn,$sql_in_loan))
             {
                 echo "<h2>Record Inserted Successfully.<br><a href = 'in_fund.php>Next</a></h2>";
             }else
             {
                 echo "Could not execute sql".mysqli_error($conn);
             }
             
             
             
             ?>
             
         </div>
        </section>
    </body>
</html>