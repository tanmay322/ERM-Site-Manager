<?php
session_start();
include 'connect.php';




    
    
        $sql = "INSERT INTO Faculty(FirstName,LastName,EmpId,email,Password)VALUES(
            '" . mysqli_real_escape_string($conn,$_POST['FirstName']) . "','" . mysqli_real_escape_string($conn,$_POST['LastName']) . "','" . $_POST['EmpId'] . "','" . mysqli_real_escape_string($conn,$_POST['email']) . "','" . sha1($_POST['Passwrd']) . "') ";
        $sql2 = "INSERT INTO user(user_id,user_name,user_pass,user_level)VALUES(" . $_POST['EmpId'] . ",'" . mysqli_real_escape_string($conn,$_POST['email']) . "','" . sha1($_POST['Passwrd']) . "',0)";
       $result = mysqli_query($conn,$sql);
       $result2 = mysqli_query($conn,$sql2);
       $_SESSION['signed_in'] = true;
        $_SESSION['user_name']    = $row['FirstName'];
                     $_SESSION['user_id']  = $row['EmpId'];
        if(!$result)
          {
              //something went wrong, display the error
              echo 'Error' . mysqli_error($conn);
          }
          else
          {
              header('location: faculty_login.php');

          }
    


// }
?>