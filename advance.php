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
            $sql_advance= "select advance.empid , employee.fname, employee.lname, advance.ad_amount, advance.date from employee right join advance on employee.id = advance.empid";
            
            $query_advance = mysqli_query($conn, $sql_advance);
            
            if(mysqli_num_rows($query_advance)>0)
            {
                echo "<table>";
                    echo "<tr>";
                    echo "<th>ID</th>";
                    echo "<th>Name</th>";
                    echo "<th>Advance Pay</th>";
                    echo "<th>Date</th>";
                    echo "<th>Actions</th>";
                    echo "</tr>";
                
                    while($row =mysqli_fetch_assoc($query_advance))
                    {
                       echo "<tr>";
                       echo "<td>".$row['empid']."</td>";
                       echo "<td>".$row['fname']." ".$row['lname']."</td>";
                       echo "<td>".$row['ad_amount']."</td>";
                       echo "<td>".$row['date']."</td>";
                       echo "<td><a href = 'update.php?ud =".$row['empid']."'>Update</a>"." "."<a href = 'delete.php?id=".$row['empid']."'>Delete</a></td>";
                       echo "</tr>";
                        
                    }
                echo "</table>";
   
            }
        }

        elseif(isset($_SESSION['nameid']) && $_SESSION['nameid'] != 'admin')
        {
            $name =$_SESSION['nameid'];
            $sql_advance= "select advance.empid , employee.fname, employee.lname, advance.ad_amount, advance.date from employee, advance where employee.id = advance.empid AND advance.user_advance = '$name'";
            
            $query_advance = mysqli_query($conn, $sql_advance);
            
            if(mysqli_num_rows($query_advance)>0)
            {
                echo "<table>";
                    echo "<tr>";
                    echo "<th>ID</th>";
                    echo "<th>Name</th>";
                    echo "<th>Advance Pay</th>";
                    echo "<th>Date</th>";
                   
                    echo "</tr>";
                
                    while($row =mysqli_fetch_assoc($query_advance))
                    {
                       echo "<tr>";
                       echo "<td>".$row['empid']."</td>";
                       echo "<td>".$row['fname']." ".$row['lname']."</td>";
                       echo "<td>".$row['ad_amount']."</td>";
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