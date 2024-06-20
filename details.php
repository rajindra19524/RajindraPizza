<?php 

//import db connection file
include('./config/db_connect.php');

//check get request paramater
if(isset($_GET['id'])){
    $id = mysqli_real_escape_string( $conn, $_GET['id'] ) ;

    //make sql to select the record
    $sql = "SELECT * FROM pizzas WHERE id = $id";

    //get the query result
    $result = mysqli_query($conn,$sql);

    //fetch result in array format
    $pizza = mysqli_fetch_assoc($result);

    //free result from memory
    mysqli_free_result($result);

    //close the connection
    mysqli_close($conn);




}



?>



<!DOCTYPE html>
<html lang="en">

<?php include('./templates/header.php')?>


<div class="center container">
    <?php if($pizza): ?>
        <h4><?php echo $pizza['title']; ?></h4>
        <p>created by: <?php echo $pizza['email']; ?><p>
        <p><?php echo date($pizza['created_at']); ?></p>    
        <h5>ingredients:</h5>
        <p><?php echo $pizza['ingrediants']  ?></p>
    <?php else: ?>
        <h5>No such pizza exists!</h5>
   <?php endif; ?>     
</div>

<?php include('./templates/footer.php')?>

</html>