<?php
    require_once '../src/controller/UserController.php';
    require_once '../src/models/User.php';
    require_once '../src/utils/JsonStorage.php';

// Initialize the UserController
    $userController = new UserController();

    // Initialize variables for form validation and error handling
    $username = $password = "";
    $usernameErr = $passwordErr = $registrationError = "";

    // Check if the registration form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["register"])) {
        // Validate username
        if (empty($_POST["username"])) {
            $usernameErr = "Username is required";
        } else {
            $username = $_POST["username"];
            // Additional validation can be added here
        }

        // Validate password
        if (empty($_POST["password"])) {
            $passwordErr = "Password is required";
        } else {
            $password = $_POST["password"];
            // Additional validation can be added here
        }

        // If there are no validation errors, proceed with user registration
        if (empty($usernameErr) && empty($passwordErr)) {
            // Register user
            $result = $userController->registerUser($username, $password);
            if ($result) {
                // Redirect to login page on successful registration
                header("Location: login.php");
                exit();
            } else {
                $registrationError = "Registration failed. Please try again later.";
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - Todo App</title>
    <link rel="stylesheet" href="css/styles.css">
</head>

<body>
    <main>
        <div class="container">
            <div class="main-wrapper">
                <div class="register-form">
                    <h2>Register</h2>
                    <?php if (!empty($registrationError)) : ?>
                        <p class="error"><?php echo $registrationError; ?></p>
                    <?php endif; ?>
                    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" id="username" name="username" value="<?php echo htmlspecialchars($username); ?>" required>
                            <span class="error"><?php echo $usernameErr; ?></span>
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" id="password" name="password" value="<?php echo htmlspecialchars($password); ?>" required>
                            <span class="error"><?php echo $passwordErr; ?></span>
                        </div>
                        <div class="form-group">
                            <button type="submit" name="register">Register</button>
                        </div>
                    </form>
                </div>
                <div class="login-link">
                    <p>Already have an account? <a href="login.php">Login</a></p>
                </div>
            </div>
        </div>
    </main>
</body>

</html>



