<!DOCTYPE html>
<html> 
<head>
<title>ERM 2</title>
<link rel="stylesheet" type="text/css" href="style.css">
<link rel="stylesheet" type="text/css" href="form_style.css">
<style>
.full_button{
  margin-top: 10%;
}
</style>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<!-- changes made here -->
<meta name="google-signin-client_id" content="224084202159-bgtsnbfuv728h8l7beoko1ddi8pnolk5.apps.googleusercontent.com.apps.googleusercontent.com">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
​
</head>
<body>
<div id="header">
<div id="headings">
<p id="head1">E.R.M</p><br>
<p id="head2">Education Resource Management</p>
​
</div>
<div id="buttons">
​
<button id="topbutton" onclick = "home()">Logout</button>
</div>
</div>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">Student</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav">
        <li class="nav-item active">
          <a class="nav-link" href="student_login.php">Home <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/app/home.php">Message Center</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="upload.php">Post Material</a>
          </li>
          <li class="nav-item">
              <a class="nav-link" href="material.php">Access Material</a>
            </li>

           
​
      </ul>
      <script>
function home(){
            location.replace("index.php")
          }
</script>
    </div>
  </nav>