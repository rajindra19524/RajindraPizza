<?php 
    $email = $ingrediants = $title = '';
    $errors = array('email'=>'', 'title'=>'', 'ingrediants'=>'');


    if(isset($_POST['submit'])){
      //  echo $_POST['email'];
       // echo $_POST['title'];
       // echo $_POST['ingrediants'];

       //check email
       if(empty($_POST['email'])){
            $errors['email'] = 'an email is required  ';
       }
       else{
            $email = $_POST['email'];
            if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
                $errors['email'] = 'email must be a valid email address.  ';
            }
       }

              //check title
       if(empty($_POST['title'])){
             $errors['title'] = 'title is required  ';
        }
       else{
             $title = $_POST['title'];
             if(!preg_match('/^[a-zA-Z\s]+$/',$title)){
                  $errors['title'] = 'title must be letters and spaces only.   '  ;
             }
           }

             //check ingrediants
       if(empty($_POST['ingrediants'])){
        $errors['ingrediants'] = 'atleast one ingrediant is required  ';
        }
       else{
        $ingrediants = $_POST['ingrediants'];
        if(!preg_match('/^([a-zA-Z\s]+)(,\s*[a-zA-Z\s]*)*$/',$ingrediants)){
             $errors['ingrediants'] = 'ingrediants must be a comma seperated list.   '  ;
        }
        }  
    }

?>


<!DOCTYPE html>
<html lang="en">
    <?php include('./templates/header.php')?>

    <section class="container grey-text">
        <h4 class="center">Add a Pizza</h4>
        <form action="add.php" method="POST" class="white">
            <label>Email:</label>
            <input type="text" name="email" value= <?php echo htmlspecialchars($email)?>>
            <div class="red-text"><?php echo $errors['email'] ?></div>

            <label>Pizza title:</label>
            <input type="text" name="title" value=<?php echo htmlspecialchars($title)?>>
            <div class="red-text"><?php echo $errors['title'] ?></div>

            <label>Ingrediants (comma seperated)</label>
            <input type="text" name="ingrediants" value=<?php echo htmlspecialchars($ingrediants)?>>
            <div class="red-text"><?php echo $errors['ingrediants'] ?></div>

            <div class="center">
                <input type="submit" name="submit" value="submit" class="btn brand">
            </div>
        </form>
    </section>
   
    <?php include('./templates/footer.php')?>
    

</html>