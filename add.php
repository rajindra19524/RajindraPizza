<?php 
    if(isset($_POST['submit'])){
        echo $_POST['email'];
        echo $_POST['title'];
        echo $_POST['ingrediants'];
    }

?>


<!DOCTYPE html>
<html lang="en">
    <?php include('./templates/header.php')?>

    <section class="container grey-text">
        <h4 class="center">Add a Pizza</h4>
        <form action="add.php" method="POST" class="white">
            <label>Email:</label>
            <input type="text" name="email">

            <label>Pizza title:</label>
            <input type="text" name="title">

            <label>Ingrediants (comma seperated)</label>
            <input type="text" name="ingrediants">

            <div class="center">
                <input type="submit" name="submit" value="submit" class="btn brand">
            </div>
        </form>
    </section>
   
    <?php include('./templates/footer.php')?>
    

</html>