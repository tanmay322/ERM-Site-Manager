<?php
$mysqli = mysqli_connect('localhost', 'root', 'mysql', 'Forum');
$resultSET = $mysqli->query("SELECT * FROM Course");
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
 $tmpName = $_FILES['Attachment']['tmp_name'];
 $fp = fopen($tmpName, 'r');
 $content = fread($fp, filesize($tmpName));
 $content = addslashes($content);
 fclose($fp);
 $query = "INSERT INTO Material (Title, Description, CourseID, Attachment) VALUES('$_POST[Title]', '$_POST[Content]', '$_POST[CourseName]', '$content' )";
 $qry = mysqli_query($mysqli, $query);
 if(!$qry)
 {
     //something went wrong, display the error
     echo 'Error' . mysqli_error($mysqli);
 }
 else
 {
     echo 'Your material has been UPLOADED !!!';
 }
}
?>
<?php
      include 'Navbar_faculty.php';
        $sql= "SELECT Name, Description FROM Department";
        
        $result = mysqli_query($mysqli,$sql);?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <link rel="stylesheet" href="style.css">
    <title>Files Upload and Download</title>
  </head>
  <body>
    <div class="container">
      <div class="row">
        <form action="material_faculty.php" method="post" enctype="multipart/form-data" >
		<div class="form-row">
        <div class="form-group col-md-6">
          <h3>Upload File</h3>
          <input type="file"  class="form-control" name="Attachment"> <br>
          Title<input type="text"  class="form-control" name="Title"> <br>
          Content<input type="text"  class="form-control" name="Content"> <br>
          Course Name<select name="CourseName"> <br>
            <?php
             while($rows = $resultSET->fetch_assoc()){
             $name = $rows['Name'];
             echo "<option value='$name'>$name</option>";
             }
             ?>
             
           
           </select>
          <input type="submit"  class="form-control" name="save">
        </form>
      </div>
    </div>
  </body>
</html>
​
