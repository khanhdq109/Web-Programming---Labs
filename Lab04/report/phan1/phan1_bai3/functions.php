<?php
    function validUser($username, $password) {
        global $con;
        $query = "SELECT * FROM login WHERE username = '$username' AND password = '$password'";
        $result = mysqli_query($con, $query);
        if (mysqli_num_rows($result) > 0) {
            mysqli_free_result($result);
            return true;
        } else {
            mysqli_free_result($result);
            return false;
        }
    }
?>