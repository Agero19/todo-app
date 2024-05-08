<?php
require_once realpath(__DIR__ . "/register_logic.php")
    ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Todo App - Platon Motulko</title>

    <!-- Styles -->
    <link rel="stylesheet" href="../css/style.css">

    <!-- Google fFont Import -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap" rel="stylesheet">
</head>

<body>
    <main>
        <div class="container ">
            <div class="main-wrapper">
                <form action="register_logic.php" method='post'>
                    <div class="login-form">
                        <h2 class="form-logo">S'inscrire</h2>

                        <div class="mb-2">
                            <label for="username" class="form-label">Nom</label>
                            <input type="text" id="username" name="username" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">Adresse e-mail</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>

                        <div class="mb-2">
                            <label for="password" class="form-label">Mot de passe</label>
                            <input type="password" class="form-control" id="password" name="password" required>
                        </div>

                        <p class="mb-2">
                            Vous avez une compte?
                            <a href="login.php">Auth</a>
                        </p>

                        <button type="submit" class="btn btn-info w-100">Inscrire</button>
                    </div>
                    <?php
                    if (isset($_GET['register_error']) && $_GET['register_error'] === 'true') {
                        echo "<p style='color: red;'>Username or email already exists. Please try again.</p>";
                    }
                    ?>

                </form>
            </div>
    </main>
</body>

</html>