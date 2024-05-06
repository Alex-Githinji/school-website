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
