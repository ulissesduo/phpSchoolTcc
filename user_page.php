<?php
include 'config.php';
session_start();

if(!isset($_SESSION['user_name'])){
    header('Location: login_form.php');
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>user</title>
</head>
<body>
    <h1>Bem-vindo user: <?php echo $_SESSION['user_name']; ?></h1>
    <a href="logout.php">log out</a>
    <a href="tcc/sendfiles2/index.php">add pdf</a>
    
</body>
</html>