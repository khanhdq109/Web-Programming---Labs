<?php
    $host = "localhost";
    $username = "root";
    $password = "";
    $database = "shop";

    // Connect to server
    $con = mysqli_connect($host, $username, $password, $database);

    // Check if 'id' is present in the URL
    if (isset($_GET['id'])) {
        $id = intval($_GET['id']);  // Ensure that id is an integer to prevent SQL injection

        // Prepare a delete statement
        $sql = "DELETE FROM products WHERE id = $id";

        // Execute the query
        if (mysqli_query($con, $sql)) {
            echo "<script>alert('Product deleted successfully!');</script>";
        } else {
            echo "<script>alert('Error deleting record: " . mysqli_error($con) . "');</script>";
        }
    }

    // Redirect to index.php after deletion
    echo "<script>window.location.href='index.php';</script>";

    // Close connection
    mysqli_close($con);
?>
