
<?php

include 'config.php';

if(isset($_POST['submit'])) {
    $RegistrationNumber = mysqli_real_escape_string($conn, $_POST['RegistrationNumber']);
    $pass = mysqli_real_escape_string($conn, $_POST['EnterPassword']);
    $cpass = mysqli_real_escape_string($conn, $_POST['confirmPassword']);

    $select = "SELECT * FROM `sign_up` WHERE RegistrationNumber = '$RegistrationNumber' AND EnterPassword ='$pass'";

    $result = mysqli_query($conn, $select);

    if(mysqli_num_rows($result) > 0) {
        $error[] = 'User already exists!';
    } else {
        if($pass != $cpass) {
            $error[] = 'Passwords do not match!';
        } else {
            $insert = "INSERT INTO `sign_up`(RegistrationNumber, EnterPassword, ConfirmPassword) VALUES('$RegistrationNumber','$pass','$cpass')";
            mysqli_query($conn, $insert);
            echo 'Signup successful';
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
    <link rel="stylesheet" href="sign up.css">
</head>
<body>
    <img src="photo 2.jpg" alt="none" height="100%" width="100%">

    <div class="form">
        <form action="" method="post">
           
            <h2>Register Here</h2>
            <?php
            if (isset($error)){
                foreach($error as $error){
                    echo 'error';
                };
            };
            ?>
            <input type="Registration number" name="RegistrationNumber" placeholder="Username" required><br><br>
            <input type="password" name="EnterPassword" placeholder="Enter password" required><br><br>
            <input type="password" name="confirmPassword" placeholder="confirm password" required><br><br>
            <input type = 'submit' name="submit" value="Create account" style=" width: 300x; height: 40px; background: hsl(128, 100%, 50%); border: 2px solid hsl(263, 91%, 30%); margin-top: 13px; color: hsl(32, 92%, 50%); font-size: 15px; border-bottom-right-radius: 5px;border-bottom-right-radius: 5px; transition: 0.2s ease;cursor: pointer;">
        </form>    


    </div>
</body>
</html>