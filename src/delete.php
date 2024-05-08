<?php
require_once 'index_logic.php';


$user = getUser($_SESSION['username']);
$tasks = getUserTasks($user);


// virifiez si requette est post et id est assigne 

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['id'])) {
        $index = $_POST['id'];
        if ($index >= 0 && $index < count($tasks)) {
            deleteTask($index);
            // Redirigez a page index avec success
            header("Location: index.php?deleted_task=$index");
            exit;
        } else {
            // Tashe non trouvée, Redirigez vers index avec message erreur
            header("Location: index.php?error=task_not_found");
            exit;
        }
    }
}


/**
 * Effacer tache avec id de tache donne
 * @param mixed $id
 * @return void
 */
function deleteTask($id)
{
    $users = readData('users.json');
    $user = getUser($_SESSION['username']);
    $tasks = getUserTasks($user);


    unset($tasks[$id]);
    $tasks = array_values($tasks);
    $users[getUserIndex($user)]['tasks'] = $tasks;

    writeData('users.json', $users);
}