<!DOCTYPE html>
<html lang="en">
<head>
  <title>Main</title>
  <meta charset="utf-8"> 
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <style>
  .fakeimg {
    height: 200px;
    background: #aaa;
  }
  </style>
</head>
<body>

<div class="jumbotron text-center" style="margin-bottom:0;Background-color:#1377A9;Color:white;" >
  <h1>E.R.M<h1>
  <!-- <p>Education Resource Management</p>  -->
</div>

<nav class="navbar navbar-expand-sm bg-light navbar-light" style ="color:rgb(90, 98, 102);">
  <a class="navbar-brand" href="#">Forum</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="collapsibleNavbar">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="index.php">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="login.php">New Article</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Settings</a>
      </li>    
    </ul>
  </div>  
</nav>

<div class="container" style="margin-top:30px">
  <div class="row">
    <div class="col-sm-4">
      
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <p>Enter the tag you want to search</p>
      <h3>Categories</h3>
      
      <ul class="nav nav-pills flex-column">
            <li class="nav-item">
                    <a class="nav-link" href="#">General</a>
                  </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Most Recent</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Hot Topics</a>
        </li>
        <li class="nav-item">
                <a class="nav-link" href="#">Events</a>
              </li>
        
      </ul>
      <hr class="d-sm-none">
    </div>
    <div class="col-sm-8">
      <h2><a href="#">Post Title 1 </a> </h2>
      <h5>description, Oct 7, 2018</h5>
     <p>jkdsfjksdahfjgsajgjagjasjk</p>
      <button type="button" class="btn btn-outline-primary">Reply</button>
      <br>
      <br>
      <h2><a href="#">Post Title 2 </a></h2>
      <h5>description, Sep 2, 2018</h5>
      <p>gdshjfgjkdshfjkshdjhsdlkfhjl</p>
      <button type="button" class="btn btn-outline-primary">Reply</button>
      
    </div>
  </div>
</div>

<div class="jumbotron text-center" style="margin-bottom:0">
  <p>Footer</p>
</div>

</body>
</html>