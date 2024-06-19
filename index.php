<?php

    //connect to database
    $conn = mysqli_connect('localhost','root','','rajindra_pizza');

    //check connection
   if(!$conn){
        echo 'connection error '.mysqli_connect_error();
    }
    
   //write query for all pizzas
   $sql = "SELECT id,title,ingrediants FROM pizzas";

   //make query and get result
   $result = mysqli_query($conn,$sql);

   //fetch the resulting rows as an array
   $pizzas = mysqli_fetch_all($result,MYSQLI_ASSOC);

   //free result from memory
   mysqli_free_result($result);

   //close the connection
   mysqli_close($conn);

   print_r($pizzas);




?>




<!DOCTYPE html>
<html lang="en">
    <?php include('./templates/header.php')?>
   
    <?php include('./templates/footer.php')?>
    
</body>
</html>