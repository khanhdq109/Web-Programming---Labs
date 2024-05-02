<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Product Catalog</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="style.css?v=<?php echo time(); ?>">
    </head>
    
    <body>
        <div class="container mt-4">
            <h1>Read Products</h1>
            <hr class="faded-line">
            
            <a href="b.php" class="btn btn-primary my-2" style="width:170px;">Create New Product</a>
            <div class="table-responsive">
                <table id="productTable" class="table simple-table">
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
                    </tbody>
                </table>
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script>
            $(document).ready(function() {
                // Load products on page load
                $.get("api.php", function(data) {
                    data.forEach(function(product) {
                        $('#productTable tbody').append(`
                            <tr>
                                <td>${product.id}</td>
                                <td>${product.name}</td>
                                <td>${product.description}</td>
                                <td>${product.price} VND</td>
                                <td style="text-align:center">
                                    <a href="a.php?id=${product.id}" class="btn read btn-sm">Read</a>
                                    <a href="c.php?id=${product.id}" class="btn btn-primary btn-sm">Edit</a>
                                    <a href="#?id=${product.id}" class="btn btn-danger btn-sm">Delete</a>
                                </td>
                            </tr>
                        `);
                    });
                });
            });
        </script>
    </body>
</html>
