<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>User Registration</title>
    <link rel="stylesheet" href="auth.css"/>
</head>
<body>
<?php
//Author: Erick Saddam | Linkedn:https://www.linkedin.com/in/erick-saddam-44b71aa1
    require('config.php');
    // When form submitted, insert values into the database.
    if (isset($_REQUEST['username'])) {
        // removes backslashes
        $username = stripslashes($_REQUEST['username']);
        //escapes special characters in a string
        $username = mysqli_real_escape_string($con, $username);
        $token    = stripslashes($_REQUEST['token']);
        $token    = mysqli_real_escape_string($con, $token);
        $password = stripslashes($_REQUEST['password']);
        $password = mysqli_real_escape_string($con, $password);
        $create_datetime = date("Y-m-d H:i:s");
        $query    = "INSERT into `users` (username, password, token, create_datetime)
                     VALUES ('$username', '" . md5($password) . "', '$token', '$create_datetime')";
        $result   = mysqli_query($con, $query);
        if ($result) {
            echo "<div class='form'>
                  <h3>You are registered successfully.</h3><br/>
                  <p class='link'>Click here to <a href='login.php'>Login</a></p>
                  </div>";
        } else {
            echo "<div class='form'>
                  <h3>Required fields are missing.</h3><br/>
                  <p class='link'>Click here to <a href='registration.php'>retry</a> again.</p>
                  </div>";
        }
    } else {
?>
    <form class="form" action="" method="post">
        <h2 class="login-title">User Account Registration</h2>
        <input type="text" class="login-input" name="username" placeholder="Username" required />
        <input type="text" class="login-input" name="token" placeholder="Contact Admin for Token" required>
        <input type="password" class="login-input" name="password" placeholder="Password" required>
        <input type="submit" name="submit" value="Register" class="login-button">
        <p class="link"><a href="login.php">Already have an account? Click here to Login</a></p>
    </form>
<?php
    }
?>
</body>
</html>