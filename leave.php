<?php 
        
    include_once "pindex.php";
    include_once "pconfig.php"
    
    
?>

<html>
    <head>
       <link rel="stylesheet" type = "text/css" href = "active_leave.css">
    </head>
     <body>
    
        <section class = "body">
         
            <div class ="heading"><h2>Leave Manager</h2></div>
            <div class = "second">
                <ul>
                    <li><a href ="leave.php" >Leave</a></li>
                    
                    
            <?php    
        if(isset($_SESSION['nameid']) && $_SESSION['nameid'] == 'admin')
        {
                    echo "<li class = 'right'><a href= #>Insert</a></li>";
                        
        }
?>
                    <li class = "right"><a href=#>Search</a></li>
                </ul>
            </div>
            
            <div class = "table-wrap">
            
            
        <?php    
        if(isset($_SESSION['nameid']) && $_SESSION['nameid'] == 'admin')
        {
            $sql_leave= "select leave_table.empid , employee.fname, employee.lname, leave_table.leave_type, leave_table.leave_from, leave_table.leave_to , leave_table.total_days, leave_table.status from employee right join leave_table on employee.id = leave_table.empid";
            
            $query_leave = mysqli_query($conn, $sql_leave);
            
            if(mysqli_num_rows($query_leave)>0)
            {
                echo "<table>";
                    echo "<tr>";
                    echo "<th>ID</th>";
                    echo "<th>Name</th>";
                    echo "<th>Leave Type</th>";
                    echo "<th>From</th>";
                    echo "<th>to</th>";
                    echo "<th>Total days</th>";
                    echo "<th>Status</th>";
                    echo "<th>Actions</th>";
                    echo "</tr>";
                
                    while($row =mysqli_fetch_assoc($query_leave))
                    {
                       echo "<tr>";
                       echo "<td>".$row['empid']."</td>";
                       echo "<td>".$row['fname']." ".$row['lname']."</td>";
                       echo "<td>".$row['leave_type']."</td>";
                       echo "<td>".$row['leave_from']."</td>";
                       echo "<td>".$row['leave_to']."</td>";
                       echo "<td>".$row['total_days']."</td>";
                       echo "<td>".$row['status']."</td>";
                       echo "<td><a href = 'update.php?ud =".$row['empid']."'>Update</a>"." "."<a href = 'delete.php?id=".$row['empid']."'>Delete</a></td>";
                       echo "</tr>";
                        
                    }
                echo "</table>";
   
            }
        }
    
        if(isset($_SESSION['nameid']) && $_SESSION['nameid'] != 'admin')
        {
            $name =$_SESSION['nameid'];
            $sql_leave= "select leave_table.empid , employee.fname, employee.lname, leave_table.leave_type, leave_table.leave_from, leave_table.leave_to , leave_table.total_days, leave_table.status from employee,leave_table where employee.id = leave_table.empid and employee.user = '$name'";
            
            $query_leave = mysqli_query($conn, $sql_leave);
            
            if(mysqli_num_rows($query_leave)>0)
            {
                echo "<table>";
                    echo "<tr>";
                    echo "<th>ID</th>";
                    echo "<th>Name</th>";
                    echo "<th>Leave Type</th>";
                    echo "<th>From</th>";
                    echo "<th>to</th>";
                    echo "<th>Total days</th>";
                    echo "<th>Status</th>";
                    
                    echo "</tr>";
                
                    while($row =mysqli_fetch_assoc($query_leave))
                    {
                       echo "<tr>";
                       echo "<td>".$row['empid']."</td>";
                       echo "<td>".$row['fname']." ".$row['lname']."</td>";
                       echo "<td>".$row['leave_type']."</td>";
                       echo "<td>".$row['leave_from']."</td>";
                       echo "<td>".$row['leave_to']."</td>";
                       echo "<td>".$row['total_days']."</td>";
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