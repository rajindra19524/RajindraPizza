<?php

    //connect to database
    $conn = mysqli_connect('localhost','shaun','test1234','rajindra_pizza');

    //check connection
   if(!$conn){
        echo 'connection error '.mysqli_connect_error();
    }




?>




<!DOCTYPE html>
<html lang="en">
    <?php include('./templates/header.php')?>
   
    <?php include('./templates/footer.php')?>
    
</body>
</html>