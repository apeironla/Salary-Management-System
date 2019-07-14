<?php 
include_once "pindex.php";
include_once "pconfig.php";

 $v = $_REQUEST['msg'];
  echo $v;
if(isset($_REQUEST["msg"]))
{
    $v = $_REQUEST["msg"];
    $sq = "select empid,loan_amount,installment,loan_date,user_loan from loan where index_loan = '$v'";
    
    $res = mysqli_query($conn,$sq);
    $dat = mysqli_fetch_all($res, MYSQLI_ASSOC);
    
    foreach($dat as $d)
    {
        $id = $d['empid'];
        $amount = $d['loan_amount'];
        $ins = $d['installment'];
        $date = $d['loan_date'];
        $user  = $d['user_loan'];
        
        
        
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
          <form action="update.db.loan.php" method="post">
            
              <p>

                  <label for="ID">ID(not changeable)</label>
              <input type="text" name="id" id="id" value = "<?php echo $id; ?>">

           </p>
             
            <p>

            <label for="amount">Loan Amount</label>
            <input type="text" name="amount" id="amount" value = "<?php echo $amount; ?>">


           </p>
             
             <p>

            <label for="ins">Installment</label>
            <input type="text" name="ins" id="ins" value = "<?php echo $ins; ?>">

           </p>
             
            <p>

            <label for="date">Date</label>
            <input type="text" name="date" id="date"  value = "<?php echo $date; ?>">

           </p>
             
             <p>

            <label for="user">Username</label>
            <input type="text" name="user" id="user" value = "<?php echo $user; ?>">

           </p>
             
            
             
          <input type="submit" value="Update">

          </form>
             
             
             
             
         </div>
        </section>
    </body>
</html>
