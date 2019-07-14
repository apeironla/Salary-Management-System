<?php 
        
    include_once "pindex.php";
    include_once "pconfig.php"
    
    
?>

<html>
    <head>
       <link rel="stylesheet" type = "text/css" href = "active_salary.css">
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
        if(isset($_SESSION['nameid']) && $_SESSION['nameid'] == 'admin')
        {
            $sql_sal = "select salary.empid,employee.fname,employee.lname, salary.amount, salary.salary_type,salary.bonus,salary.bonus_type,salary.overtime,salary.month_year,salary.serial from employee 
            right join salary on employee.id = salary.empid";
            
            $query_sal = mysqli_query($conn, $sql_sal);
            
            if(mysqli_num_rows($query_sal)>0)
            {
                echo "<table>";
                    echo "<tr>";
                    echo "<th>ID</th>";
                    echo "<th>Name</th>";
                    echo "<th>Salary</th>";
                    echo "<th>Salary Type</th>";
                    echo "<th>Bonus</th>";
                    echo "<th>Bonus Type</th>";
                    echo "<th>Overtime(hours)</th>";
                    echo "<th>Date</th>";
                    echo "<th>Actions</th>";
                    echo "</tr>";
                
                    while($row =mysqli_fetch_assoc($query_sal))
                    {
                       echo "<tr>";
                       echo "<td>".$row['empid']."</td>";
                       echo "<td>".$row['fname']." ".$row['lname']."</td>";
                       echo "<td>".$row['amount']."</td>";
                       echo "<td>".$row['salary_type']."</td>";
                       echo "<td>".$row['bonus']."</td>";
                       echo "<td>".$row['bonus_type']."</td>";
                       echo "<td>".$row['overtime']."</td>";
                       echo "<td>".$row['month_year']."</td>";
                       echo "<td><a href ='update_salary.php?up=".$row['serial']."'>Update</a>"." "."<a href = 'delete.sal.php?id=".$row['serial']."'>Delete</a></td>";
                       echo "</tr>";
                        
                    }
                echo "</table>";
   
            }
        }

         if(isset($_SESSION['nameid']) && $_SESSION['nameid'] !='admin')
        {
            $name = $_SESSION['nameid'];
              
            $sql_sal = "select salary.empid,employee.fname,employee.lname, salary.amount, salary.salary_type,salary.bonus,salary.bonus_type,salary.overtime,salary.month_year from  salary,employee where employee.id=salary.empid and  salary.user_salary = '$name'";
            
            $query_sal = mysqli_query($conn, $sql_sal);
            
            if(mysqli_num_rows($query_sal)>0)
            {
                echo "<table>";
                    echo "<tr>";
                    echo "<th>ID</th>";
                    echo "<th>Name</th>";
                    echo "<th>Salary</th>";
                    echo "<th>Salary Type</th>";
                    echo "<th>Bonus</th>";
                    echo "<th>Bonus Type</th>";
                    echo "<th>Overtime(hours)</th>";
                    echo "<th>Date</th>";
                    
                    echo "</tr>";
                
                    while($row =mysqli_fetch_assoc($query_sal))
                    {
                       echo "<tr>";
                       echo "<td>".$row['empid']."</td>";
                       echo "<td>".$row['fname']." ".$row['lname']."</td>";
                       echo "<td>".$row['amount']."</td>";
                       echo "<td>".$row['salary_type']."</td>";
                       echo "<td>".$row['bonus']."</td>";
                       echo "<td>".$row['bonus_type']."</td>";
                       echo "<td>".$row['overtime']."</td>";
                       echo "<td>".$row['month_year']."</td>";
                      
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