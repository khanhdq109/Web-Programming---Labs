<?php 
    // Start session
    session_start();

    // Check if haven't logged in
    if (!isset($_SESSION["username"])) {
        header("Location: login.php");
        exit();
    }

    $username = $_SESSION["username"];

    if ($_SESSION["remember"] == "off") {
        // Unset all session variable
        $_SESSION = array();

        // Delete the session cookie
        if (ini_get("session.use_cookies")) {
            $params = session_get_cookie_params();
            setcookie(
                session_name(), "", time() - 3600,
                $params["path"], $params["domain"],
                $params["secure"], $params["httponly"]
            );
        }

        // Destroy session
        session_destroy();
    }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>INFO</title>
    </head>

    <body>
        <h2>Welcome, <?php echo $username; ?>!</h2>
        <a href="logout.php">Logout</a>
    </body>
</html>