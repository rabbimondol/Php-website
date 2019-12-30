<?php 
if(isset($_POST['submit'])){
    setcookie('gender',$_POST['gender'],time() + 82454522421);
    session_start();
    $_SESSION['name'] = $_POST['name'];
    echo $_SESSION['name'];
    header('Location: index.php');
}




?>

<!DOCTYPE html>
<html lang="">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
</head>

<body>
    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
        <input type="text" name="name">
        <select name="gender">
            <option value="male">Male</option>
            <option value="female">female</option>
        </select>
        <input type="submit" name="submit" value="submit">




    </form>
</body>

</html>