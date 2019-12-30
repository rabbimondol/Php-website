<?php
include ('config/db-connect.php');
$conn = mysqli_connect('localhost','root','rabberabbe','sweet_meal');
if(!$conn){
    echo 'connection error ' . mysqli_connect_error();
}
$sql = 'SELECT id,name,quantity FROM sweet_meals';
$results = mysqli_query($conn,$sql);
$pizza = mysqli_fetch_all($results,MYSQLI_ASSOC);
mysqli_free_result($results);
mysqli_close($conn);



?>
<!DOCTYPE html>
<html lang="">
<?php include('resource/header.php') ?>
<h4 class="center grey-text">Pizza</h4>
    <div class="containar">

        <div class="row">
            <?php foreach($pizza as $pizza){ ?>
                <div class="col s6 md3">
                    <div class="card z-depth-0">
                    <div class="card-content">
                        <h6><?php echo htmlspecialchars($pizza['name']); ?>
                        </h6>
                        <ul>
                        <?php foreach(explode(',',$pizza['quantity'])as $ing){ ?>
                            <li><?php echo htmlspecialchars($ing) ?></li>
                            <?php }?>
                            </ul>
                        </div>
                        <div class="card-action right-align">
                            <a class="brand-text" href="detalis.php?id=<?php echo $pizza['id'] ?>">more info</a>
                        </div>
                        
                    </div>
            
            </div>
            <?php }?>
        </div>
    </div>
    
<?php include('resource/footer.php') ?>





</html>