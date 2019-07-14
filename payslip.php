<?php include_once "pconfig.php"; 
      
?>


<!DOCTYPE html>
<html>
    <head>
        
         <link rel="stylesheet" type = "text/css" href = "active_employee.css">
        <link rel="stylesheet" type = "text/css" href = "style.css">
    </head>
    <body>
    <section class = "body">
        
    <div class="heading" style= "margin-left:30%;align: 'center'"><h1>Payslip</h1></div>
        <div class= "pay" style = "margin-left:40%">
           <?php 
            if(isset($_REQUEST['msg'] ))
            {
                    $name = $_REQUEST['msg'];
             
             
            $sql_sal = "select employee.id AS ID,CONCAT(employee.fname,' ',employee.lname) AS Name, 
                        employee.address AS Address, salary.amount AS Basic_Pay,
                        (salary.bonus*salary.amount)/100 AS bonus ,
                        (salary.amount*salary.overtime)/600 AS Overtime_pay,((incentives.HRA+incentives.TA+incentives.DA+incentives.medical)*salary.amount)/100 AS Incentives,(((salary.bonus*salary.amount)/100)+((salary.amount*salary.overtime)/600)+ ((incentives.HRA+incentives.TA+incentives.DA+incentives.medical)*salary.amount)/100) AS Increment,
                        IF(loan.status= 'unpaid',loan.installment,0) AS Loan,
                        fund.fund_amount as Fund,
                        advance.ad_amount as Advance_Pay,
                        ((leave_table.total_days*salary.amount)/25) AS Leave_ded, 
                        (IF(loan.status= 'unpaid' , loan.installment,0)+ fund.fund_amount+advance.ad_amount+((leave_table.total_days*salary.amount)/25)) AS Decrement, 
                        (salary.amount - (IF(loan.status= 'unpaid' , loan.installment,0)+ fund.fund_amount+advance.ad_amount+((leave_table.total_days*salary.amount)/25)) + ((salary.bonus*salary.amount)/100)+((salary.amount*salary.overtime)/600)+ ((incentives.HRA+incentives.TA+incentives.DA+incentives.medical)*salary.amount)/100) AS net  from employee 
                        left outer join  salary on employee.id = salary.empid 
                        left outer join incentives on employee.id=incentives.empid 
                        left outer join loan on employee.id=loan.empid 
                        left outer join fund on employee.id=fund.empid 
                        left outer join advance on  employee.id = advance.empid
                        left outer join leave_table on  employee.id = leave_table.empid
                        where employee.id ='$name' ";
            
            $query_sal = mysqli_query($conn, $sql_sal);
          
            
            if(mysqli_num_rows($query_sal)>0)
            {
                
                    while($row =mysqli_fetch_assoc($query_sal))
                    {
                    
                       echo "</br></br></br></br></br>";   
                       echo "<h2>ID: &nbsp".$row['ID']."</h2>";
                       echo "<h2>Name: ".$row['Name']."</h2>";
                       
                       echo "<h2>Address: ".$row['Address']."</h2></br>";
                      
                    
                       echo "</br></br>";
                       echo "<h3>Basic Salary".str_repeat("&nbsp;",35).$row['Basic_Pay']."</h3></br>";
                       echo "<h3>Bonus".str_repeat("&nbsp;",45).$row['bonus']."</h3>";
                       echo "<h3>Overtime Pay".str_repeat("&nbsp;",33).$row['Overtime_pay']."</h3>";
                        echo "<h3>Incentives".str_repeat("&nbsp;",38).$row['Incentives']."</h3>";
                        echo "<h3>Overall Increment".str_repeat("&nbsp;",25).$row['Increment']."</h3></br>";
                       echo "<h3>Loan".str_repeat("&nbsp;",46).$row['Loan']."</h3>";
                       echo "<h3>Fund".str_repeat("&nbsp;",46).$row['Fund']."</h3>";
                      echo "<h3>Advance Payment".str_repeat("&nbsp;",26).$row['Advance_Pay']."</h3>";
                      echo "<h3>Leave deduction".str_repeat("&nbsp;",27).$row['Leave_ded']."</h3>";
                      echo "<h3>Overall Deduction".str_repeat("&nbsp;",25).$row['Decrement']."</h3>";
                        
                         echo "-----------------------------------------------------------------------</br>";
                        
                        echo "<h3>Salary In Hand".str_repeat("&nbsp;",30).$row['net']."</h3>";
                  /*      
                       echo "Bonus".$row['bonus']."</br>";
                        echo "Overtime Pay".$row['Overtime_pay']."</br>";
                        echo "Incentives".$row['']."</br>";
                        echo "Increment".$row['Increment']."</br>";
                        echo "Loan".$row['Loan']."</br>";
                        echo "Fund".$row['Fund']."</br>";
                        echo "Advance Pay".$row['Advance_Pay']."</br>";
                        echo "Leave Deduction".$row['Leave_ded']."</br>";
                        echo "Overall Deduction".$row['Decrement']."</br>";
                        echo "------------------------------------------</br>";
                        echo "".$row['net']."</br>";
                        */
                      
                       
                        
                    }
                
   
            }
             
        }
           // else header("location: salary_hand.php");
    
        ?>
        
        
        
        
        
        </div>
        
        </section>
    </body>
</html>