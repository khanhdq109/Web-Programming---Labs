<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Create New Product</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    </head>
    
    <body>
        <div class="container">
            <h1>Create New Product</h1>
            <form id="createProductForm" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control" id="name" name="name" required>
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
                </div>
                <div class="mb-3">
                    <label for="price" class="form-label">Price</label>
                    <input type="number" class="form-control" id="price" name="price" required>
                </div>
                <div class="mb-3">
                    <label for="image" class="form-label">Image</label>
                    <input type="text" class="form-control" id="image" name="image" required>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>

        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script>
            $(document).ready(function() {
                $('#createProductForm').submit(function(e) {
                    e.preventDefault();

                    // Collect form data
                    let formData = {
                        name: $('#name').val(),
                        description: $('#description').val(),
                        price: $('#price').val(),
                        image: $('#image').val()
                    };

                    // Send POST request to create product
                    $.ajax({
                        url: 'api.php',
                        type: 'POST',
                        data: JSON.stringify(formData),
                        contentType: 'application/json',
                        success: function(response) {
                            alert('Product created successfully');
                            window.location.href = 'a.php';
                        },
                        error: function(xhr, status, error) {
                            alert('Failed to create product');
                            console.error(error);
                        }
                    });
                });
            });
        </script>
    </body>
</html>
