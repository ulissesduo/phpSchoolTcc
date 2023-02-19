<?php

include 'config.php';
session_start();

if(!isset($_SESSION['user_name'])){
    header('Location: login_form.php');
}

//funcionou. O insert ta inserindo nome da pessoa logada e fazendo o insert do pdf com o nome dela.
if(isset($_POST['submit'])){
    // $name = $_POST['name']; 
    $file = $_FILES['photo'];
    $name = $_SESSION['user_name'];//testando se da pra conectar esse dado em 2 tabelas diferentes


    // print_r($file);
    $filename = $file['name'];
    $filepath = $file['tmp_name'];
    $fileerro = $file['error'];    

    if($fileerro == 0){
        if(!$filename){
            echo 'nao tem nada de arquivo';
        }
        else{
                    $destfile = 'upload/' .$filename; //print: "upload/IMG-63c4....."   esse é o '$filename' do arquivo
                    echo $destfile;
            
                    move_uploaded_file($filepath, $destfile); //esse metodo precisa de dois argumentos. Path e Destino do arquivo. 
            
                    // insert 
                    // $insert = "INSERT INTO `registrationtb` ('name','pdfs') VALUES ('$name','$destfile')"; esse código ta errado pq nao tem aspas na indicação das colunas da tabela.
                    $insert = "INSERT INTO `registrationtb`(name, pdfs, new_date) VALUES ('$name','$destfile',NOW())";
                    $query = mysqli_query($connection, $insert);
                    if($query){
                        echo 'inserted successfully';
                        echo ' status: ' .$file['photo'];
                        echo ' filename: ' .$filename;
                        echo ' path: ' .$filepath;
                        echo ' erro: ' .$fileerro;
                        echo ' destfile: ' .$destfile;
                    }
                    else{
                        echo 'denied';
                    }
                }
            }
            else{
                echo "No button clicked";
            }
        }



?>