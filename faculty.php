
<?php 
session_start();
include 'connect.php'?>
<!DOCTYPE html>
<html>
<head>
<title>ERM 2</title>
<link rel="stylesheet" type="text/css" href="style.css">
<link rel="stylesheet" type="text/css" href="form_style.css">
<style>

</style>
<!-- changes here -->
<script src="https://apis.google.com/js/client:platform.js?onload=renderButton" async defer></script> 
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<!-- changes here -->
<meta name="google-signin-client_id" content="70340154626-qhdiqi90aeekesnj7n93nei5jls037ut.apps.googleusercontent.com">

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

</head>
<body>
<div id="header">
<div id="headings">
<p id="head1">E.R.M</p><br>
<p id="head2">Education Resource Management</p>

</div>
<div id="buttons">
    <button id="topbutton" onclick="faculty()">Faculty</button>
<button id="topbutton" onclick="admin()">Admin</button>

<button id="topbutton" onclick="new_user()">New User</button>



<!-- Show the user profile details -->
<div class="userContent" style="display: none;"></div>

</div>
</div>

    <div id="faculty_login" >
    
    <?php
        if($_SERVER['REQUEST_METHOD'] != 'POST')
        {
         echo'
         <h3>Faculty Login</h3>
         <br>
         <form  method = POST action="">
           Login ID:<br>
           <input type="text" id="inputbutton" name="LoginId" value="" placeholder = "Employee ID" required>
           <br>
           Password:<br>
           <input type="password" id="inputbutton" name="Password" value="" >
           <br><br>
           <input type="submit" id="submitbutton" value="Login">
           <br><br>
           
           <div><?php echo $output; ?></div>
         </form> 
         '; 
        }
         else{
          $errors = array(); /* declare the array for later use */
         
        
          if(!empty($errors)){
            echo 'Uh-oh.. a couple of fields are not filled in correctly..';
            echo '<ul>';
            foreach($errors as $key => $value) /* walk through the array so all the errors get displayed */
            {
                echo '<li>' . $value . '</li>'; /* this generates a nice error list */
            }
            echo '</ul>';
          }
          else{
            $sql= "SELECT EmpId,Password 
            FROM Faculty
            WHERE
              EmpId = '" . mysqli_real_escape_string($conn,$_POST['LoginId']) . "'
              AND Password = '" . sha1($_POST['Password']) . "'";
            $result = mysqli_query($conn,$sql); 
            if(!$result)
            {
              echo 'Error in login ';
              
              echo mysqli_errno($conn); 
            }
            else{
              if(mysqli_num_rows($result) == 0)
              {
                
                echo 'You have supplied a wrong user/password combination.
                <a href="admin.php">Try Again</a>';
              }
              else
              {
                  //set the $_SESSION['signed_in'] variable to TRUE
                  $_SESSION['signed_in'] = true;
                   
                  //we also put the user_id and user_name values in the $_SESSION, so we can use it at various pages
                  while($row = mysqli_fetch_assoc($result))
                  {
                    $_SESSION['user_name']    = $row['FirstName'];
                    $_SESSION['user_id']  = $row['EmpId'];
                      
                  }
                   
                 header('location: faculty_login.php');
              }
              

            }
          }
         }
         ?>
      </div>
      <script>

          function admin(){
            location.replace("admin.php")
          }
          function faculty(){
            location.replace("faculty.php")
          }
          function new_user(){
            location.replace("new_user.php")
          }
         
          </script>

<!-- changes made here -->

<!-- <script src="https://apis.google.com/js/client:platform.js?onload=renderButton" async defer></script>  -->

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>
</html>