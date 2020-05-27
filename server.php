<?php
session_start();

// initializing variables
$First = "";
$Last = "";
$login_id = "";
$password = "";
$username = "";
$email    = "";
$errors = array(); 

// // connect to the database
$db = mysqli_connect('localhost', 'root', 'mysql', 'registration');

// // REGISTER USER
if (isset($_POST['reg_user'])) {
  // receive all input values from the form
  $First = mysqli_real_escape_string($db, $_POST['First']);
  $Last = mysqli_real_escape_string($db, $_POST['Last']);
  //$username = mysqli_real_escape_string($db, $_POST['login_id']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $password = mysqli_real_escape_string($db, $_POST['password']);
  $login_id = mysqli_real_escape_string($db, $_POST['login_id']);

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($login_id)) { array_push($errors, "Login_id is required"); }
  if (empty($email)) { array_push($errors, "Email is required"); }
  if (empty($password)) { array_push($errors, "Password is required"); }
//   if ($password_1 != $password_2) {
// 	array_push($errors, "The two passwords do not match");
//   }

  // first check the database to make sure 
  // a user does not already exist with the same username and/or email
  $user_check_query = "SELECT * FROM users WHERE login_id='$login_id' OR email='$email' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { // if user exists
    if ($user['login_id'] === $login_id) {
      array_push($errors, "Login_id already exists");
    }

    if ($user['email'] === $email) {
      array_push($errors, "email already exists");
    }
  }

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
  	$password = md5($password);//encrypt the password before saving in the database

  	$query = "INSERT INTO users (login_id, email, password) 
  			  VALUES('$login_id', '$email', '$password')";
  	mysqli_query($db, $query);
  	$_SESSION['login_id'] = $login_id;
  	$_SESSION['success'] = "You are now logged in";
  	header('location: index.php');
  }
}
//check for logging in
if (isset($_POST['login_admin'])) {
  $login_id = mysqli_real_escape_string($db, $_POST['login_id']);
  $password = mysqli_real_escape_string($db, $_POST['password']);

  if (empty($login_id)) {
  	array_push($errors, "Login_id is required");
  }
  if (empty($password)) {
  	array_push($errors, "Password is required");
  }

  if (count($errors) == 0) {
  	$password = md5($password);
  	$query = "SELECT * FROM adminlogin WHERE login_id='$login_id' AND password='$password'";
  	$results = mysqli_query($db, $query);
  	if (mysqli_num_rows($results) == 1) {
  	  $_SESSION['login_id'] = $login_id;
  	  $_SESSION['success'] = "You are now logged in";
  	  header('location: index.php');
  	}else {
  		array_push($errors, "Wrong username/password combination");
  	}
  }
}

?>