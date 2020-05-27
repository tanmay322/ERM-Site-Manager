<?php
//Include GP config file && User class
include_once 'gpConfig.php';
include_once 'User.php';
// include('server.php');
include 'connect.php';
?>
<?php
      include 'Navbar.php';
      $Dept_id=$_GET['id'];
      echo'<div class="row">
      ';
        $sql= "SELECT * FROM Course where DepartmentID='$Dept_id'";
        
        $result = mysqli_query($conn,$sql);
         
         if(!$result)
         {
             //the query failed, uh-oh :-(
             echo 'Error while selecting from database. Please try again later.';
         }
        else
        {
            if(mysqli_num_rows($result) == 0)
             {
               echo 'no rows';
             }
             else{
                while($row = mysqli_fetch_assoc($result))
                {   
                    echo ' 
                    <div class="col-sm-3"> 
                    <div class="card" style="width: 18rem;float:left;position: relative;margin-top: 30px;margin-left: 10px;" >
                     
                    <div class="card-body">
                      <h5 class="card-title">'.$row["Name"].'</h5>
                      <p class="card-text">'.$row["Description"].'</p>
                      <a href="coursesContent.php?id='.$row["CourseID"].'" class="btn btn-primary">Go In</a>
                    </div>
                  </div>
                  <br>
                  </div>';
                    
                }
             }
        }
        echo'</div>';
    ?>
