<?php
    $host = "localhost";
    $username = "root";
    $password = "";
    $database = "shop";

    // Connect to server
    $con = mysqli_connect($host, $username, $password, $database);
    if (!$con) {
        die ('Could not connect to ' . $host);
    }

    // Perform query
    $query = "SELECT id, name, description, price FROM products";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Catalog</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="style.css?v=<?php echo time(); ?>">
</head>
<body>
    <div class="container mt-4">
        <!-- Header -->
        <h1>Read Products</h1>
        <hr class="faded-line">
        
        <!-- Content: Product Table -->
        <a href="create_product.php" class="btn btn-primary my-2" style="width:170px;">Create New Product</a>
        <div class="table-responsive">
            <table class="table simple-table">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Name</th>
                        <th scope="col">Description</th>
                        <th scope="col">Price</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Sample row -->
                    <tr>
                        <?php 
                            $result = mysqli_query($con, $query);
                            if (!$result) {
                                $message = "Invalid query: " . mysqli_error($con);
                                $message .= "Whole query: " . $query;
                                die($message);
                            }

                            while ($row = mysqli_fetch_assoc($result)) {
                                echo <<<_END
                                <tr>
                                    <td>{$row['id']}</td>
                                    <td>{$row['name']}</td>
                                    <td style="text-align:justify">{$row['description']}</td>
                                    <td>{$row['price']} VND</td>
                                    <td style="text-align:center">
                                        <a href="read.php?id={$row['id']}" class="btn read btn-sm">Read</button>
                                        <a href="edit.php?id={$row['id']}" class="btn btn-primary btn-sm">Edit</a>
                                        <a href="delete.php?id={$row['id']}" class="btn btn-danger btn-sm">Delete</a>
                                    </td>
                                </tr>
                                _END;
                            }

                            mysqli_free_result( $result);
                        ?>
                    </tr>
                    <!-- More rows can be added here -->
                </tbody>
            </table>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<?php mysqli_close($con); ?>
