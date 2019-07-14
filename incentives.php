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
                            echo "<li class = 'right'><a href= 'in_incentives.php'>Insert</a></li>";
                        }
                            ?>
                    <li class = "right"><a href=#>Search</a></li>
                </ul>
            </div>
            
            <div class = "table-wrap">
            
            
        <?php    
        if(isset($_SESSION['nameid']) && $_SESSION['nameid'] == 'admin')
        {
            $sql_inc= "select incentives.empid , employee.fname, employee.lname , incentives.HRA , incentives.TA,incentives.DA, incentives.medical, incentives.date ,incentives.index_incentives from employee right join incentives on employee.id = incentives.empid";
            
            $query_inc = mysqli_query($conn, $sql_inc);
            
            if(mysqli_num_rows($query_inc)>0)
            {
                echo "<table>";
                    echo "<tr>";
                    echo "<th>ID</th>";
                    echo "<th>Name</th>";
                    echo "<th>HRA</th>";
                    echo "<th>TA</th>";
                    echo "<th>DA</th>";
                    echo "<th>Medical</th>";
                    echo "<th>Date</th>";
                    echo "<th>Actions</th>";
                    echo "</tr>";
                
                    while($row =mysqli_fetch_assoc($query_inc))
                    {
                       echo "<tr>";
                       echo "<td>".$row['empid']."</td>";
                       echo "<td>".$row['fname']." ".$row['lname']."</td>";
                       echo "<td>".$row['HRA']."</td>";
                       echo "<td>".$row['TA']."</td>";
                       echo "<td>".$row['DA']."</td>";
                       echo "<td>".$row['medical']."</td>";
                       echo "<td>".$row['date']."</td>";
                       echo "<td><a href = 'update.php?ud =".$row['index_incentives']."'>Update</a>"." "."<a href = 'delete_incentives.php?serial=".$row['index_incentives']."'>Delete</a></td>";
                       echo "</tr>";
                        
                    }
                echo "</table>";
   
            }
        }

        elseif (isset($_SESSION['nameid']) && $_SESSION['nameid'] != 'admin')
        {
             $name = $_SESSION['nameid'];
            $sql_inc= "select incentives.empid , employee.fname, employee.lname,incentives.HRA , incentives.TA,incentives.DA, incentives.medical, incentives.date from incentives ,employee where employee.id = incentives.empid AND incentives.user_incentives = '$name'";
            
            $query_inc = mysqli_query($conn, $sql_inc);
            
            if(mysqli_num_rows($query_inc)>0)
            {
                echo "<table>";
                    echo "<tr>";
                    echo "<th>ID</th>";
                    echo "<th>Name</th>";
                    echo "<th>HRA</th>";
                    echo "<th>TA</th>";
                    echo "<th>DA</th>";
                    echo "<th>Medical</th>";
                    echo "<th>Date</th>";
                   
                    echo "</tr>";
                
                    while($row =mysqli_fetch_assoc($query_inc))
                    {
                       echo "<tr>";
                       echo "<td>".$row['empid']."</td>";
                        echo "<td>".$row['fname']." ".$row['lname']."</td>";
                       echo "<td>".$row['HRA']."</td>";
                       echo "<td>".$row['TA']."</td>";
                       echo "<td>".$row['DA']."</td>";
                       echo "<td>".$row['medical']."</td>";
                       echo "<td>".$row['date']."</td>";
                       
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