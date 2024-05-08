<?php
require_once 'index_logic.php';

// Vérifie si requette est post
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Vérifie si l'email et le mot de passe sont fournis
    if (isset($_POST['email']) && isset($_POST['password'])) {
        // Lit les données des utilisateurs 
        $users_data = readData('users.json');

        // Récupère les entrées 
        $email = $_POST['email'];
        $password = $_POST['password'];

        // Parcourt les données pour trouver un email correspondant
        foreach ($users_data as $user) {
            if ($user['email'] === $email) {
                // Vérifie le mot de passe en utilisant bcrypt
                if (password_verify($password, $user['password'])) {
                    // Démarre la session 
                    session_start();
                    $_SESSION['username'] = $user['username'];
                    // Redirige vers le  index
                    header("Location: index.php");
                    exit();
                }
            }
        }
    }

    // Redirige vers la page de connexion avec une erreur si la connexion échoue
    header("Location: login.php?login_error=true");
    exit();
}

