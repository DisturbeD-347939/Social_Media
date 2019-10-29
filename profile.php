<?php

if(!isset($_SESSION))
{
    session_start();
}

$user = $_SESSION['user'] ?? null;

if (!$user) {
    include 'log_out.php';
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <img src="id/<?php echo $user["id"]?>/profilePicture.png">
    <h1>This is your profile <?php echo $user["username"] ?></h1>
    <p>Enjoy your homepage!
    <form action="uploadPicture.php" method="POST" enctype="multipart/form-data">
        Select image to upload:
        <input type="file" name="fileToUpload" id="fileToUpload" required>
        <input type="submit" value="Upload Image" name="profilePicture">
    </form>
</body>

</html>