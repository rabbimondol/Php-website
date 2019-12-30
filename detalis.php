<?php 
include ('config/db-connect.php');
if(isset($_POST['delete'])){
    $id_to_delete = mysqli_real_escape_string($conn,$_POST['id_to_delete']);
    $sql = "DELETE FROM sweet_meals WHERE id = $id_to_delete ";
    if(mysqli_query($conn,$sql)){
        //sucess
        header('Location:index.php');
    }{
        echo 'query error :' . mysqli_error($conn);
    }
    
}


if(isset($_GET['id'])){
    $id = mysqli_real_escape_string($conn,$_GET['id']);
    $sql = "SELECT * FROM sweet_meals WHERE id = $id ";
    $result = mysqli_query($conn,$sql);
    $pizza = mysqli_fetch_assoc($result);
    
   
}



?>

<!DOCTYPE html>
<html lang="">
<?php include('resource/header.php') ?>
    <div class="contenar center">
        
        <?php if($pizza): ?>
        <h4><?php echo htmlspecialchars($pizza['name']); ?></h4>
        <p>Created by : <?php echo htmlspecialchars($pizza['email']) ?></p>
        <p><?php echo htmlspecialchars($pizza['time_date']) ?></p>
        <p>Your order :<?php echo htmlspecialchars($pizza['quantity']) ?></p>
        <form action="detalis.php" method="POST">
        <input type="hidden" name="id_to_delete" value="<?php echo $pizza['id']?>">
         <input type="submit" name="delete" value="delete">   
        
      
        </form>
        
        <?php else: ?>
        <h3>We not have problem</h3>
        <?php endif; ?>
    
    </div>
    
<?php include('resource/footer.php') ?>    
</html>
