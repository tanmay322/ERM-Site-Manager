<?php
//Include GP config file && User class
include_once 'gpConfig.php';
include_once 'User.php';
?>
<!DOCTYPE html>
<html>
<head>
<title>ERM 2</title>
<link rel="stylesheet" type="text/css" href="style.css">
<link rel="stylesheet" type="text/css" href="form_style.css">
<style>
.full_button{
  margin-top: 10%;
  margin-left: 40%;
}
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

</div>
</div>
<div class="full_button">
  <button type="button" class="btn btn-primary btn-lg" onclick="new_student()" style="Background-color:#1377A9;">Student Sign Up</button><br>
  <button type="button" class="btn btn-primary btn-lg" onclick="new_faculty()" style="margin-top: 20px;Background-color:#1377A9;">Faculty Sign Up</button>
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
function new_student(){
  location.replace("new_student.php")
}
function new_faculty(){
  location.replace("new_faculty.php")
}
</script>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>
</html>