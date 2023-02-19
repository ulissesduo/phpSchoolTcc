<?php
include 'config.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>send pdf</title>
</head>
<body>
    <form action="upload.php" method="post" enctype="multipart/form-data">
        <!-- <div class="form-group">
            <label>Name:</label>
            <input type="text" name="name">
        </div> -->
        <div class="form-group">
            <label>Select a file to upload:</label>
            <input type="file" name="photo">
            <input type="submit" name="submit" value="upload">
        </div>
    
    </form>
</body>
</html>