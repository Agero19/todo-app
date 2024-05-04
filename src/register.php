<?php

require (realpath(__DIR__ . '/../views/register.view.php'));

$config = require_once realpath(__DIR__ . "/../config.php");
$db = new Database($config);

if ($_SERVER['REQUEST_METHOD'] === 'post') {


    $statement = $db->connection->prepare('insert into users(username, email, password) values(:username , :email , :password)');
    $result = $statement->execute([
        'username' => $_POST['username'],
        'email' => $_POST['email'],
        'password' => $_POST['password']
    ]);

    if ($result) {
        // If the query was successful, redirect to the desired page
        header('Location: /');
        exit(); // Always exit after a header redirect
    } else {
        // Handle query failure (optional)
        echo "Error occurred while adding the task.";
    }
}