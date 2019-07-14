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
                   echo  "<li class = 'right'><a href= #>Insert</a></li>";
        }
?>
                    <li class = "right"><a href=#>Search</a></li>
                </ul>
            </div>
            
            <div class = "table-wrap">
                <?php
      
      
                    if(isset($_REQUEST['loan'])){
                    $var = $_REQUEST['loan'];
                    }
                    else {
                    header("location: decrement.php");
                    }

                    $sql = " delete from loan where index_loan = '$var'";
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

            