<?php 
    // Start session
    session_start();

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

    // Clear "remember_me"
    if (isset($_COOKIE["remember_me"])) {
        setcookie("remember_me", "", time() - 3600, "/");
        setcookie("remember_password", "", time() - 3600, "/");
    }

    // Redirect to login
    header("Location: login.php");
    exit()
?>