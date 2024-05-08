<?php
require_once "index_logic.php";

// Function to check if user exists in JSON file
function userExists($username, $email)
{
    $users = readData('users.json');
    foreach ($users as $user) {
        if ($user['username'] === $username || $user['email'] === $email) {
            return true;
        }
    }
    return false;
}

// Function to save user data to JSON file
function saveUser($username, $email, $password)
{
    $users = readData('users.json');
    $users[] = [
        'username' => $username,
        'email' => $email,
        'password' => password_hash($password, PASSWORD_DEFAULT),
        'tasks' => []
    ];
    writeData('users.json', $users);
}

// Validation and registration process
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Check if username or email already exists
    if (userExists($username, $email)) {
        header("Location: register.php?register_error=true");
        exit;
    } else {
        // Save user data to JSON file
        saveUser($username, $email, $password);

        // Set session and redirect
        $_SESSION['username'] = $username;
        header("Location: index.php?username=" . urlencode($username));
        exit;
    }
}
