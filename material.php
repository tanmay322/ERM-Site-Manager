<?php
 include 'connect.php';
 include 'Navbar.php';
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
 $query1 = "SELECT AttachmentName, MaterialID FROM Material";
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