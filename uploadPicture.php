<script>
    function confirmationBox(txt) 
    {
      var decision = false;
      if (confirm(txt)) 
      {
        decision = true;
      }
      else 
      {
        decision = false;
      }
      document.getElementById("demo").innerHTML = txt;
    }
</script>

<?php

session_start();

$user = $_SESSION['user'] ?? null;

$target_dir = 'id/' . $user["id"] . '/';
$target_file = $target_dir . "profilePicture.png";
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

// Check if image file is an actual image
if(isset($_POST["profilePicture"])) 
{
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check != false) 
    {
        $uploadOk = 1;
    }
    else 
    {
        $uploadOk = 0;
    }
}

//Check if the photo already exists - ask the user if they want to replace their old one
if (file_exists($target_file)) 
{
    $txt = "Replace current profile picture?";
    echo "<script> confirmationBox(",$txt,"); </script>";
}

// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) 
{
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}

// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) 
{
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error, if not, upload the file
if ($uploadOk != 0) 
{
    if (!move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) 
    {
        echo "Sorry, there was an error uploading your file.";
    }
    else
    {
        include 'profile.php';
    }
}

?>