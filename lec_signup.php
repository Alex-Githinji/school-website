
<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);


include 'config.php';

$error = array();

if(isset($_POST['submit'])) {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $phoneNumber = mysqli_real_escape_string($conn, $_POST['phoneNumber']);
    $password = mysqli_real_escape_string($conn, $_POST['EnterPassword']);
    $confirmPassword = mysqli_real_escape_string($conn, $_POST['confirmPassword']);

    if($password != $confirmPassword) {
        $error[] = 'Passwords do not match!';
    } else {
        $select = "SELECT * FROM `lec_signup' WHERE username = '$username'";
        $result = mysqli_query($conn, $select);

        if(mysqli_num_rows($result) > 0) {
            $error[] = 'Username already exists!';
        } else {
            $insert = "INSERT INTO `lec_signup` (username, phoneNumber, EnterPassword, ConfirmPassword) VALUES ('$username','$phoneNumber','$password','$confirmPassword')";
            if(mysqli_query($conn, $insert)) {
                echo 'Signup successful';
            } else {
                $error[] = 'Signup failed. Please try again.';
            }
        }
    }
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="lecturerlogin.css">
</head>
<body>
    <h1>sign up here</h1>
    <form action="" method="post">
    <input type="text" id="username" name="username" placeholder="Username" required><br><br>
    <input type="number" id="phoneNumber" name="phoneNumber" placeholder="phone number" required><br><br>
    <input type="password" id="password" name="password" placeholder="Enter Password" required><br><br>
    <input type="password" id="confirmPassword" name="confirmmPassword" placeholder="confirm Password" required><br><br>
    <input type="submit" name="search" value="create account" >
    
    
</body>
</html>