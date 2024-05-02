<?php
    header('Content-Type: application/json');

    // Connect to database
    $host = "localhost";
    $username = "root";
    $password = "";
    $database = "shop";
    $con = mysqli_connect($host, $username, $password, $database);
    if (!$con) {
        die ("Could not connect to the database.");
    }

    // Handle GET request to retrieve all products
    if ($_SERVER["REQUEST_METHOD"] == "GET") {
        $query = "SELECT id, name, description, price, image FROM products";
        $result = mysqli_query($con, $query);
        $products = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $products[] = $row;
        }
        echo json_encode($products);
    }

    // Handle POST request to create a new product
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $data = json_decode(file_get_contents("php://input"), true);
        $name = mysqli_real_escape_string($con, $data['name']);
        $description = mysqli_real_escape_string($con, $data['description']);
        $price = mysqli_real_escape_string($con, $data['price']);
        $image = mysqli_real_escape_string($con, $data['image']);

        $sql = "INSERT INTO products (name, description, price, image) VALUES ('$name', '$description', '$price', '$image')";
        if (mysqli_query($con, $sql)) {
            echo json_encode(["message" => "Product created successfully"]);
        } else {
            http_response_code(500);
            echo json_encode(["error" => "Failed to create product"]);
        }
    }

    // Close database connection
    mysqli_close($con);
?>
