<?php 
include_once "pindex.php";
include_once "pconfig.php";

if(isset($_SESSION['nameid'])&& $_SESSION['nameid']=="admin")
{

$query = 'select * from employee';
$result = mysqli_query($conn,$query);

$data = mysqli_fetch_all($result, MYSQLI_ASSOC);
//var_dump($data);
mysqli_free_result($result);

mysqli_close($conn);

}

elseif (isset($_SESSION['nameid'])&& $_SESSION['nameid']!="admin"){
    $name =$_SESSION['nameid'];
    
             
    
    $query = "select id, fname,lname,gender,date_of_birth,address,city,state,contact_no,designation,department,date_of_joining,remarks from employee  where user = '$name' ";
$result = mysqli_query($conn,$query);

$data = mysqli_fetch_all($result, MYSQLI_ASSOC);
    
   
//var_dump($data);
    
    
mysqli_free_result($result);

mysqli_close($conn);

    }





    

?>

<!DOCTYPE html>
<html>
    <head>
        
         <link rel="stylesheet" type = "text/css" href = "active_employee.css">
    </head>
    <body>
    <section class = "body">
        
    <div class="heading"><h2>Employee Manager</h2></div>
     <div class = "second">
         
       
         <ul>
        <li><a href ="employee.php" >Employee</a></li>
<?php if($_SESSION['nameid']== "admin")
{
    echo " <li class = 'right'><a href= 'in_employee.php'>Insert</a></li>";

       
        echo '<li class = "right"><a href=#><form action= "search_emp.php" method = "post">
             <input type = "text" name = "byname"placeholder = "search by name/date" style="padding: 3px">
            <input type = "submit" name= " submit" value="Search" style = "padding: 1px">
             </form></a></li>';
            
}
             ?>
             
        </ul>
         
        </div>
        
   
    <div class = "table-wrap" >
        <?php if( $_SESSION['nameid'] =="admin"){
    

        
      echo "  <table align= 'center' >
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Gender</th>
                <th>Date of Birth</th>
                <th>Address</th>
                <th>City</th>
                <th>State</th>
                <th>Contact no</th>
                <th>Designation</th>
                <th>Department</th>
                <th>Date of Joining</th>
                <th>Remarks</th>
                <th>Actions</th>
            </tr>";
    
            
        
        
              foreach($data as $d) {
        
          echo  " <tr>".
                "<td> ".$d['id']."</td>".
                "<td>". $d['fname']." ".$d['lname']."</td>".
                "<td>". $d['gender']."</td>".
                "<td>". $d['date_of_birth']."</td>".
                "<td>". $d['address']."</td>".
                "<td>". $d['city']."</td>".
                "<td>". $d['state']."</td>".
                "<td>". $d['contact_no']."</td>".
                "<td>". $d['designation']."</td>".
                "<td>". $d['department']."</td>".
                "<td>". $d['date_of_joining']."</td>".
                "<td>". $d['remarks']."</td>".
                "<td><a href = 'update_emp.php?ud=".$d['id']."'>Update</a>"." "."<a href = 'delete.php?id=".$d['id']."'>Delete</a></td>".
            "</tr>";
}
    
    
            ?>
            
     <?php  echo "</table>"; 

}
        
        else
        {
            echo " <table align= 'center' >
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Gender</th>
                <th>Date of Birth</th>
                <th>Address</th>
                <th>City</th>
                <th>State</th>
                <th>Contact no</th>
                <th>Designation</th>
                <th>Department</th>
                <th>Date of Joining</th>
                <th>Remarks</th>
                <th>Actions</th>
            </tr>";
    
            
        
         foreach($data as $d) {
        
          echo  " <tr>".
                "<td> ".$d['id']."</td>".
                "<td>". $d['fname']." ".$d['lname']."</td>".
                "<td>". $d['gender']."</td>".
                "<td>". $d['date_of_birth']."</td>".
                "<td>". $d['address']."</td>".
                "<td>". $d['city']."</td>".
                "<td>". $d['state']."</td>".
                "<td>". $d['contact_no']."</td>".
                "<td>". $d['designation']."</td>".
                "<td>". $d['department']."</td>".
                "<td>". $d['date_of_joining']."</td>".
                "<td>". $d['remarks']."</td>".
                "<td><a href = 'update_emp.php?ud=".$d['id']."'>Update</a>".
            "</tr>";
        }
        }
        ?>
          </div>
            
            
    
   
   
        </section>
        
        
</body>
   
    
    

</html>