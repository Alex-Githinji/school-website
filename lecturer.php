<?php

@include 'config.php';

$error = array();

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST['submit'])) {
  $files = mysqli_real_escape_string($conn, $_POST['files']);
   // Replace with the user ID of the current user

  // Check if the file already exists for the current user
  $select = "SELECT * FROM file WHERE files = '$files' ";
  
  if ($result = mysqli_query($conn, $select)) {
    if (mysqli_num_rows($result) > 0) {
      echo ('File already exists');
    } else {
      // Insert the file into the database for the current user
      $insert = "INSERT INTO file (files,) VALUE ('$files', '')";
      
      if (mysqli_query($conn, $insert)) {
        echo ("File uploaded successfully");
        exit();
      } else {
        $error[] = 'Failed to insert file';
      }
    }
  } else {
    $error[] = 'Failed to execute query';
  }
}

$conn->close();
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="home.css">
</head>
<body>
    <img src="photo 2.jpg" alt="none" height="100%" width="100%">
     
    <div class="form1">
      <form action="" method="post" >
      <h1> Lectures to upload Videos Here</h1>
      
        <input type="file" class="btn" name ="files" required>
        <input type ='submit' name="submit" value = "upload" style=" width: 300x; height: 40px; background: hsl(128, 100%, 50%); border: 2px solid hsl(263, 91%, 30%); margin-top: 13px; color: hsl(32, 92%, 50%); font-size: 15px; border-bottom-right-radius: 5px;border-bottom-right-radius: 5px; transition: 0.2s ease;cursor: pointer;">

        </form>
    </div>
        
    
</body>
</html>
