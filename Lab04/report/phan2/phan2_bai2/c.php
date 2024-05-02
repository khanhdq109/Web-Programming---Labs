<?php
    $host = "localhost";
    $username = "root";
    $password = "";
    $database = "shop";
    
    // Connect to the database
    $con = mysqli_connect($host, $username, $password, $database);
    if (!$con) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Check if the form has been submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
        $id = $_POST['id'];
        $name = mysqli_real_escape_string($con, $_POST['name']);
        $description = mysqli_real_escape_string($con, $_POST['description']);
        $price = mysqli_real_escape_string($con, $_POST['price']);
        $image = mysqli_real_escape_string($con, $_POST['image']);

        // Update the product in the database
        $sql = "UPDATE products SET name='$name', description='$description', price='$price', image='$image' WHERE id=$id";
        
        if (mysqli_query($con, $sql)) {
            echo "<script>alert('Product updated successfully');</script>";
            echo "<script>window.location.href='a.php';</script>";
            exit();
        } else {
            echo "Error updating record: " . mysqli_error($con);
        }
    }

    // Retrieve the existing product data based on ID
    if (isset($_GET['id'])) {
        $id = intval($_GET['id']);
        $query = "SELECT * FROM products WHERE id=$id";
        $result = mysqli_query($con, $query);

        if ($result && mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            $name = $row['name'];
            $description = $row['description'];
            $price = $row['price'];
            $image = $row['image'];
        } else {
            die("Product not found or database error");
        }
    } else {
        die("Invalid request");
    }

    // Close the database connection
    mysqli_close($con);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Product</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container">
        <h1>Edit Product</h1>
        <form action="c.php" method="post">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name" value="<?php echo isset($name) ? htmlspecialchars($name) : ''; ?>" required>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control" id="description" name="description" required><?php echo isset($description) ? htmlspecialchars($description) : ''; ?></textarea>
            </div>
            <div class="mb-3">
                <label for="price" class="form-label">Price</label>
                <input type="number" class="form-control" id="price" name="price" value="<?php echo isset($price) ? $price : ''; ?>" required>
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">Image URL</label>
                <input type="text" class="form-control" id="image" name="image" value="<?php echo isset($image) ? htmlspecialchars($image) : ''; ?>" required>
            </div>
            <button type="submit" name="submit" class="btn btn-primary">Update</button>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</body>
</html>
