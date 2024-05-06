<?php 
    include 'config.php';
    session_start();
    $error = '';

    if(isset($_POST['search'])){
        $RegistrationNumber = mysqli_real_escape_string($conn, $_POST['RegistrationNumber']);
        $pass = mysqli_real_escape_string($conn, md5($_POST['EnterPassword']));

        $select ="SELECT * FROM `sign_up` WHERE RegistrationNumber = '$RegistrationNumber' && password ='$pass'";
        $result = mysqli_query($conn, $select);

        if(mysqli_num_rows($result) > 0){
            $row = mysqli_fetch_array($result);
            $_SESSION['RegistrationNumber'] = $row['RegistrationNumber'];
            header('location:home.php');
        }else{
            $error = 'Incorrect Registration Number or password!';
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Webpage Design</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <div class="main">
        <div class="navbar"> 
            <div class="icon">
              <h2 class="logo">MUT<br>WEBSITE</h2>
            </div>

            <div class="menu">
                <ul>
                    <li><a href="">""</a></li>
                    
                </ul>
            </div>

</div> 
        <div class="content">
            <h1>MUT Web Design & <br><span>Development</span> <br>Course</h1>
            <p class="par">MUTWEBSITE offers online classes to students who have enrolled 
                to our system
             <br> For more information contact us on 0792832908/0768350802
                <br> Thank you all</p>

                <button class="cn"><a href="http://127.0.0.1:5500/mut.php">JOIN US</a></button>

                <div class="form 1">
                
                    <h2>Login Here</h2>
                    <form action="" method="get">
                        <input type="text" id="username" name="username" placeholder="Username" required><br><br>
                        <input type="password" id="password" name="password" placeholder="Enter Password" required><br><br>
                        <input type="submit" name="search" value="login" style=" width: 300x; height: 40px; background: hsl(128, 100%, 50%); border: 2px solid hsl(263, 91%, 30%); margin-top: 13px; color: hsl(32, 92%, 50%); font-size: 15px; border-bottom-right-radius: 5px;border-bottom-right-radius: 5px; transition: 0.2s ease;cursor: pointer;" >
                        <!-- Display error message if any -->
                        <?php if($error != 'incorrect details'): ?>
                        <div><?php echo $error; ?></div>
                        <?php endif; ?>

                    <p class="link">Don't have an account<br>
                    <a href="SignUp.php">Sign up </a> here</a></p>
                    <p class="liw">Log in with</p>

                         <div class="icons">
                        <a href="https://www.facebook.com/Murangauni?_rdc=1&amp;_rdr"><ion-icon name="logo-facebook"></ion-icon></a>
                        <a href="https://www.instagram.com/murangauni_official/"><ion-icon name="logo-instagram"></ion-icon></a>
                        <a href="https://twitter.com/MurangaUni"><ion-icon name="logo-twitter"></ion-icon></a>
                        <a href="https://w9hww.google.com/search?q=mut&amp;ei=Nu9pY4DbMLHE8gLus5OoCw&amp;ved=0ahUKEwiAzvfy8p37AhUxolwKHe7ZBLUQ4dUDCA8&amp;oq=mut&amp;gs_lcp=Cgxnd3Mtd2l6LXNlcnAQDEoECE0YAUoECEEYAEoECEYYAFAAWABgAGgAcAF4AIABAIgBAJIBAJgBAA&amp;sclient=gws-wiz-serp#mpd=~4965583199184733736/customers/messages?ep%3Dia2"><ion-icon name="logo-google"></ion-icon></a>
                        <a href="https://www.youtube.com/@MurangaUni1"><ion-icon name="logo-youtube"></ion-icon></a>
                    </div>
                    </form>

                </div>
                    </div>
                </div>
        </div>
    </div>
    <script src="https://unpkg.com/ionicons@5.4.0/dist/ionicons.js"></script>
</body>
<script>
    
  </script>
</html>
