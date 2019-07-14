<?php  
        include_once "pindex.php" ;
       include_once "pconfig.php";    ?>



<!DOCTYPE html>
<html>
    
<head>
    <link rel = "stylesheet" type="text/css" href="style.css">
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
      
      
      if(isset($_REQUEST['serial'])){
          $var = $_REQUEST['serial'];
      }
     else {
         header("location: incentives.php");
     }

    $sql = " delete from incentives where index_incentives = '$var'";
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
