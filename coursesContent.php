<?php
//Include GP config file && User class
include_once 'gpConfig.php';
include_once 'User.php';
// include('server.php');
include 'connect.php';
?>
<?php
      include 'Navbar.php';
      $Course_id=$_GET['id'];
      echo'<div class="row">
      ';
        $sql= "SELECT * FROM Course where CourseID='$Course_id'";
        
        $result = mysqli_query($conn,$sql);
         
         if(!$result)
         {
             //the query failed, uh-oh :-(
             echo 'Error while selecting from database. Please try again later.';
         }
        else
        {
            if(mysqli_num_rows($result) == 0)
             {
               echo 'no rows';
             }
             else{
                while($row = mysqli_fetch_assoc($result))
                {   
                    echo ' 
                        <div class="a" style="text-align: center;">
                        <h1>'.$row["Name"].'</h1>
                        <p>'.$row["Description"].'</p>
                        </div>
                  <br>
                  </div>';
                    
                }
             }
        }
        echo'</div>';
    ?>
<?php
if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['MaterialID']))
 {
  $Mat = $_POST['MaterialID'];
  $qer = "SELECT AttachmentName, AttachmentType, AttachmentSize, Attachment 
   FROM Material 
   WHERE MaterialID='$Mat'";
  $Res = mysqli_query($conn, $qer);
  $rowRes = mysqli_fetch_row($Res);
  echo $rowRes[0], $rowRes[1], $rowRes[2];
  header("Content-length:$rowRes[2]");
  header("Content-type:$rowRes[1]");
  header("Content-Disposition:attachment; filename=$rowRes[0]");
  // echo $rowRes[3];
  }
  // $query="SELECT Name FROM Course where CourseID='$Course_id'";
  // $result2 = mysqli_query($conn,$query);
 $query1 = "SELECT AttachmentName, MaterialID FROM Material where CourseName =(SELECT Name FROM Course where CourseID='$Course_id')";
 $result = mysqli_query($conn,$query1);
 if(!$result || mysqli_num_rows($result) < 1)
 {
  echo "Database is empty <br>";
 }
 else
 {
?>
<?php
  while(list($AttachmentName, $MaterialID) = mysqli_fetch_array($result))
  {
?>

 
<form action="" method="post">
   <input type="hidden" style="color:blue;padding:15px;float:center;top-margin:50px" id="<?php echo $MaterialID?>" name="MaterialID" value="<?php echo $MaterialID?>" />
  <input type="submit" style="color:blue;padding:15px;float:center;top-margin:50px" value=<?php echo $AttachmentName?> />
 </form>
<?php
  }
?>
<?php
 }
?>