<?php
require (realpath(__DIR__ . '/../views/new_task.view.php'));

$config = require_once realpath(__DIR__ . "/../config.php");
$db = new Database($config);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Process the form data
    $statement = $db->connection->prepare('INSERT INTO todos (user_id, title, body, due_date, status) VALUES (:user_id, :title, :body, :due_date, :status)');

    // Execute the statement with provided parameters
    $result = $statement->execute([
        'user_id' => 1,
        'title' => $_POST['title'],
        'body' => $_POST['body'],
        'due_date' => $_POST['due_date'],
        'status' => $_POST['status']
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
