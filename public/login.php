<?php
require_once '../src/controller/UserController.php';
require_once '../src/models/User.php';
require_once '../src/utils/JsonStorage.php';

// Initialize the UserController
$userController = new UserController();

// Check if the login form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["login"])) {
    // Retrieve form data
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Authenticate user
    $user = $userController->authenticateUser($username, $password);
    if ($user) {
        // Redirect to dashboard or another page on successful login
        header("Location: index.php");
        exit();
    } else {
    $loginError = "Invalid username or password"; 
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Todo App</title>
    <link rel="stylesheet" href="css/styles.css">
</head>

<body>
    <main>
        <div class="container">
            <div class="main-wrapper">
                <div class="login-form">
                    <h2>Login</h2>
                    <?php if (isset($loginError)) : ?>
                        <p class="error"><?php echo $loginError; ?></p>
                    <?php endif; ?>
                    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" id="username" name="username" required>
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" id="password" name="password" required>
                        </div>
                        <div class="form-group">
                            <button type="submit" name="login">Login</button>
                        </div>
                    </form>
                </div>
                <div class="register-link">
                    <p>Don't have an account? <a href="register.php">Register</a></p>
                </div>
            </div>
        </div>
    </main>
</body>

</html>
