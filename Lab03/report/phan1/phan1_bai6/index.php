<?php
    function walert($msg) {
        echo "<script type=\"text/javascript\">";
        echo "window.alert(\"" . $msg ."\");";
        echo "</script>";
    }

    function pre_process($input) {
        $input = trim($input);
        $input = stripslashes($input);
        return $input;
    }

    function generateYears() {
        $output = "";
        for ($i = 2024; $i >= 1950; $i--) {
            $output .= "<option value=\"" . $i . "\">" . $i . "</option>\n";
        }
        return $output;
    }

    function generateDays() {
        $output = "";
        for ($i = 1; $i <= 31; $i++) {
            $output .= "<option value=\"" . $i . "\">" . $i . "</option>\n";
        }
        return $output;
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // First Name
        if (isset($_POST["firstName"])) {
            $firstName = $_POST["firstName"];
            $firstName = pre_process($firstName);
            if (strlen($firstName) < 2) {
                walert("Your first name is too short!");
                return false;
            } else if (strlen($firstName) > 30) {
                walert("Your first name is too long!");
                return false;
            }
        } else {
            walert("Please provide your first name!");
            return false;
        }

        // Last Name
        if (isset($_POST["lastName"])) {
            $lastName = $_POST["lastName"];
            $lastName = pre_process($lastName);
            if (strlen($lastName) < 2) {
                walert("Your last name is too short!");
                return false;
            } else if (strlen($lastName) > 30) {
                walert("Your last name is too long!");
                return false;
            }
        } else {
            walert("Please provide your last name!");
            return false;
        }

        // Email
        if (isset($_POST["email"])) {
            $email = $_POST["email"];
            $email = pre_process($email);
            $pattern = '/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/';
            if (!preg_match($pattern, $email)) {
                walert("Invalid email address");
                return false;
            }
        } else {
            walert("Please provide your email address!");
            return false;
        }

        // Password
        if (isset($_POST["password"])) {
            $password = $_POST["password"];
            $password = pre_process($password);
            if (strlen($password) < 2) {
                walert("Your password is too weak!");
                return false;
            } else if (strlen($password) > 30) {
                walert("Your password is too long!");
                return false;
            }
        } else {
            walert("Please provide your password!");
            return false;
        }

        // Birthday
        if (!isset($_POST["year"])) {
            walert("Please select your year of birth!");
            return false;
        }
        if (!isset($_POST["month"])) {
            walert("Please select your month of birth!");
            return false;
        }
        if (!isset($_POST["day"])) {
            walert("Please select your day of birth!");
            return false;
        }

        // Gender
        if (!isset($_POST["gender"])) {
            walert("Please select your gender!");
            return false;
        }

        // Country
        if (!isset($_POST["country"])) {
            walert("Please select your country!");
            return false;
        }

        // About
        if (!isset($_POST["about"])) {
            walert("Please tell something about you!");
            return false;
        }

        walert("Complete!");
    }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>FORMULOO</title>
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
                        <span class="brand-text">FORMULOO</span>
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

            <!-- Formular -->
            <div class="formular-container">
                <div class="formular">
                    <h2 class="text-center mb-4">Registration</h2>
                    <form id="registration" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                        <!-- First Name -->
                        <div class="mb-3">
                            <label for="firstName" class="form-label">First Name:</label>
                            <input type="text" class="form-control" id="firstName" name="firstName">
                        </div>
                        <!-- Last Name -->
                        <div class="mb-3">
                            <label for="lastName" class="form-label">Last Name:</label>
                            <input type="text" class="form-control" id="lastName" name="lastName">
                        </div>
                        <!-- Email -->
                        <div class="mb-3">
                            <label for="email" class="form-label">Email:</label>
                            <input type="text" class="form-control" id="email" name="email">
                        </div>
                        <!-- Password -->
                        <div class="mb-3">
                            <label for="password" class="form-label">Password:</label>
                            <input type="password" class="form-control" id="password" name="password">
                        </div>
                        <!-- Birthday -->
                        <div class="mb-3">
                            <label for="year" class="form-label">Birthday:</label>
                            <div class="row">
                                <div class="col">
                                    <select class="form-select" id="year" name="year">
                                        <option value="" disabled selected>Year</option>
                                        <?php echo generateYears(); ?>
                                    </select>
                                </div>
                                <div class="col">
                                    <select class="form-select" id="month" name="month">
                                        <option value="" disabled selected>Month</option>
                                        <option value="1">January</option>
                                        <option value="2">February</option>
                                        <option value="3">March</option>
                                        <option value="4">April</option>
                                        <option value="5">May</option>
                                        <option value="6">June</option>
                                        <option value="7">July</option>
                                        <option value="8">August</option>
                                        <option value="9">September</option>
                                        <option value="10">October</option>
                                        <option value="11">November</option>
                                        <option value="12">December</option>
                                    </select>
                                </div>
                                <div class="col">
                                    <select class="form-select" id="day" name="day">
                                        <option value="" disabled selected>Day</option>
                                        <?php echo generateDays(); ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <!-- Gender -->
                        <div class="mb-3">
                            <label class="form-label">Gender:</label>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="gender" id="male" value="male">
                                <label class="form-check-label" for="male">Male</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="gender" id="female" value="female">
                                <label class="form-check-label" for="female">Female</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="gender" id="unspecified" value="unspecified">
                                <label class="form-check-label" for="unspecified">Other</label>
                            </div>
                        </div>
                        <!-- Country -->
                        <div class="mb-3">
                            <label for="country" class="form-label">Country:</label>
                            <select class="form-select" id="country" name="country">
                                <option value="">Select Country</option>
                                <option value="Vietnam">Vietnam</option>
                                <option value="Australia">Australia</option>
                                <option value="United States">United States</option>
                                <option value="India">India</option>
                                <option value="Other">Other</option>
                            </select>
                        </div>
                        <!-- About -->
                        <div class="mb-3">
                            <label for="about" class="form-label">About:</label>
                            <textarea class="form-control" id="about" name="about" rows="4"></textarea>
                        </div>
                        <!-- Submit/Reset -->
                        <div class="d-grid gap-2">
                            <button class="btn btn-primary" type="submit">Submit</button>
                            <button class="btn btn-secondary" type="reset">Reset</button>
                        </div>
                    </form>
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
