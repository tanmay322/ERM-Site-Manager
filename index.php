<?php
//Include GP config file && User class
include_once 'gpConfig.php';
include_once 'User.php';
?>
<!DOCTYPE html>
<!DOCTYPE html>
<html>
<head>
<title>ERM 2</title>
<link rel="stylesheet" type="text/css" href="style.css">
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

<button id="topbutton" onclick="admin()">Admin</button>
<button id="topbutton" onclick="new_user()">New User</button>

</div>
</div>
<div>
<div class="slideshow">

<div class="image"><img  src="images/projectimage1.png" width="100%" ></div>
<div class="image"><img  src="images/projectimage2.png" width="100%" ></div>
<div class="image"><img  src="images/projectimage3.png" width="100%" style="max-height:450px"></div>
<div class="image"><img  src="images/projectimage4.png" width="100%" style="max-height:450px" ></div>
<button class="swipe_left" onclick="plusSlides(-1)">&#10094;</button>
<button class="swipe_right" onclick="plusSlides(1)">&#10095;</button>
</div>

<div id="bg_right">

<h2 id="heading2"> Welcome to this one stop for all your scholastic needs:-</h2><br>
<p id="info">Login with your institute ID and password to access your account:</p><br>
<button id="mainbutton" onclick="student()">Student</button><br>
<button id="mainbutton" onclick="faculty()">Faculty</button>

<script>
var slideIndex = 1;
showSlides(slideIndex);

function plusSlides(n){
  showSlides(slideIndex += n);
}
function currentSlide(n){
  showSlides(slideIndex = n);
}
function showSlides(n){
  var i;
  var slides=document.getElementsByClassName("image");
  if(n>slides.length){slideIndex = 1}
  if(n<1){slideIndex = slides.length}
  for(i=0;i<slides.length;i++){
    slides[i].style.display="none"
  }
  slides[slideIndex-1].style.display="block";

}

function student(){
  location.replace("student.php")
}
function faculty(){
  location.replace("faculty.php")
}
function admin(){
location.replace("admin.php")
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
</html>