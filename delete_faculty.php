<?php
include 'connect.php';
session_start();
include 'Navbar_Admin.php';


?>

       
    <?php
         
         
        
        $sql= "SELECT * FROM Faculty";
        
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
                    
                        echo'
                        <table class="table" width="100%">
                        <thead class="thead-dark">
                            <tr>
                            <th scope="col">Faculty ID</th>
                            <th scope="col">Name </th>
    
                            <th scope="col">Handle</th>
                            </tr>
                        </thead>
                        
                        <tr>
                        <td scope="col" >'.$row["EmpId"].'</th>
                        <td scope="col" >'.$row["FirstName"].'</th>
                        
                        <td scope="col"><a href="FacultyDeletedQuery.php?id='.$row["EmpId"].'" class="btn btn-primary">Delete</a></th>
                        </tr>
                    
                    <tbody>
                    </table>
                    </div>
                    ';
                    
    
                }
             }
        }
    ?>
    
  </div>
</body>
</html>