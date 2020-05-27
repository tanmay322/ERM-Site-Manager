<?php 
session_start();
include 'Navbar.php'?>
        <div id="publishPost">
        <?php
        if($_SERVER['REQUEST_METHOD'] != 'POST')
        {
          
        }
         else{
          $errors = array(); /* declare the array for later use */
         
          if(!isset($_POST['StdId']))
          {
              $errors[] = 'The username field must not be empty.';
          }
           
          if(!isset($_POST['Password']))
          {
              $errors[] = 'The password field must not be empty.';
          }
          if(!empty($errors)){
            alert("the fields are not entered correctly");
          }
          else{
            $sql= "SELECT StdId,Password 
            FROM Student
            WHERE
              StdId = '" . mysqli_real_escape_string($conn,$_POST['LoginId']) . "'
              AND Password = '" . mysqli_real_escape_string($conn,$_POST['Password']) . "'";
            $result = mysqli_query($conn,$sql); 
            if(!$result)
            {
              alert('Error in login ');

            }
            else{
              if(mysqli_num_rows($result) == 0)
              {
                  echo 'You have supplied a wrong user/password combination. Please try again.';
              }
              else
              {
                  //set the $_SESSION['signed_in'] variable to TRUE
                  $_SESSION['signed_in'] = true;
                   
                  //we also put the user_id and user_name values in the $_SESSION, so we can use it at various pages
                  while($row = mysqli_fetch_assoc($result))
                  {
                      $_SESSION['user_name']    = $row['StdId'];
                      // $_SESSION['user_name']  = $row['user_name'];
                      
                  }
                   
                 header('location: student_login.php');
              }
              

            }
          }
         }
         ?>
            </div> 

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
 

