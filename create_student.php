<?php
session_start();
include 'connect.php';




    
    
        $sql = "INSERT INTO  Student(FirstName,LastName,StdId,email,Password)VALUES(
            '" . mysqli_real_escape_string($conn,$_POST['FirstName']) . "','" . mysqli_real_escape_string($conn,$_POST['LastName']) . "','" . $_POST['StdId'] . "','" . mysqli_real_escape_string($conn,$_POST['email']) . "','" . sha1($_POST['Passwrd']) . "') ";
        $sql2 = "INSERT INTO user(user_id,user_name,user_pass,user_level)VALUES(" . $_POST['StdId'] . ",'" . mysqli_real_escape_string($conn,$_POST['email']) . "','" . sha1($_POST['Passwrd']) . "',1)";
        mysqli_query($conn,$sql2);
        $_SESSION['signed_in'] = true;
        $_SESSION['user_name']    = $row['FirstName'];
                     $_SESSION['user_id']  = $row['StdId'];
        $result = mysqli_query($conn,$sql);
        if(!$result)
          {
            //    header('location: student_login.php');
            echo 'Error' . mysqli_error($conn);
           echo '<a href="new_student.php">Try Again!!</a>';

          }
          else
          {
              header('location: student_login.php');

          }
    



?>