<?php
require_once 'index_logic.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // est connecte
    if (!isLoggedIn()) {
        header("Location: login.php");
        exit;
    }

    // Recuperer les donnes
    $title = $_POST['title'];
    $body = $_POST['body'];
    $due_date = $_POST['due_date'];
    $status = $_POST['taskStatus'];
    $formattedDate = date("d F Y", strtotime($due_date));

    if (empty($title) || empty($due_date) || empty($status)) {
        // Redirige avec un message d'erreur si des champs obligatoires sont manquants
        header("Location: new_task.php?error=missing_fields");
        exit;

    }

    // Prépare la nouvelle  tâche
    $newTask = [
        'title' => $title,
        'body' => $body,
        'due_date' => $formattedDate,
        'status' => $status
    ];

    // Récupère les tâches de l'utilisateur actuel
    $currentUser = $_SESSION['username'];
    $users = readData('users.json');

    // Recherche les données de l'utilisateur actuel
    foreach ($users as &$user) {
        if ($user['username'] === $currentUser) {
            // Ajoute la nouvelle tâche aux tâches de l'utilisateur
            $user['tasks'][] = $newTask;
            break;
        }
    }

    // Enregistre les données utilisateur mises à jour dans le fichier JSON
    writeData('users.json', $users);

    // Redirige vers new_task.php 
    header("Location: index.php");
    exit;
}
