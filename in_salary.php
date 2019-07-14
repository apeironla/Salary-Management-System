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
                    
            
                    <li class = "right"><a href= 'in_salary.php'>Insert</a></li>
                    <li class = "right"><a href=#>Search</a></li>
                </ul>
            </div>
         
         <div class = "table-wrap">
         <form action="insert.db.salary.php" method="post">
            <p>

             <label for="ID">Employee ID:</label>
              <input type="text" name="id_no" id="id">

           </p>

                   
            <p>

            <label for="salary">Salary:</label>
            <input type="text" name="salary" id="salary">

           </p>
             
             <p>

            <label for="salary_type">Salary Type:</label>
            <input type="text" name="salary_type" id="salarytype">

           </p>
             
            <p>

            <label for="bonus">Bonus (Percentage)</label>
            <input type="text" name="bonus" id="bonus">

           </p>
             
             <p>

            <label for="bonus_type">Bonus Type:</label>
            <input type="text" name="bonus_type" id="bonus_type">

           </p>
             
             <p>

            <label for="overtime">Overtime(hours):</label>
            <input type="text" name="overtime" id="overtime">

           </p>

            <p>

            <label for="month">Date</label>
            <input type="text" name="month" id="month">

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