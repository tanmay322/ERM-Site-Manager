<?php
session_start();
//Include GP config file && User class
include_once 'gpConfig1.php';
include_once 'User.php';


if(isset($_GET['code'])){
	$gClient->authenticate($_GET['code']);
	$_SESSION['token'] = $gClient->getAccessToken();
	header('Location: ' . filter_var($redirectURL, FILTER_SANITIZE_URL));
}

if (isset($_SESSION['token'])) {
	$gClient->setAccessToken($_SESSION['token']);
}

if ($gClient->getAccessToken()) {
	//Get user profile data from google
	$gpUserProfile = $google_oauthV2->userinfo->get();
	
	//Initialize User class
	$user = new User();
	
	//Insert or update user data to the database
    $gpUserData = array(
        // 'oauth_provider'=> 'google',
        'oauth_uid'     => $gpUserProfile['id'],
        'first_name'    => $gpUserProfile['given_name'],
        'last_name'     => $gpUserProfile['family_name'],
        'email'         => $gpUserProfile['email']
        // 'gender'        => $gpUserProfile['gender'],
        // 'locale'        => $gpUserProfile['locale'],
        // 'picture'       => $gpUserProfile['picture'],
        // 'link'          => $gpUserProfile['link']
    );
    $userData = $user->checkUser($gpUserData);
	
	//Storing user data into session
	$_SESSION['userData'] = $userData;
	
	//Render facebook profile data
    if(!empty($userData)){
        $output = '<h1>Google+ Profile Details </h1>';
        $output .= '<img src="'.$userData['picture'].'" width="300" height="220">';
        $output .= '<br/>Google ID : ' . $userData['oauth_uid'];
        $output .= '<br/>Name : ' . $userData['first_name'].' '.$userData['last_name'];
        $output .= '<br/>Email : ' . $userData['email'];
        // $output .= '<br/>Gender : ' . $userData['gender'];
        // $output .= '<br/>Locale : ' . $userData['locale'];
        $output .= '<br/>Logged in with : Google';
        $output .= '<br/><a href="'.$userData['link'].'" target="_blank">Click to Visit Google+ Page</a>';
        $output .= '<br/>Logout from <a href="logout.php">Google</a>'; 
    }else{
        $output = '<h3 style="color:red">Some problem occurred, please try again.</h3>';
    }
} else {
	$authUrl = $gClient->createAuthUrl();
	$output = '<a href="'.filter_var($authUrl, FILTER_SANITIZE_URL).'"><img src="images/g_signup.png" width = "200" height = "50" alt=""/></a>';
}
?>
<!DOCTYPE html>
<head>
<!-- <meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> -->
<title>ERM</title>
<!-- <style type="text/css">
h1{font-family:Arial, Helvetica, sans-serif;color:#999999;}
</style> -->
<link rel="stylesheet" type="text/css" href="style.css">
<link rel="stylesheet" type="text/css" href="form_style.css">
<style>

</style>
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
<button id="topbutton" onclick="admin()">Admin</button>
<button id="topbutton" onclick="home()">Home</button>

</div>
</div>
<div id="student_login" style="height:620px;">

     

<h3>Google sign-ups</h3>
        <br>
        <div><?php echo $output; ?></div>

<!-- <div><?php echo $output; ?></div> -->
<!-- <div><?php echo $output; ?></div> -->
<!-- <div id="student_login" style="height:590px;"> -->
        <br>
        <h3>New Student Sign Up</h3>
    <br>
    <form action="create_student.php" method = "POST">
      <div class="form-row">
        <div class="form-group col-md-6">
          <label for="inputEmail4">First Name</label>
          <input type="fname" class="form-control" id="inputEmail4" placeholder="First Name" name = "FirstName" required>
        </div>
        <div class="form-group col-md-6">
          <label for="inputEmail4">Last Name</label>
          <input type="lname" class="form-control" id="inputEmail4" placeholder="Last Name" name = "LastName" required>
        </div>
        <div class="form-group col-md-6">
            <label for="inputEmail4">Student ID</label>
            <input type="lname" class="form-control" id="inputEmail4" placeholder="#00123456" name = "StdId" required>
          </div>
      </div>
      <div class="form-group">
        <label for="inputEmail">Email Address</label>
        <input type="text" class="form-control" id="inputAddress" placeholder="Enter the email" name = "email" 
        pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" required>
      </div>
        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="inputPassword4">Create Password</label>
            <input type="password" class="form-control" id="inputPassword4" placeholder="Password" name="Passwrd" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>
          </div>
		</div>
        

        <div class="form-group">
          <!-- <div class="form-check">
            <input class="form-check-input" type="checkbox" id="gridCheck">
            <label class="form-check-label" for="gridCheck">
              Check me out
            </label>
          </div> -->
        </div>
        <button type="submit" class="btn btn-primary" name = "reg_user" >Sign Up</button>
        
    </form> 

    
      </div>
      <script>
        function student(){
        location.replace("student.php")
}
          function admin(){
            location.replace("admin.php")
          }
          function faculty(){
            location.replace("faculty.php")
          }
          function home(){
            location.replace("index.php")
          }
         
          </script>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>
</html>