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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    <h1>teste</h1>
    <form action="">
    <table class="table">
        <thead>
            <tr>
            <!-- <th scope="col">ID</th> -->
            <th scope="col">Name</th>
            <th scope="col">Pagamento</th>
            <th scope="col">Data e Hora</th>
            </tr>
        </thead>
        <tbody>
        <?php 
            include 'config.php';
            $sql = "SELECT * FROM registrationtb ORDER BY Id ";
            $sql1 = "SELECT * FROM registrationtb WHERE pdfs='sem arquivo'";
            $sql2 = "SELECT user_db.user_form.*,user_db.registrationtb.* FROM crudphp.testes inner join registration.registrationtb ON crudphp.testes.Id =registration.registrationtb.Id";
            $sql3 = "SELECT user_db.user_form.*,user_db.registrationtb.* FROM user_db.user_form inner join user_db.registrationtb ON user_db.user_form.id =user_db.registrationtb.Id";
            $sql4 = "SELECT user_form.name, registrationtb.pdfs, registrationtb.new_date FROM `registrationtb`, `user_form` WHERE registrationtb.name=user_form.name";
            
            $query = mysqli_query($connection, $sql4);    
            while($row = mysqli_fetch_array($query)){
                //$row['name'] = $_SESSION['user_name'];//testando se da pra conectar esse dado em 2 tabelas diferentes
                ?>
                <!-- para funcionar preciso: 
                criar loop while para percorrer o banco, salvar essa pesquisa na tag row, e criar a tag <a></a> com href para a pasta q ta o pdf.
            -->                
                <tr>
                <!-- <th scope="row"><?= $row['Id']?></th> -->
                <td><?= $row['name']?></td>
                <?php
                if($row['pdfs'] != 'sem arquivo'){
                    ?>
                    <td><a href="<?=$row['pdfs']?>">Download</a></td>
                    <td><?= $row['new_date'];
                    
                }
                else{
                    ?>
                    <td>Não pagou</td>
                    <td><?= $row['new_date'];
                }
                    ?>
                </td>
                </tr>
                <!-- <p><?= $row['name']?><a href="<?=$row['pdfs']?>">Download</a></p> -->
            <?php
            }
            ?>
        </tbody>
        </table>
    </form>
</body>
</html>