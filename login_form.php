<?php
// include 'C:\\config.php';
require_once('C:\xampp\htdocs\tcc\sendfiles2\config.php');
session_start();
// // on login screen, redirect to dashboard if already logged in
if(isset($_SESSION['user_name'])){
    header('location:user_page.php');
}
if(isset($_SESSION['admin_name'])){
    header('location:admin_page.php');
}
// else{
//     header('location: login_form.php');
// }

if(isset($_POST['test'])){
    //nome da variavel =================tag name do forms
    $name = $_POST['name'];
    $email = mysqli_escape_string($connection, $_POST['email']);
    $password = mysqli_escape_string($connection, $_POST['password']);
    $user_type = mysqli_escape_string($connection, $_POST['user_type']);

    $select = "SELECT * FROM `user_form` WHERE name='$name' AND password='$password'";
    $result = mysqli_query($connection, $select);
    if(mysqli_num_rows($result) > 0){
       //new code
        $row = mysqli_fetch_array($result);
        if($row['user_type'] == 'admin'){
            //criar session
            $_SESSION['admin_name'] = $row['name']; //a string da session pode ser qlqr coisa. A string $row['nanan'] é o nome da coluna da tabela que to pegando info.
            header('Location: admin_page.php');
        }
        elseif($row['user_type'] == 'user'){
            //criar session
            $_SESSION['user_name'] = $row['name']; //a string da session pode ser qlqr coisa. A string $row['nanan'] é o nome da coluna da tabela que to pegando info.
            header('Location: user_page.php');
        }
    }
    else{
        $error[] = "Incorrect login or password"; 
    }
    
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

    <title>Login</title>
</head>
<body>

<?php
if(isset($error)){
    foreach($error as $error){
        echo "<span class='error-message'>.$error</span>";
    }
}
?>

<form method="post">
  
    <div class="form-group">
    <label>Name: </label>

        <input type="text" autocomplete="off" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter your name">
    </div>

    <div class="form-group">
    <label>Password: </label>
        <input type="password" name="password" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter your Password">
    </div>
  
  <button type="submit" name="test" class="btn btn-primary">Submit</button>
  <p>Primeiro acesso?<a href="http://localhost/crudphp/register_form.php">Cadastre-se aqui</a> e aproveite!!</p>
</form>
</body>
</html>