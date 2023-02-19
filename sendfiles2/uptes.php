<?php
// tentei fazer input file vazio ... 
include 'config.php';


if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $file = $_FILES['photo'];

    // print_r($file);
    $filename = $file['name'];
    $filepath = $file['tmp_name'];
    $fileerro = $file['error'];    

    if($fileerro == 4){
        $insert = "INSERT INTO `registrationtb`(name, pdfs, new_date) VALUES ('$name','sem arquivo',NOW())";
        $query = mysqli_query($connection, $insert);
        if($query == 1){
            echo 'inserted successfully';
            echo $query;
            echo $fileerro;
        }
    }
    else if($fileerro == 0){
        
        $destfile = 'upload/' .$filename; //print: "upload/IMG-63c4....."   esse é o '$filename' do arquivo
            // echo $destfile;
        
            move_uploaded_file($filepath, $destfile); //esse metodo precisa de dois argumentos. Path e Destino do arquivo. 
            
            // insert 
            // $insert = "INSERT INTO `registrationtb` ('name','pdfs') VALUES ('$name','$destfile')"; esse código ta errado pq nao tem aspas na indicação das colunas da tabela.
            $insert = "INSERT INTO `registrationtb`(name, pdfs, new_date) VALUES ('$name','$destfile',NOW())";
            $query = mysqli_query($connection, $insert);
            if($query == 1){
                echo 'inserted successfully';
                echo $query;
                echo $fileerro;
            }
            else{
                echo 'denied';
            }
        }
    }
    else{
        echo "No button clicked";
    }


?>