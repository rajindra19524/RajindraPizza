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

if(isset($_POST['delete'])){

    $id_to_delete = mysqli_real_escape_string( $conn, $_POST['id_to_delete'] );

    $sql = "DELETE FROM pizzas WHERE id = $id_to_delete";

    if(mysqli_query($conn,$sql)){
        header('Location:index.php');
    }
    else{
        echo 'query error: '.mysqli_error($conn);
    }

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

        <!--delete form-->
        <form action="details.php" method="post">
            <input type="hidden" name="id_to_delete" value="<?php echo $pizza['id'] ?>">
            <input type="submit" name="delete" value="Delete" class="btn brand">
        </form>




    <?php else: ?>
        <h5>No such pizza exists!</h5>
   <?php endif; ?>     
</div>

<?php include('./templates/footer.php')?>

</html>