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
        
    <div class="heading"><h2>Employee Manager</h2></div>
         
     <div class = "second">

         <ul>
        <li><a href ="employee.php" >Employee</a></li>
        <li class = "right"><a href= "in_employee.php">Insert</a></li>
        <li class = "right"><a href=#>Search</a></li>
        </ul>
         
        </div>
         
         <div class = "table-wrap">
         <form action="insert.db.emp.php" method="post">
          
           <p>

             <label for="firstName">First Name:    </label>
              <input type="text" name="first_name" id="firstName">

           </p>

           <p>

             <label for="lastName">Last Name:</label>
             <input type="text" name="last_name" id="lastName">

           </p>
             
            <p>

            <label for="gender">Gender</label>
            <input type="text" name="gen" id="gender">

           </p>
             
             <p>

            <label for="dateofbirth">Date ofBirth</label>
            <input type="text" name="dob" id="dateofbirth">

           </p>
             
            <p>

            <label for="address">Address</label>
            <input type="text" name="address" id="Address">

           </p>
             
             <p>

            <label for="city">City</label>
            <input type="text" name="city" id="City">

           </p>
             
             <p>

            <label for="state">State</label>
            <input type="text" name="state" id="State">

           </p>

            <p>

            <label for="contact">Contact No</label>
            <input type="text" name="contact" id="Contact">

           </p>
             
            
             
             <p>

            <label for="designation">Designation</label>
            <input type="text" name="designation" id="Designation">

           </p>
             
             <p>

            <label for="department">Department</label>
            <input type="text" name="department" id="Department">

           </p>
             
            <p>

            <label for="dateofjoining">Date of Joining</label>
            <input type="text" name="dateofjoining" id="Date">

           </p>
             
            <p>

            <label for="remarks">Remarks</label>
            <input type="text" name="remarks" id="Remarks">

           </p>
             
              <p>

            <label for="username">Username:</label>
            <input type="text" name="user" id="user">

           </p>
             
             
             

          <input type="submit" value="Submit">

          </form>
         
         
         
         </div>
         
         
    </section>
        
        <?php include_once "footer.php"; ?>
    </body>
    
        
</html>