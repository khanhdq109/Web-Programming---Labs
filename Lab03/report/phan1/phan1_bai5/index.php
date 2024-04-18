<?php
    $expr = "";
    $result = "0";

    if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["expr"])) {
        $expr = $_GET["expr"];
        $expr = trim($expr);
        $expr = stripslashes($expr);

        // Check if the expression ends with 'v' for inverse calculation
        if (preg_match('/^(.*)v$/', $expr, $matches)) {
            $innerExpr = $matches[1];
            // Evaluate the inner expression first
            try {
                eval('$number = ' . $innerExpr . ';');
                if ($number == 0) {
                    $result = "Division by zero error!";
                } else {
                    $result = 1 / $number;
                }
            } catch (Throwable $e) {
                $result = "Invalid expression!";
            }
        } else if (preg_match('/^[0-9+\-*\/()\s]*$/', $expr)) {
            // Evaluate safe mathematical expressions 
            try {
                eval('$result = ' . $expr . ';');
            } catch (Throwable $e) {
                $result = "INVALID!";
            }
        } else {
            $result = "INVALID!";
        }
    }
?>

<!DOCTYPE html>
<html lang="vi">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>CALCULOO</title>
        <!-- Bootstrap CSS-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
        <!-- Custom CSS -->
        <link rel="stylesheet" href="style.css?v=<?php echo time(); ?>">
    </head>

    <body>
        <div class="container">
            <!-- Navbar -->
            <nav class="navbar navbar-expand-lg navbar-light">
                <div class="container-fluid">
                    <a class="navbar-brand" href="#">
                        <span class="brand-text">CALCULOO</span>
                    </a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                                <a class="nav-link" href="#">Contact us</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Follow us</a>
                            </li>
                        </ul>
                        <form class="d-flex">
                            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                            <button class="btn btn-outline-success btn-search" type="submit">Search</button>
                        </form>
                    </div>
                </div>
            </nav>

            <!-- Calculator -->
            <div class="calculator-container">
                <div class="calculator">
                    <div class="calculator-screen">
                        <form id="calculator-form" method="GET" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" autocomplete="off">
                            <input type="text" name="expr" id="expr" value="<?php echo htmlspecialchars($result); ?>">
                        </form>
                    </div>
                    <h4>KÝ TỰ ĐẶC BIỆT</h4>
                    <table class="simple-table">
                        <thread>
                            <tr>
                                <th>Toán tử</th>
                                <th>Ký hiệu</th>
                            </tr>
                        </thread>
                        <tbody>
                            <tr>
                                <td>+</td>
                                <td>Cộng</td>
                            </tr>
                            <tr>
                                <td>-</td>
                                <td>Trừ</td>
                            </tr>
                            <tr>
                                <td>*</td>
                                <td>Nhân</td>
                            </tr>
                            <tr>
                                <td>/</td>
                                <td>Chia</td>
                            </tr>
                            <tr>
                                <td>**</td>
                                <td>Lũy thừa</td>
                            </tr>
                            <tr>
                                <td>v</td>
                                <td>Nghịch đảo</td>
                            </tr>
                            <tr>
                                <td>Enter</td>
                                <td>Kết quả</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Footer -->
            <footer class="bg-dark text-light text-center p-3s">
                <p>Footer information...</p>
                <p><a href="#">Link 1</a> | <a href="#">Link 2</a> | <a href="#">Link 3</a></p>
            </footer>
        </div>

        <!-- Bootstrap JS -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    </body>
</html>
