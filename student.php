<?php
//Include GP config file && User class
include_once 'gpConfig1.php';
session_start();
include 'connect.php';
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
	
	// //Insert or update user data to the database
    // $gpUserData = array(
    //     // 'oauth_provider'=> 'google',
    //     'oauth_uid'     => $gpUserProfile['id'],
    //     'first_name'    => $gpUserProfile['given_name'],
    //     'last_name'     => $gpUserProfile['family_name'],
    //     'email'         => $gpUserProfile['email']
    //     // 'gender'        => $gpUserProfile['gender'],
    //     // 'locale'        => $gpUserProfile['locale'],
    //     // 'picture'       => $gpUserProfile['picture'],
    //     // 'link'          => $gpUserProfile['link']
    // );
    // $userData = $user->checkUser($gpUserData);
	
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
    $output = '<a href="'.filter_var($authUrl, FILTER_SANITIZE_URL).'">
    <img src="images/g_sign1.png" width="200" height="50" alt=""/>
  
    </a>';
}
?>
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

<!-- Display Google sign-in button -->
<!-- <div id="gSignIn"></div> -->
<!-- <div><?php echo $output; ?></div> -->

<!-- Show the user profile details -->
<div class="userContent" style="display: none;"></div>

</div>
</div>

    <div id="student_login" >
    <?php
        if($_SERVER['REQUEST_METHOD'] != 'POST')
        {
         echo'
         <h3>Student Login</h3>
         <br>
         <form  method = POST action="">
           Login ID:<br>
           <input type="text" id="inputbutton" name="LoginId" value="" placeholder = "Student ID" required>
           <br>
           Password:<br>
           <input type="password" id="inputbutton" name="Password" value="" >
           <br><br>
           <input type="submit" id="submitbutton" value="Login">
           <br><br>
           
           <div>';
           ?>
           <?php echo $output; ?> 

           <?php echo '</div>
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
            $sql= "SELECT StdId,Password 
            FROM Student
            WHERE
              StdId = '" . mysqli_real_escape_string($conn,$_POST['LoginId']) . "'
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
                <a href="student.php">Try Again</a>';
              }
              else
              {
                  //set the $_SESSION['signed_in'] variable to TRUE
                  $_SESSION['signed_in'] = true;
                   
                  //we also put the user_id and user_name values in the $_SESSION, so we can use it at various pages
                  while($row = mysqli_fetch_assoc($result))
                  {
                      $_SESSION['user_name']    = $row['FirstName'];
                     $_SESSION['user_id']  = $row['StdId'];
                      
                  }
                   
                 header('location: student_login.php');
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
<script>
  // Render Google Sign-in button
  function renderButton() {
      gapi.signin2.render('gSignIn', {
          'scope': 'profile email',
          'width': 240,
          'height': 50,
          'longtitle': true,
          'theme': 'dark',
          'onsuccess': onSuccess,
          'onfailure': onFailure
      });
  }
  
  // Sign-in success callback
  function onSuccess(googleUser) {
      // Get the Google profile data (basic)
      //var profile = googleUser.getBasicProfile();
      
      // Retrieve the Google account data
      gapi.client.load('oauth2', 'v2', function () {
          var request = gapi.client.oauth2.userinfo.get({
              'userId': 'me'
          });
          request.execute(function (resp) {
            $_SESSION['signed_in'] = true;
            $_SESSION['user_name']    = $userData['first_name'];
            $_SESSION['user_id']  = $userData['oauth_uid'];
              // Display the user details
              
            //   var profileHTML = '<h3>Welcome '+resp.given_name+'! <a href="javascript:void(0);" onclick="signOut();">Sign out</a></h3>';
            //   profileHTML += '<img src="'+resp.picture+'"/><p><b>Google ID: </b>'+resp.id+'</p><p><b>Name: </b>'+resp.name+'</p><p><b>Email: </b>'+resp.email+'</p><p><b>Gender: </b>'+resp.gender+'</p><p><b>Locale: </b>'+resp.locale+'</p><p><b>Google Profile:</b> <a target="_blank" href="'+resp.link+'">click to view profile</a></p>';
            //   document.getElementsByClassName("userContent")[0].innerHTML = profileHTML;
              
            //   document.getElementById("gSignIn").style.display = "none";
            //   document.getElementsByClassName("userContent")[0].style.display = "block";
          });
      });
  }
  
  // Sign-in failure callback
  function onFailure(error) {
      alert(error);
  }
  
  // Sign out the user
  function signOut() {
      var auth2 = gapi.auth2.getAuthInstance();
      auth2.signOut().then(function () {
          document.getElementsByClassName("userContent")[0].innerHTML = '';
          document.getElementsByClassName("userContent")[0].style.display = "none";
          document.getElementById("gSignIn").style.display = "block";
      });
      
      auth2.disconnect();
  }
  </script>
<!-- <script src="https://apis.google.com/js/client:platform.js?onload=renderButton" async defer></script>  -->

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>
</html>