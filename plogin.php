

<?php

if(isset($_POST['submitbtn']))
{
    try{
        if(empty($_POST['username'])){
            throw new Exception('Username cannot be empty');
        }
        
         if(empty($_POST['password'])){
            throw new Exception('Password cannot be empty');
        }
        
        include_once 'pconfig.php';
    
    $userid = mysqli_real_escape_string($conn,$_POST['username']);
    $pwd = mysqli_real_escape_string($conn,$_POST['password']);
    
    $sql = "select * from login where username = '$userid' and password = '$pwd' ";
    
    $result = mysqli_query($conn,$sql);
    $resultcheck = mysqli_num_rows($result);
    
    if($resultcheck>0)
    {
        if($row = mysqli_fetch_assoc($result)){
            session_start();
            $_SESSION['nameid'] = $row['username'];
            $_SESSION['pass'] = $row['password'];
            $_SESSION['empid']= $row['emp_id'];
        }
    }
        else throw new Exception('Wrong Username or Password');
    }
    
    
    
    
    catch(Exception $e)
    {
        $message = $e->getmessage();
    }
}








?>
<!DOCTYPE html>
<html lang = 'en'>
  <head>
     <meta charset = 'utf-8'/>
      <title>Login</title>
      <style>
          body {
              background-image: url("Geometric-Simple-Art-Wallpaper-HD-hd-background-hd-screensavers-hd-151359.jpg");
          }
        
        .center{
            padding:50px;
            background-color: lightgray;
            margin:250px auto;
            width: 15%;
            border-radius: 4px;
            
        }
        
        input[type=text],input[type=password]{
            width:100%;
            margin: 2px auto;
            padding: 10px;
            box-sizing: border-box;
            border: 3px #4b4b4b;
            border-radius: 5px;
        }
        
        input[type=text]:focus,input[type=password]:focus{
            border: 3px solid grey;
        }
        
        
        input[type=submit]{
            width:100%;
            padding: 10px;
            background-color: #293d3ds;
            border:none;
            border-radius: 5px;
            cursor:pointer;
        }
        
        input[type=submit]:hover{
            background-color: #c1d7d7;
        }
        
    </style>
  </head>
  
    
  <body>
      
      
    <div class = 'center' align = ' center'>
       <form method="post" action = "plogin.php">
           <?php 
      
      if(isset($message))
      {
          echo $message;
          
      }
      
      elseif(isset($_SESSION['nameid'])&& $_SESSION['pass'])
      {
          header("location: pindex.php");
      }
      
      ?>
           <label for = "user">Username</label>
           <input type="text" class="form" name = "username"/>
           <br>
           <label for = "pass">Password</label>
           <input type = "password" class = "form" name = "password"/>
           <br>
           <input type="submit" class = "click" name = "submitbtn" value = "Login"/>
           
        
        
       </form>
      
      <a>Create New Account</a>
      
    </div>
      
  </body>


</html>