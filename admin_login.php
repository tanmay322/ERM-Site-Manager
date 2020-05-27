

  <?php
//Include GP config file && User class
include_once 'gpConfig1.php';
include_once 'User.php';
// include('server.php');
include 'connect.php';
?>
​
 <?php
      include 'Navbar_Admin.php';
        echo 'Welcome to Admin Page'
    ?>
<script>
function home(){
            location.replace("index.php")
          }
</script>
​
<!-- changes made here -->
<script src="https://apis.google.com/js/client:platform.js?onload=renderButton" async defer></script> 
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
​
</body>
</html>