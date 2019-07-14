<?php 
include_once "pindex.php";
include_once "pconfig.php";


if(isset($_REQUEST['up']))
{
    $v = $_REQUEST['up'];
    $sq = "select empid,amount,salary_type,bonus,bonus_type,overtime,month_year from salary where serial ='$v'";
    $res = mysqli_query($conn,$sq);
   
    echo "$v";
    
    $dat = mysqli_fetch_all($res, MYSQLI_ASSOC);
    
    foreach($dat as $d)
    {
        $id = $d['empid'];
        $amount = $d['amount'];
        $type = $d['salary_type'];
        $bonus = $d['bonus'];
        $btype  = $d['bonus_type'];
        $over= $d['overtime'];
        $date= $d['month_year'];
       
        
        
    }
    
    
    
}

else echo "man";







?>
<!DOCTYPE html>
<html>
    
<head>
    <link rel = "stylesheet" type="text/css" href="style.css">
 </head>
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
          <form action="update.db.salary.php" method="post">
            
              <p>

                  <label for="ID">ID(not changeable)</label>
              <input type="text" name="id" id="id" value = "<?php echo $id; ?>">

           </p>
             
            <p>

            <label for="amount">Basic Amount</label>
            <input type="text" name="amount" id="amount" value = "<?php echo $amount; ?>">


           </p>
             
             <p>

            <label for="type">Salary Type</label>
            <input type="text" name="type" id="sal_type" value = "<?php echo $type; ?>">

           </p>
             
            <p>

            <label for="bonus">Bonus</label>
            <input type="text" name="bonus" id="bonus"  value = "<?php echo $bonus; ?>">

           </p>
             
             <p>

            <label for="bonus_type">Bonus Type</label>
            <input type="text" name="btype" id="btype" value = "<?php echo $btype; ?>">

           </p>
             
             <p>

            <label for="overtime">Overtime</label>
            <input type="text" name="overtime" id="overtime" value = "<?php echo $over; ?>">

           </p>

            <p>

            <label for="date">Date</label>
            <input type="text" name="date" id="date" value = "<?php echo $date; ?>">

           </p>
             
          <input type="submit" value="Update">

          </form>
             
             
             
             
         </div>
        </section>
    </body>
</html>
