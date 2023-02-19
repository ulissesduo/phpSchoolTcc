<?php
include 'config.php';
session_start();

if(!isset($_SESSION['admin_name'])){
    header('Location: login_form.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADM area</title>
</head>
<body>
    <h1>Bem-vindo Adm: <?php echo $_SESSION['admin_name']; ?></h1>
    <a href="logout.php">log out</a>
    <a href="tcc/index.php">Meus alunos</a>
    <a href="sendfiles2/display.php">Displayphp</a>
</body>
</html>