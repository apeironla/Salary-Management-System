<?php
session_start();

if(isset($_SESSION['nameid'])){
 $showid= $_SESSION['nameid'];
    
}

?>

<!DOCTYPE html>
<html>
    <head><link rel="stylesheet" href="https://fonts.go://ogleapis.com/icon?family=Material+Icons"></head>
<body>

    <div class="logout_button">
     <form action = "plogin.inc.php" method = "post" class = "buttondiv"> 
         <?php 
        echo $showid; 
        ?>
        <button type = "submit"  name = "submit" class="button">Logout <i class="fa-power-off"></i>
        </button>
        </form>
    
   
   </div>
    <div class= "underline"></div>
    

</body>
</html>




   





