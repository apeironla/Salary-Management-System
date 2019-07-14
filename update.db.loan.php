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
         
            < <div class ="heading"><h2>Decrement Manager</h2></div>
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
             $id_no = mysqli_real_escape_string($conn, $_POST['id']);
             
             $amount = mysqli_real_escape_string($conn, $_POST['amount']);
             $ins = mysqli_real_escape_string($conn, $_POST['ins']);
             $date =mysqli_real_escape_string($conn, $_POST['date']);
             $user = mysqli_real_escape_string($conn, $_POST['user']);
           
        $up_emp = "update loan set  loan_amount='$amount',installment = '$ins', loan_date= '$date' where empid = '$id_no' ";
        
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
