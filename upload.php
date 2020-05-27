<?php
include 'Navbar.php';
 include 'connect.php';
 $resultSET = $conn->query("SELECT * FROM Course");
 if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['Attachment']))
 {
  $tmpName = $_FILES['Attachment']['tmp_name'];
  $fileName = $_FILES['Attachment']['name'];
  $fileSize = $_FILES['Attachment']['size'];
  $fileType = $_FILES['Attachment']['type'];
  $fp = fopen($tmpName, 'r');
  $content = fread($fp, filesize($tmpName));
  $content = addslashes($content);
  fclose($fp);
  $query = "INSERT INTO Material (Title, Content, CourseName, Attachment,  AttachmentName, AttachmentSize, AttachmentType) VALUES('$_POST[Title]', '$_POST[Content]', '$_POST[CourseName]', '$content', '$fileName', '$fileSize', '$fileType' )";
  $qry = mysqli_query($conn, $query);
  if(!$qry)
  {
      //something went wrong, display the error
      echo 'Error' . mysqli_error($conn);
  }
  else
  {
      echo '1 row added';
  }
 }
?>
</form>
<!DOCTYPE html>
<html lang="en">
  <head>
    <link rel="stylesheet" href="style.css">
    <title>Files Upload and Download</title>
  </head>
  <body>
    <div class="container">
      <div class="row">
        <form action="" method="post" enctype="multipart/form-data" >
          <h3>Upload File</h3>
          <input type="file" name="Attachment"> <br>
          Title<input type="text" name="Title"> <br>
          Content<input type="text" name="Content"> <br>
          Course Name<select name="CourseName"> <br>
            <?php
             while($rows = $resultSET->fetch_assoc()){
             $name = $rows['Name'];
             echo "<option value='$name'>$name</option>";
             }
            ?>
           </select>
          <input type="submit" name="save">
        </form>
      </div>
    </div>
  </body>
</html>