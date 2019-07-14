<?php 
        
    include_once "pindex.php";
    include_once "pconfig.php"
    
    
?>
<html>
    <head>
       <link rel="stylesheet" type = "text/css" href = "active_decrement.css">
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
        if(isset($_SESSION['nameid']) && $_SESSION['nameid'] == 'admin')
        {
            $sql_loan= "select loan.empid , employee.fname, employee.lname, loan.loan_amount, loan.installment, loan.loan_date,loan.status,loan.index_loan from employee,loan where employee.id = loan.empid";
            
            $query_loan = mysqli_query($conn, $sql_loan);
            
            if(mysqli_num_rows($query_loan)>0)
            {
                echo "<table>";
                    echo "<tr>";
                    echo "<th>ID</th>";
                    echo "<th>Name</th>";
                    echo "<th>Loan Amount</th>";
                    echo "<th>Installment</th>";
                    echo "<th>Date</th>";
                    echo "<th>Status</th>";
                    echo "<th>Actions</th>";
                    echo "</tr>";
                
                    while($row =mysqli_fetch_assoc($query_loan))
                    {
                       echo "<tr>";
                       echo "<td>".$row['empid']."</td>";
                       echo "<td>".$row['fname']." ".$row['lname']."</td>";
                       echo "<td>".$row['loan_amount']."</td>";
                       echo "<td>".$row['installment']."</td>";
                       echo "<td>".$row['loan_date']."</td>";
                       echo "<td>".$row['status']."</td>";
                       echo "<td><a href = 'update_loan.php?msg=".$row['index_loan']."'>Update</a>"." "."<a href = 'delete_loan.php?loan=".$row['index_loan']."'>Delete</a></td>";
                       echo "</tr>";
                        
                    }
                echo "</table>";
   
            }
        }
        
        elseif(isset($_SESSION['nameid']) && $_SESSION['nameid'] != 'admin')
        {
            $name = $_SESSION['nameid'];
            $sql_loan= "select loan.empid , employee.fname, employee.lname, loan.loan_amount, loan.installment, loan.loan_date, loan.status from employee,loan where employee.id = loan.empid AND loan.user_loan ='$name'";
            
            $query_loan = mysqli_query($conn, $sql_loan);
            
            if(mysqli_num_rows($query_loan)>0)
            {
                echo "<table>";
                    echo "<tr>";
                    echo "<th>ID</th>";
                    echo "<th>Name</th>";
                    echo "<th>Loan Amount</th>";
                    echo "<th>Installment</th>";
                    echo "<th>Date</th>";
                    echo "<th>Status</th>";
                    
                    echo "</tr>";
                
                    while($row =mysqli_fetch_assoc($query_loan))
                    {
                       echo "<tr>";
                       echo "<td>".$row['empid']."</td>";
                       echo "<td>".$row['fname']." ".$row['lname']."</td>";
                       echo "<td>".$row['loan_amount']."</td>";
                       echo "<td>".$row['installment']."</td>";
                       echo "<td>".$row['loan_date']."</td>";
                         echo "<td>".$row['status']."</td>";
                       
                       echo "</tr>";
                        
                    }
                echo "</table>";
   
            }
        }
        
        
            
            ?>

            </div>
        </section>
        
        <?php include_once "footer.php" ?>
    </body>

</html>