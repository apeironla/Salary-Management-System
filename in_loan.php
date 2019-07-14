<?php 
include_once "pindex.php";
include_once "pconfig.php";

?>

<!DOCTYPE html>
<html>
    
<head>
    <link rel = "stylesheet" type="text/css" href="style.css">
    
    <style>
       input[type=text]{
            width:100%;
            padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}
        
           
           input[type=submit]{
            width:10%;
            padding: 10px;
            background-color: #293d3ds;
            border:none;
            border-radius: 5px;
            cursor:pointer;
           }
    
    </style>
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
            
         <form action="insert.db.loan.php" method="post">
            <p>

             <label for="ID">Employee ID:</label>
              <input type="text" name="id_no" id="id">

           </p>

                   
            <p>

            <label for="loan_amount">Loan Amount :</label>
            <input type="text" name="loan_amount" id="loan_amount">

           </p>
             
             <p>

            <label for="ins">Installment :</label>
            <input type="text" name="installment" id="install">

           </p>
             
            <p>

            <label for="date">Date</label>
            <input type="text" name="date" id="date">

           </p>

             <p>

            <label for="username">Username</label>
            <input type="text" name="user" id="user">

           </p>
             
            

          <input type="submit" value="Submit">

          </form>
         
         
         
         </div>
         
         
    </section>
        
        <?php include_once "footer.php"; ?>
    </body>
    
        
</html>