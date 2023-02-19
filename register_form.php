<?php
include 'config.php';

if(isset($_POST['test'])){
    //nome da variavel =================tag name do forms
    $name = $_POST['name'];
    $email = mysqli_escape_string($connection, $_POST['email']);
    $password = mysqli_escape_string($connection, $_POST['password']);
    $user_type = mysqli_escape_string($connection, $_POST['user_type']);

    $select = "SELECT * FROM `user_form` WHERE email='$email' AND password='$password'";
    $result = mysqli_query($connection, $select);
    if(mysqli_num_rows($result) > 0){
        $error[] = "user already exist";
    }
    else{
        $insert = "INSERT INTO `user_form`(name, email, password, user_type) VALUES ('$name','$email','$password','$user_type')";
        
        mysqli_query($connection, $insert);
        header('Location: login_form.php');
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
        <!-- login mas é name no banco de dados -->
        <label>Login: </label>
        <input type="text"  name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter your name">
    </div>

<!-- 
    <div class="form-group">
        <label>Login: </label>
        <input type="text"  name="login" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter your login">
    </div> -->

    <div class="form-group">
    <label>Password: </label>
        <input type="password" name="password" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter your Password">
    </div>
    
    <div class="form-group">
        <label>Email: </label>
        <input type="email"  name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter your Email">
    </div>

    <label>User type: </label>
    <select class="form-control form-control-lg" name="user_type">
        <option value="user">user</option>
        <option value="admin">admin</option>    
    </select>

  <button type="submit" name="test" class="btn btn-primary">Submit</button>
  <a class="btn btn-secondary" href="http://localhost/crudphp/login_form.php">Voltar</a>
</form>
</body>
</html>