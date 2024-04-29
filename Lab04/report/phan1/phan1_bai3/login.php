<?php 
    include_once("functions.php");

    // Start session
    session_start();

    // Connect to server
    $host = "localhost";
    $name = "root";
    $password = "";
    $database = "user";

    $con = mysqli_connect($host, $name, $password, $database);
    if (!$con) {
        die ("Cound not connect to " . $host);
    }

    // Check if already logged in
    if (!isset($_SESSION["remember"])) {
        $_SESSION["remember"] = "off";
    }
    if (isset($_SESSION["username"]) && $_SESSION["remember"] == "on") {
        header("Location: info.php");
        exit();
    }

    // Handle form
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $username = $_POST["username"];
        $password = $_POST["password"];

        $_SESSION["username"] = $username;
        if (validUser($username, $password)) {
            if (isset($_POST["remember_me"])) {
                if ($_POST["remember_me"] == 'on') {
                    $_SESSION["remember"] = "on";
                }
            }
            
            header("Location: info.php");
            exit();
        }
        else {
            echo "Username or Password is Incorrect. Try again.";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>LOGIN</title>
    </head>
    
    <body>
        <h1>Login</h1>
        <form action="login.php" method="POST">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required><br><br>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required><br><br>
            <input type="checkbox" id="remember_me" name="remember_me">
            <label for="remember_me">Remember me</label><br><br>
            <input type="submit" value="Login">
        </form>
    </body>
</html>