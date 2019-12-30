<?php 
session_start();
if($_SERVER['QUERY_STRING'] == 'noname'){
    unset($_SESSION['name']);
}

$name = $_SESSION['name'] ?? 'Guest';
$gender = $_COOKIE['gender'] ?? 'unknown';


?>







<head>
    <title>Learn php</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <style>
        .brand
        {
            background: #cbb09c;
        }
        
        .brand-text
        {
            color: #cbb09c;
            font-size: 40px;
            font-weight: 300;
            margin-left: 43%;
        }
        form
        {
            max-width: 460px;
            margin: 20px auto;
            padding: 20px;
            
            
        }
    </style>
</head>

<body bgcolor="#ccc">
    <nav class="white z-depth-0">
        <div class="contenar">
<!--            <a href="#" class="brand-logo brand-text">SUCCESS</a>-->
                <a href="index.php" class=" center brand-text">success</a>
            <ul id="nav-mobile" class="right hide-on-small-and-dwon">
                <li style="color:#a2a2a2">HELLO <?php echo htmlspecialchars($name); ?>&emsp;</li>
                <li style="color:#a2a2a2">  (<?php echo htmlspecialchars($gender); ?>)</li>
                <li><a href="add.php" class="btn brand z-depth-0">Add a pizza</a></li>
            </ul>
        </div>

    </nav>