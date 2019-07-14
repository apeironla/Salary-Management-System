<?php 
        
   
    include_once "pconfig.php"
    require('fpdf.php');
    
    
?>


   
    
        
         <?php    
        if(isset($_SESSION['nameid']) && $_SESSION['nameid'] == 'admin')
        {
            $sql_sal = 'select employee.id AS ID,CONCAT(employee.fname," ",employee.lname) AS Name, 
                        employee.address AS Address, salary.amount AS Basic_Pay,
                        (salary.bonus*salary.amount)/100 AS bonus ,
                        (salary.amount*salary.overtime)/600 AS Overtime_pay,((incentives.HRA+incentives.TA+incentives.DA+incentives.medical)*salary.amount)/100 AS Incentives,(((salary.bonus*salary.amount)/100)+((salary.amount*salary.overtime)/600)+ ((incentives.HRA+incentives.TA+incentives.DA+incentives.medical)*salary.amount)/100) AS Increment,
                        IF(loan.status= "unpaid",loan.installment,0) AS Loan,
                        fund.fund_amount as Fund,
                        advance.ad_amount as Advance_Pay,
                        ((leave_table.total_days*salary.amount)/25) AS Leave_ded, 
                        (IF(loan.status= "unpaid" , loan.installment,0)+ fund.fund_amount+advance.ad_amount+((leave_table.total_days*salary.amount)/25)) AS Decrement, 
                        (salary.amount - (IF(loan.status= "unpaid" , loan.installment,0)+ fund.fund_amount+advance.ad_amount+((leave_table.total_days*salary.amount)/25)) + ((salary.bonus*salary.amount)/100)+((salary.amount*salary.overtime)/600)+ ((incentives.HRA+incentives.TA+incentives.DA+incentives.medical)*salary.amount)/100) AS net   from employee,salary,incentives,loan,fund,advance,leave_table  where  employee.id = salary.empid and employee.id=incentives.empid AND employee.id=loan.empid AND employee.id=fund.empid AND employee.id = advance.empid and employee.id = leave_table.empid';
            
            $query_sal = mysqli_query($conn, $sql_sal);
            
            if(mysqli_num_rows($query_sal)>0)
            {
               /* echo "<table>";
                    echo "<tr>";
                    echo "<th>ID</th>";
                    echo "<th>Name</th>";
                    echo "<th>Address</th>";
                    echo "<th>Salary</th>";
                    
                    echo "<th>Bonus</th>";
                    echo "<th>Overtime_pay</th>";
                    echo "<th>Incentives</th>";
                     echo "<th>Increment</th>";
                    echo "<th>Loan</th>";
                    echo "<th>Fund</th>";
                    echo "<th>Advannce Pay</th>";
                    echo "<th>Leave Deduction</th>";
                    echo "<th>Decrement</th>";
                    echo "<th>Net Salary</th>";
                    
                    
                    echo "<th>Actions</th>";
                    echo "</tr>";
                
                  while($row =mysqli_fetch_assoc($query_sal))
                    {
                       echo "<tr>";
                       echo "<td>".$row['ID']."</td>";
                       echo "<td>".$row['Name']."</td>";
                       echo "<td>".$row['Address']."</td>";
                       
                       echo "<td>".$row['Basic_Pay']."</td>";
                       echo "<td>".$row['bonus']."</td>";
                        echo "<td>".$row['Overtime_pay']."</td>";
                        echo "<td>".$row['Incentives']."</td>";
                        echo "<td>".$row['Increment']."</td>";
                        echo "<td>".$row['Loan']."</td>";
                        echo "<td>".$row['Fund']."</td>";
                        echo "<td>".$row['Advance_Pay']."</td>";
                        echo "<td>".$row['Leave_ded']."</td>";
                        echo "<td>".$row['Decrement']."</td>";
                        echo "<td>".$row['net']."</td>";
                        
                      echo "<td><a href ='payslip.php?msg=".$row['ID']."'>Generate Pay Slip</a></td>";
                       echo "</tr>";
                        
                    }
                echo "</table>";*/
   
            }
        }
        
         elseif(isset($_SESSION['nameid']) && $_SESSION['nameid'] != 'admin')
        {
             $name =$_SESSION['nameid'] ;
             
             
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
                        where employee.user ='$name' ";
            
            $query_sal = mysqli_query($conn, $sql_sal);
          
            
            if(mysqli_num_rows($query_sal)>0)
            {
                echo "<table>";
                    echo "<tr>";
                    echo "<th>ID</th>";
                    echo "<th>Name</th>";
                    echo "<th>Address</th>";
                    echo "<th>Salary</th>";
                    
                    echo "<th>Bonus</th>";
                    echo "<th>Overtime_pay</th>";
                    echo "<th>Incentives</th>";
                     echo "<th>Increment</th>";
                    echo "<th>Loan</th>";
                    echo "<th>Fund</th>";
                    echo "<th>Advannce Pay</th>";
                    echo "<th>Leave Deduction</th>";
                    echo "<th>Decrement</th>";
                    echo "<th>Net Salary</th>";
                    
                    
                    echo "<th>Actions</th>";
                    echo "</tr>";
                
                    while($row =mysqli_fetch_assoc($query_sal))
                    {
                       echo "<tr>";
                       echo "<td>".$row['ID']."</td>";
                       echo "<td>".$row['Name']."</td>";
                       echo "<td>".$row['Address']."</td>";
                       
                       echo "<td>".$row['Basic_Pay']."</td>";
                       echo "<td>".$row['bonus']."</td>";
                        echo "<td>".$row['Overtime_pay']."</td>";
                        echo "<td>".$row['Incentives']."</td>";
                        echo "<td>".$row['Increment']."</td>";
                        echo "<td>".$row['Loan']."</td>";
                        echo "<td>".$row['Fund']."</td>";
                        echo "<td>".$row['Advance_Pay']."</td>";
                        echo "<td>".$row['Leave_ded']."</td>";
                        echo "<td>".$row['Decrement']."</td>";
                        echo "<td>".$row['net']."</td>";
                        
                       echo "<td><a href ='payslip.php?msg=".$row['ID']."'>Generate Pay Slip</a></td>";
                       echo "</tr>";
                        
                    }
                echo "</table>";
   
            }
             
             
             
        }
    
        ?>
        </div>
    </section>
</body>
    
    
</html>