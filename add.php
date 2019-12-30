<?php
include('config/db-connect.php');
$errors = array('email'=>'','title'=>'','quantity'=>'');
$email = $title = $quantity = '';

if(isset($_POST['submit'])){

    if(empty($_POST['email'])){
        $errors['email']='A email required <br>';
    }
    else{
        $email = $_POST['email'];
        if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
            $errors['email']='plzzz use a valited email <br>';
        }

    }
    if(empty($_POST['title'])){
       $errors['title']= 'A title Required<br>';
    }
    else{

        $title = $_POST['title'];
        if(!preg_match('/^[a-zA-Z\s]+$/',$title)){
           $errors['title']='Input the A-Z';
        }

    }
        

    
    if(empty($_POST['quantity'])){
        $errors['quantity']="A quantity required <br>";
    }
    else{
        $quantity = $_POST['quantity'];
        if(!preg_match('/[0-9]*$/',$quantity)){
           $errors['quantity']= "plzzz input 1 - 10";
        }

    }
    if(array_filter($errors)){
//        echo "This have some error";
    }else{
        $email = mysqli_real_escape_string($conn,$_POST['email']);
        $title = mysqli_real_escape_string($conn,$_POST['title']);
        $quantity = mysqli_real_escape_string($conn,$_POST['quantity']);
        $sql = "INSERT INTO sweet_meals(name,email,quantity) VALUES('$title','$email','$quantity')"; 
        
        if(mysqli_query($conn,$sql)){
            header('Location:index.php');
        }
        else{
            echo 'Error :' . mysqli_error($conn);
        }
    }
}

?>
<!DOCTYPE html>
<html lang="">
<?php include('resource/header.php') ?>

<section class="contenar grey-text">
    <h4 class="center">Add a Pizza</h4>
    <form class="white" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
    <label>Your Email:</label>
        <input type="text" name="email" value="<?php echo htmlspecialchars($email) ?>">
        <div class="red-text"><?php echo $errors['email'] ?></div>
        <label>Food title:</label>
        <input type="text" name="title" value="<?php echo htmlspecialchars
    ($title) ?>">
        <div class="red-text"><?php echo $errors['title'] ?></div>
        <label>Your quantity:</label>
        <input type="text" name="quantity" value="<?php echo htmlspecialchars($quantity) ?>">
        <div class="red-text"><?php echo $errors['quantity'] ?></div>
        <div class="center">
            <input type="submit" name="submit" value="Send it!" class="btn brand z-depth-0">
        </div>
    </form>
    
    
</section>
    
<?php include('resource/footer.php') ?>
    


    

</html>