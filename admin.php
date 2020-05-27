<?php include 'connect.php';?>
<!DOCTYPE html>
<html>
<head>
<title>ERM 2</title>
<link rel="stylesheet" type="text/css" href="style.css">
<link rel="stylesheet" type="text/css" href="form_style.css">
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

</head>
<body>
<div id="header">
<div id="headings">
<p id="head1">E.R.M</p><br>
<p id="head2">Education Resource Management</p>

</div>
<div id="buttons">

<button id="topbutton" onclick="student()">Student</button>

<button id="topbutton" onclick="faculty()">Faculty</button>
<button id="topbutton" onclick="new_user()">New User</button>

</div>
</div>
<div>
<div id="admin_login">
    
    

    <?php
        if($_SERVER['REQUEST_METHOD'] != 'POST')
        {
         echo'
         <br>
         <form method="post" action="">
           Login ID:<br>
           <input type="text" id="inputbutton" name="LoginId" value="" required>
           <br>
           Password:<br>
           <input type="password" id="inputbutton" name="Password" value="">
           <br><br>
           <!-- <input type="submit" name= "login_admin" id="submitbutton" value="Login"> -->
           <button type="submit" id="submitbutton">Login</button>
         </form> 
         </div>';
           
          
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
            $sql= "SELECT AdminId,Password
            FROM Admin
            WHERE
              AdminId = '" . mysqli_real_escape_string($conn,$_POST['LoginId']) . "'
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
                
                echo 'You have supplied a wrong user/password combination. Please try again.
                <a href="admin.php">Sign In Correctly</a>';
              }
              else
              {
                  //set the $_SESSION['signed_in'] variable to TRUE
                  $_SESSION['signed_in'] = true;
                   
        
                   
                 header('location: admin_login.php');
              }
              

            }
          }
         }
         ?>
   

<script>

function student(){
  location.replace("student.php")
}
function faculty(){
  location.replace("faculty.php")
}
function new_user(){
  location.replace("new_user.php")
}
</script>


<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>
</html>