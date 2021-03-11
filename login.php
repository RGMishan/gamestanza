<?php include "includes/header.php"; ?>

<div class="container">
    <a href="index.php"><img src="images/logo.png" alt="Gamestanza" width="200px" style="margin-left: 20px;"></a>

    <hr>

    <div class="navbar">
        <ul>
            <li><a href="index.php"><i class="fas fa-home"></i> Home</a></li>
            <li><a href=""><i class="fas fa-clipboard"></i> About</a></li>
            <li><a href="register.php"><i class="fas fa-user-plus"></i> Register</a></li>
            <li><a href=""><i class="fas fa-phone-alt"></i> Contact Us</a></li>

            <li class="right active"><a class="rightLink" href="login.php"><i class="fas fa-sign-in-alt"></i> Login</a></li>
        </ul>
    </div>

    <div class="banner">

    </div>


    <div class="gridLogin">
        <div class="header header1">
            <h2>LOG INTO YOUR ACCOUNT</h2>
            <hr class="style1">
        </div>
        <div class="header header2">
            <h2>ADVERTISEMENT</h2>
            <hr class="style1">
        </div>
        <div class="columns form">
            <form action="" method="post">
                <div>
                    <label for="username">Username</label>
                    <input type="text" name="username">
                </div>
                <br>
                <div>
                    <label for="password">Password</label>
                    <input type="password" minlength="8" name="password">
                </div>


                <?php

                if (isset($_POST['submit'])) {
                    $login_username = $_POST['username'];
                    $login_password = $_POST['password'];

                    $username = mysqli_real_escape_string($connection, $login_username);
                    $password = mysqli_real_escape_string($connection, $login_password);

                    $query = "SELECT * FROM login WHERE username = '{$login_username}'";
                    $result = mysqli_query($connection, $query);

                    confirm($result);

                    if ((mysqli_num_rows($result)) === 0) {
                        echo "<div style='color:red;'>Incorrect username or password</div><br>";
                    } else {

                        while ($row = mysqli_fetch_assoc($result)) {
                            $password = $row['password'];
                            $role = $row['role'];

                            if ($role === 'admin') {
                                if ($password === $login_password) {
                                    $_SESSION['username'] = $login_username;
                                    $_SESSION['role'] = $role;
                                    header("Location: admin.php");
                                } else {
                                    echo "<div style='color:red;'>Incorrect username or password</div><br>";
                                }
                            } else if ($role === 'customer' || $role === 'seller') {
                                //password decrypting
                                $plain = password_decrypt($password);
                                if ($plain === $login_password) {
                                    $_SESSION['username'] = $login_username;
                                    $_SESSION['role'] = $role;
                                    if ($role === 'customer') {
                                        header("Location: customer.php");
                                    } else {
                                        header("Location: seller.php");
                                    }
                                } else {
                                    echo "<div style='color:red;'>Incorrect username or password</div><br>";
                                }
                            }
                        }
                    }
                }

                ?>
                <br>
                <a href="register.php" style="text-decoration: none; color: #004eff;">Don't have a account? Sign Up!</a>
                <br>
                <br>
                <a href="register.php" style="text-decoration: none; color: #004eff;">Forgot Password?</a>

                <br>
                <br>

                <input class="button" type="submit" name="submit">

                <input class="button" type="reset" name="reset">
            </form>
        </div>

        <aside class="columns ad"><a href="#"><img src="images/gad1.jpg" alt="Advertisement"></a></aside>

        <?php include "includes/footer.php"; ?>
