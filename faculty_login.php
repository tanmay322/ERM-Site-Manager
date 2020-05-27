<?php
//Include GP config file && User class
include_once 'gpConfig1.php';
include_once 'User.php';
// include('server.php');
include 'connect.php';
?>
​
 <?php
      include 'Navbar_faculty.php';
        $sql= "SELECT * FROM Department";
        
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
                    echo '  <div class="card" style="width: 18rem;float:left;position: relative;margin-top: 30px;margin-left: 50px;" >
                     
                    <div class="card-body">
                      <h5 class="card-title">'.$row["Name"].'</h5>
                      <p class="card-text">'.$row["Description"].'</p>
                      <a href="goinf.php?id='.$row["DepartmentID"].'" class="btn btn-primary">Go In</a>
                    </div>
                  </div>
                  <br/>';
                    
                }
             }
        }
    ?>
<script>
function home(){
            location.replace("index.php")
          }
</script>
​
<!-- changes made here -->
<script src="https://apis.google.com/js/client:platform.js?onload=renderButton" async defer></script> 
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
​
</body>
</html>