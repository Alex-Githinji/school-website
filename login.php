<?php

include 'config.php';

if(isset($_POST['submit'])) {
    $RegistrationNumber = mysqli_real_escape_string($conn, $_POST['RegistrationNumber']);
    $pass = mysqli_real_escape_string($conn, $_POST['EnterPassword']);

    $select = "SELECT * FROM `sign_up` WHERE RegistrationNumber = '$RegistrationNumber' AND EnterPassword ='$pass'";

    $result = mysqli_query($conn, $select);

    if(mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_array($result);
        session_start();
        $_SESSION['RegistrationNumber'] = $row['RegistrationNumber'];
        header('location: home.php');
    } else {
        $error[] = 'Incorrect Registration Number or Password';
    }
}

?>


<?php
// Assuming you have a MySQL database named 'lec_signup'
$servername = "localhost";
$username = "your_username";
$password = "your_password";
$dbname = "database";

// Create a connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle the form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $phoneNumber = $_POST["phoneNumber"];
    $password = $_POST["password"];
    
    // Insert the form data into the database
    $sql = "INSERT INTO users (username, phone_number, password) VALUES ('$username', '$phoneNumber', '$password')";

    if ($conn->query($sql) === TRUE) {
        echo "Account created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close the connection
$conn->close();
?>


