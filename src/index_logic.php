<?php
session_start();

// Chargement des utilisateurs à partir du fichier JSON
$dataFile = 'users.json';
if (empty($dataFile)) {

}

// Check if user is logged in

/**
 * Vérifie si l'utilisateur est connecté
 * @return bool
 */
function isLoggedIn()
{
    return isset($_SESSION['username']);
}

/**
 * Fonction pour définir la classe CSS 'active' pour une tâche spécifique
 * @param mixed $index
 * @return string
 */
function activeTask($index)
{
    return isset($_GET['task']) && $_GET['task'] == $index ? 'active' : '';
}

/**
 * Obtenir l'index de l'utilisateur actuel
 * @param mixed $user
 * @return mixed
 */
function getUserIndex($user)
{
    $users = readData('users.json');
    $userIndex = -1;
    foreach ($users as $index => $user) {
        if ($user["username"] === $_SESSION['username']) {
            $userIndex = $index;
            break;
        }
    }
    if ($userIndex === -1) {
        echo "User not found";
    }
    return $userIndex;
}

/**
 * Fonction pour lire les données à partir d'un fichier JSON
 * @param mixed $dataFile
 * @return mixed
 */
function readData($dataFile)
{
    $data = file_get_contents($dataFile);
    return json_decode($data, true);
}

/**
 * Fonction pour ecrire les données dans un fichier JSON
 * @param mixed $dataFile
 * @param mixed $data
 * @return void
 */
function writeData($dataFile, $data)
{
    $updatedData = json_encode($data, JSON_PRETTY_PRINT);
    file_put_contents($dataFile, $updatedData);
}

/**
 *  Obtenir les détails d'un utilisateur en fonction du nom d'utilisateur
 * @param mixed $username
 * @return mixed
 */
function getUser($username)
{
    global $dataFile;
    $users = readData($dataFile);
    foreach ($users as $user) {
        if ($user["username"] === $username) {
            return $user;
        }
    }
    return null;
}

/**
 * Obtenir les tâches d'un utilisateur
 * @param mixed $user
 * @return mixed
 */
function getUserTasks($user)
{
    if (count($user['tasks']) > 0) {
        return $user['tasks'];
    } else {
        return null;
    }
}

/**
 * Obtenir les statistiques des tâches d'un utilisateur
 * @param mixed $tasks
 * @return int[]
 */
function getUserStats($tasks)
{
    $stats = array(
        'not-started' => 0,
        'in-progress' => 0,
        'completed' => 0,
    );
    if ($tasks === null) {
        return $stats;
    }

    foreach ($tasks as $task) {
        switch ($task['status']) {
            case 'not-started':
                $stats['not-started']++;
                break;
            case 'in-progress':
                $stats['in-progress']++;
                break;
            case 'completed':
                $stats['completed']++;
                break;
            default:

                break;
        }
    }
    return $stats;
}

/**
 * Obtenir la classe de badge pour une tâche
 * @param mixed $task
 * @return string
 */
function getTaskBadge($task)
{
    switch ($task['status']) {
        case 'not-started':
            $badgeClass = 'info';
            break;
        case 'in-progress':
            $badgeClass = 'warning';
            break;
        case 'completed':
            $badgeClass = 'success';
            break;
        default:
            $badgeClass = 'info'; // Par défaut à 'info' si l'état est inconnu
            break;
    }
    return $badgeClass;
}

/**
 * Recherche des tâches basée sur une requête de recherche
 * @param mixed $querry
 * @return mixed
 */
function searchTask($query)
{
    $searchResults = [];
    $searchQuery = $query;
    $tasks = getUserTasks(getUser($_SESSION['username']));
    if ($tasks !== null) {
        $searchResults = array_filter($tasks, function ($task) use ($searchQuery) {
            return stripos($task['title'], $searchQuery) !== false;
        });
    }
    return $searchResults;
}

function renderList($tasks)
{
    if (isset($_GET['filter'])) {
        $filter = $_GET['filter'];
        $tasks = filter($filter, $tasks);
        renderTasks($tasks);

    } elseif (isset($_GET['query'])) {
        $filter = $_GET['query'];
        $tasks = searchTask($filter);
        renderTasks($tasks);
    } else {
        renderTasks($tasks);
    }
}

function renderTasks($tasks)
{
    if ($tasks !== null) {
        foreach ($tasks as $index => $task) {
            require ('components/task.php');
        }
    } else {
        require ('components/emptyTask.php');
    }
}

function filter($filter, $tasks)
{
    switch ($filter) {
        case 'completed':
            $filteredTasks = array_filter($tasks, function ($task) {
                return $task['status'] === 'completed';
            });
            break;
        case 'uncompleted':
            $filteredTasks = array_filter($tasks, function ($task) {
                return $task['status'] === 'not-started' || $task['status'] === 'in-progress';
            });
            break;
        default:
            $filteredTasks = $tasks;
            break;
    }
    return $filteredTasks;
}