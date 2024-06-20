<?php

    //connect to database
   // $conn = mysqli_connect('localhost','root','','rajindra_pizza');

    //check connection
  // if(!$conn){
   //     echo 'connection error '.mysqli_connect_error();
   // }

   include('./config/db_connect.php');
    
   //write query for all pizzas
   $sql = "SELECT id,title,ingrediants FROM pizzas ORDER BY created_at";

   //make query and get result
   $result = mysqli_query($conn,$sql);

   //fetch the resulting rows as an array
   $pizzas = mysqli_fetch_all($result,MYSQLI_ASSOC);

   //free result from memory
   mysqli_free_result($result);

   //close the connection
   mysqli_close($conn);

  //print_r(explode(',' , $pizzas[0]['ingrediants']));




?>




<!DOCTYPE html>
<html lang="en">
    <?php include('./templates/header.php')?>

    <h4 class="center grey-text">Pizzas</h4>

    <div class="container">
        <div class="row">
            <?php foreach($pizzas as $pizza): ?>
                <div class="col s6 m3">
                    <div class="card">
                        <div class="card-content center">
                            <h6><?php echo $pizza['title'];?></h6>
                            <ul>
                                <?php foreach(explode("," , $pizza['ingrediants']) as $ing):?>
                                       <li><?php echo $ing ; ?></li>
                                <?php endforeach ?> 
                            </ul>
                        </div>
                        <div class="card-action right-align">
                            <a class="brand-text">more info</a>
                        </div>
                    </div>
                </div>
            <?php endforeach ?>  
            
            <?php if(count($pizzas) >= 2){ ?>
                 <p>there are 2 or more than 2 pizzas</p>
            <?php } else { ?>
                    <p>there are less than 2 pizzas</p>
            <?php }?>    
        </div>
    </div>
   
    <?php include('./templates/footer.php')?>
    
</body>
</html>