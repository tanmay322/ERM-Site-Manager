<?php
//connect.php
$server = 'sql103.epizy.com';
$username   = 'epiz_24912078';
$password   = 'QGf0wJWZUb';
$database   = 'epiz_24912078_Forum';
 
$conn = mysqli_connect($server, $username, $password,$database);


if(!($conn))
{
    exit('Error: could not establish database connection');
}
if(!mysqli_select_db($conn,$database))
{
    exit('Error: could not connect to database ');
}


?>