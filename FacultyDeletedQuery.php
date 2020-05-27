<?php
include 'connect.php';
$Emp_id=$_GET['id']; 
$sql="DELETE FROM Faculty WHERE  EmpId=$Emp_id";
mysqli_query($conn,$sql);
    
              header('location: delete_faculty.php');

          
        ?>