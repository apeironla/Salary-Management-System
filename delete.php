
<?php  include_once "plogout.php" ; 
        include_once "pindex.php"; 
        include_once "pconfig.php"?>
<!DOCTYPE html>
<html>
    <head>
        
         <link rel="stylesheet" type = "text/css" href = "active_employee.css">
    </head>
    <body>
    <section class = "body">
        
    <div class="heading"><h2>Employee Manager</h2></div>
     <div class = "second">
         
       
         <ul>
        <li><a href ="employee.php" >Employee</a></li>
<?php if($_SESSION['nameid']== "admin")
{
    echo " <li class = 'right'><a href= 'in_employee.php'>Insert</a></li>";

       
        echo '<li class = "right"><a href=#><form action= "search_emp.php" method = "post">
             <input type = "text" name = "byname"placeholder = "search by name/date" style="padding: 3px">
            <input type = "submit" name= " submit" value="Search" style = "padding: 1px">
             </form></a></li>';
            
}
             ?>
             
        </ul>
         
        </div>
        
   
    <div class = "table-wrap" >
        <?php
      
      
      if(isset($_REQUEST['id'])){
          $var = $_REQUEST['id'];
      }
     else {
         header("location: employee.php");
     }

        $sql = " delete from employee where id = '$var'";
            if (mysqli_query($conn, $sql)) {
                echo "Record deleted successfully";
        
            } else {
                echo "Error deleting record: " . mysqli_error($conn);
            }

            mysqli_close($conn);


?>
        </div>
        </section>
    </body>
</html>