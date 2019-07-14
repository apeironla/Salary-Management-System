<?php 
include_once "pindex.php";
include_once "pconfig.php";


if(isset($_REQUEST['ud']))
{
    $v = $_REQUEST['ud'];
    $sq = "select * from employee where id ='$v'";
    $res = mysqli_query($conn,$sq);
    
    $dat = mysqli_fetch_all($res, MYSQLI_ASSOC);
    
    foreach($dat as $d)
    {
        $id = $d['id'];
        $fname = $d['fname'];
        $lname = $d['lname'];
        $g = $d['gender'];
        $dob = $d['date_of_birth'];
        $address = $d['address'];
        $city = $d['city'];
        $state = $d['state'];
        $cno = $d['contact_no'];
        $des = $d['designation'];
        $dep = $d['department'];
        $doj = $d['date_of_joining'];
        $rem = $d['remarks'];
        
        
    }
    
    
    
}

else {
    header("location: employee.php");
}





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
        
    <div class="heading"><h2>Employee Manager</h2></div>
         
     <div class = "second">

         <ul>
        <li><a href ="employee.php" >Employee</a></li>
        <li class = "right"><a href= #>Insert</a></li>
        <li class = "right"><a href=#>Search</a></li>
        </ul>
         
        </div>
         
         <div class = "table-wrap">
          <form action="update.db.emp.php" method="post">
            
              <p>

             <label for="ID">ID(not changeable)</label>
              <input type="text" name="id" id="id" value = "<?php echo $id; ?>">

                 </p>
                 

           

           <p>

             <label for="firstName">First Name:</label>
              <input type="text" name="first_name" id="firstName" value = "<?php echo $fname; ?>">

           </p>

           <p>

             <label for="lastName">Last Name:</label>
             <input type="text" name="last_name" id="lastName" value = "<?php echo $lname; ?>">

           </p>
             
            <p>

            <label for="gender">Gender</label>
            <input type="text" name="gen" id="gender" value = "<?php echo $g; ?>">


           </p>
             
             <p>

            <label for="dateofbirth">Date ofBirth</label>
            <input type="text" name="dob" id="dateofbirth" value = "<?php echo $dob; ?>">

           </p>
             
            <p>

            <label for="address">Address</label>
            <input type="text" name="address" id="Address"  value = "<?php echo $address; ?>">

           </p>
             
             <p>

            <label for="city">City</label>
            <input type="text" name="city" id="City" value = "<?php echo $city; ?>">

           </p>
             
             <p>

            <label for="state">State</label>
            <input type="text" name="state" id="State" value = "<?php echo $state; ?>">

           </p>

            <p>

            <label for="contact">Contact No</label>
            <input type="text" name="contact" id="Contact" value = "<?php echo $cno; ?>">

           </p>
             
            
             
             <p>

            <label for="designation">Designation</label>
            <input type="text" name="designation" id="Designation" value = "<?php echo $des; ?>">

           </p>
             
             <p>

            <label for="department">Department</label>
            <input type="text" name="department" id="Department" value = "<?php echo $dep; ?>">

           </p>
             
            <p>

            <label for="dateofjoining">Date of Joining</label>
            <input type="text" name="dateofjoining" id="Date" value = "<?php echo $doj; ?>">

           </p>
             
            <p>

            <label for="remarks">Remarks</label>
            <input type="text" name="remarks" id="Remarks" value = "<?php echo $rem; ?>">

           </p>
             
             
             

                 <p><input type="submit" value="Update"></p>

          </form>
             
             
            
             
         </div>
        </section>
    </body>
</html>
