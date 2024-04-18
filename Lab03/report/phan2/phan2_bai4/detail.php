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

    // Get the product ID from the URL
    $product_id = isset($_GET['id']) ? intval($_GET['id']) : 0;

    // Perform query
    $query1 = "SELECT id, name, price, image, description FROM products";
    $query2 = "SELECT name, price, image, description FROM products WHERE id = " . $product_id;
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
            <!-- Navbar -->
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

            <!-- Content -->
            <div class="row">
                <!-- Side bar -->
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
                            $result = mysqli_query($con, $query1);
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
                <!-- Main Content -->
                <div class="col-md-8 content">
                    <h4 class="top-products-heading">
                        <a href="#" class="page-link">Home</a> &gt;
                        <a href="../phan1_bai1/index.html" class="page-link">Top Products</a> &gt;
                        <?php
                            $result = mysqli_query($con, $query2);
                            if (!$result) {
                                $message = "Invalid query: " . mysqli_error($con);
                                $message .= "Whole query: " . $query;
                                die($message);
                            }

                            while ($row = mysqli_fetch_assoc($result)) {
                                echo '<a href="#" class="page-link">' . $row['name'] . '</a>';
                            }

                            mysqli_free_result( $result);
                        ?>
                    </h4>
                    <div class="row">
                        <?php
                            $result = mysqli_query($con, $query2);
                            if (!$result) {
                                $message = "Invalid query: " . mysqli_error($con);
                                $message .= "Whole query: " . $query;
                                die($message);
                            }

                            while ($row = mysqli_fetch_assoc($result)) {
                                echo <<<_END
                                <div class="col-sm-6">
                                    <div class="row">
                                        <div class="col-12 big-img-container">
                                            <img src={$row['image']} class="big-image img-fluid" alt="...">
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col-6 col-md-3 small-img-container text-center">
                                            <img src="images/img01.jpg" class="small-image img-fluid" alt="...">
                                        </div>
                                        <div class="col-6 col-md-3 small-img-container text-center">
                                            <img src="images/img02.jpg" class="small-image img-fluid" alt="...">
                                        </div>
                                        <div class="col-6 col-md-3 small-img-container text-center">
                                            <img src="images/img03.jpg" class="small-image img-fluid" alt="...">
                                        </div>
                                        <div class="col-6 col-md-3 small-img-container text-center">
                                            <img src="images/img04.jpg" class="small-image img-fluid" alt="...">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <h2 class="text-center">{$row['name']}</h2>
                                    <h5>Description</h5>
                                    <p class="text-justify-custom">
                                        {$row['description']}
                                    </p>
                                    <div class="butt text-center">
                                        <button type="button" class="btn btn-danger btn-lg">Buy Now: {$row['price']} VND</button>
                                    </div>
                                </div>
                                _END;
                            }

                            mysqli_free_result( $result);
                        ?>
                    </div>

                </div>
                <!-- Advertisement-->
                <div class="col-md-2 faded-gray-background d-flex justify-content-center align-items-center">
                    Advertisements
                </div>
            </div>

            <!-- Footer -->
            <footer class="bg-dark text-light text-center p-3 mt-5">
                <p>Footer information...</p>
                <p><a href="#">Link 1</a> | <a href="#">Link 2</a> | <a href="#">Link 3</a></p>
            </footer>
        </div>
        
        <!-- Bootstrap JS -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
        <!-- jQuery (required for Bootstrap JS) -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script>
            $(document).ready(function(){
                // Handle click event for small images
                $(".small-image").click(function(){
                    // Get the src attribute of the clicked small image
                    var newSrc = $(this).attr("src");
                    // Update the src attribute of the big image
                    $(".big-image").attr("src", newSrc);
                });
            });
        </script>
    </body>
</html>

<?php mysqli_close($con); ?>