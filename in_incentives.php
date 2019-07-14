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
        
     <div class ="heading"><h2>Salary Manager</h2></div>
            <div class = "second">
                <ul>
                    <li><a href ="salary.php" >Salary</a></li>
                    <li><a href ="incentives.php">Incentives</a></li>
                    
            
                    <li class = "right"><a href= 'in_incentives.php'>Insert</a></li>
                    <li class = "right"><a href=#>Search</a></li>
                </ul>
            </div>
         
         <div class = "table-wrap">
         <form action="insert.db.incentives.php" method="post">
            <p>

             <label for="ID">Employee ID:</label>
              <input type="text" name="id_no" id="id">

           </p>

                   
            <p>

            <label for="HRA">House Rent Allowance (HRA) %:</label>
            <input type="text" name="hra" id="hra">

           </p>
             
             <p>

            <label for="TA">Travelling Allowance (TA) %:</label>
            <input type="text" name="ta" id="ta">

           </p>
             
            <p>

            <label for="DA">Dearness Alowance(DA) %:</label>
            <input type="text" name="da" id="da">

           </p>
             
             <p>

            <label for="medical">Medical Allowance  %:</label>
            <input type="text" name="medical" id="medical">

           </p>
             
             <p>

            <label for="date">Date:</label>
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