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
    $query = "SELECT id, name, price, image FROM products";
?>

<!DOCTYPE html>
<html lang="vi">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Shopoo</title>
        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
        <!-- Custom CSS -->
        <link rel="stylesheet" href="style.css?v=<?php echo time(); ?>">
    </head>

    <body>
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">
                    <a class="navbar-brand" href="list.php">
                        <span class="brand-text">Shopoo</span>
                    </a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="list.php">Categories</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Contact us</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Follow us</a>
                            </li>
                        </ul>
                        <form class="d-flex">
                            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                            <button class="btn btn-outline-success" type="submit">Search</button>
                        </form>
                    </div>
                </div>
            </nav>

            <div class="row">
                <aside class="col-md-2">
                    <h2>Category</h2>
                    <ul>
                        <li><a href="#" class="category-link">CPU</a></li>
                        <li><a href="#" class="category-link">VGA</a></li>
                        <li><a href="#" class="category-link">SSD</a></li>
                        <li><a href="#" class="category-link">RAM</a></li>
                        <li><a href="#" class="category-link">Others</a></li>
                    </ul>
                    <h2>Top Products</h2>
                    <ul>
                        <?php 
                            $result = mysqli_query($con, $query);
                            if (!$result) {
                                $message = "Invalid query: " . mysqli_error($con);
                                $message .= "Whole query: " . $query;
                                die($message);
                            }

                            while ($row = mysqli_fetch_assoc($result)) {
                                echo '<li><a href="detail.php?id=' . $row['id'] . '" class="top-products-link">' . $row['name'] . '</a>';
                            }

                            mysqli_free_result( $result);
                        ?>
                        
                    </ul>
                </aside>
                <div class="col-md-8">
                    <div class="row">
                        <h4 class="top-products-heading">
                            <a href="#" class="page-link">Home</a> &gt;
                            <a href="#" class="page-link">Top Products</a>
                        </h4>
                        <?php 
                            $result = mysqli_query($con, $query);
                            if (!$result) {
                                $message = "Invalid query: " . mysqli_error($con);
                                $message .= "Whole query: " . $query;
                                die($message);
                            }

                            while ($row = mysqli_fetch_assoc($result)) {
                                echo '<div class="col-sm-4">';
                                echo '  <div class="card">';
                                echo '      <img src="' . $row['image'] . '" class="card-img-top" alt="' . htmlspecialchars($row['name']) . '">';
                                echo '      <div class="card-body">';
                                echo '          <p class="book-name">' . htmlspecialchars($row['name']) . '</p>';
                                echo '          <p class="card-text">Price: ' . htmlspecialchars($row['price']) . '<span>&#36;</span></p>';
                                echo '          <a href="detail.php?id=' . $row['id'] . '" class="btn btn-danger">Buy Now</a>';
                                echo '      </div>';
                                echo '  </div>';
                                echo '</div>';
                            }

                            mysqli_free_result( $result);
                        ?>
                    </div>

                    <ul class="pagination justify-content-end">
                        <li class="page-item"><a class="page-link" href="#">prev</a></li>
                        <li class="page-item active"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item"><a class="page-link" href="#">next</a></li>
                    </ul>
                </div>

                <div class="col-md-2 faded-gray-background d-flex justify-content-center align-items-center">
                    Advertisements
                </div>
            </div>
            <footer class="bg-dark text-light text-center p-3 mt-5">
                <p>Footer information...</p>
                <p><a href="#">Link 1</a> | <a href="#">Link 2</a> | <a href="#">Link 3</a></p>
            </footer>
        </div>
        
        <!-- Bootstrap JS -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    </body>
</html>

<?php mysqli_close($con); ?>