
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

    
        <h3>New Faculty Sign Up</h3>
    <br>
    <form action="create_faculty.php" method = "POST">
      <div class="form-row">
        <div class="form-group col-md-6">
          <label for="FirstName">First Name</label>
          <input type="fname" class="form-control" id="inputEmail4" placeholder="First Name" name="FirstName" required>
        </div>
        <div class="form-group col-md-6">
          <label for="LastName">Last Name</label>
          <input type="lname" class="form-control" id="inputEmail4" placeholder="Last Name" name="LastName" required>
        </div>
        <div class="form-group col-md-6">
            <label for="EmpId">Employee ID</label>
            <input type="lname" class="form-control" id="inputEmail4" placeholder="#00123456" name="EmpId" required>
          </div>
      </div>
      <div class="form-group">
        <label for="email">Email Address</label>
        <input type="text" class="form-control" id="inputAddress" placeholder="Enter email" name="email" 
        pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$"required>
      </div>
        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="Passwrd">Create Password</label>
            <input type="password" class="form-control" id="inputPassword4" placeholder="Password" name="Passwrd" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters"  required>
          </div>
		</div>
        

        <!-- <div class="form-group">
          <div class="form-check">
            <input class="form-check-input" type="checkbox" id="gridCheck">
            <label class="form-check-label" for="gridCheck">
              Check me out
            </label>
          </div>
        </div> -->
        <button type="submit" class="btn btn-primary">Sign Up</button>
      
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