<?php

// Inclure le script logique pour la page d'index
require_once realpath(__DIR__ . "/index_logic.php");

// Obtenir les donnes de l'utilisateur actuel
if (isLoggedIn()) {
    $user = getUser($_SESSION['username']);
    $tasks = getUserTasks($user);
    $stats = getUserStats($tasks);
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Todo App</title>

    <!-- Styles -->
    <link rel="stylesheet" href="../css/style.css">

    <!-- Importation de la police Google -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap" rel="stylesheet">
</head>

<body>
    <main>
        <div class="container ">
            <div class="main-wrapper">
                <!-- Barre latérale -->
                <aside class="sidebar">
                    <div class="avatar">
                        <!-- Si l'utilisateur est connecté, afficher sa photo de profil, sinon afficher une image par défaut -->
                        <?php if (isLoggedIn()): ?>
                            <img class="user-icon" src="../img/koala.png" alt="Avatar">
                        <?php else: ?>
                            <img class="user-icon" src="../img/anonymous.png" alt="Avatar invité">
                        <?php endif; ?>
                    </div>
                    <h2><?= isLoggedIn() ? $user['username'] : "Invité" ?></h2>
                    <?php if (isLoggedIn()): ?>
                        <!-- Si l'utilisateur est connecté, afficher ses statistiques et un bouton de déconnexion -->
                        <div class="stats">
                            <div class="stats-item">
                                <span>À faire</span>
                                <span><?= $stats['not-started'] ?></span>
                            </div>
                            <div class="stats-item">
                                <span>En cours</span>
                                <span><?= $stats['in-progress'] ?></span>
                            </div>
                            <div class="stats-item">
                                <span>Terminé</span>
                                <span><?= $stats['completed'] ?></span>
                            </div>
                        </div>
                        <a href="logout.php" class="btn btn-info btn-logout">Déconnexion</a>
                    <?php else: ?>
                        <!-- Si l'utilisateur n'est pas connecté, afficher un bouton de connexion -->
                        <hr>
                        <hr>
                        <a href="login.php" class="btn btn-info btn-logout ">Connexion</a>
                    <?php endif; ?>
                </aside>
                <div class="tasks-column w-100">
                    <header class="main-header">
                        <!-- Barre de recherche -->
                        <form action="index.php" method="get">
                            <div class="form-group">
                                <input type="text" class="form-input" id="name" name="query" placeholder="Rechercher..."
                                    required="" />
                            </div>
                        </form>
                        <!-- Filtre -->
                        <form action="index.php" method="get">
                            <div class="filter">
                                <select name="filter" id="filter" onchange="this.form.submit()">
                                    <option value="all" <?php if (isset($_GET['filter']) && $_GET['filter'] === 'all')
                                        echo 'selected'; ?>>Tout</option>
                                    <option value="completed" <?php if (isset($_GET['filter']) && $_GET['filter'] === 'completed')
                                        echo 'selected'; ?>>Terminé</option>
                                    <option value="uncompleted" <?php if (isset($_GET['filter']) && $_GET['filter'] === 'uncompleted')
                                        echo 'selected'; ?>>Non terminé</option>
                                </select>
                            </div>
                        </form>
                    </header>
                    <div class="tasks-wrapper">
                        <!-- Liste des tâches -->
                        <ul class="tasks-list">

                            <?php
                            if (isLoggedIn()) {
                                renderList($tasks);
                            }
                            ?>




                            <!-- Si l'utilisateur est connecté, afficher un bouton pour ajouter une nouvelle tâche -->
                            <li class="add-btn">
                                <a href="<?= isLoggedIn() ? 'new_task.php' : 'login.php' ?>"
                                    class="btn btn-success btn-logout">Ajouter une tâche</a>
                            </li>

                        </ul>
                        <div class="task-details">
                            <?php
                            // Gerer le button de effacer tache 
                            if (isset($_GET['deleted_task'])) {
                                $deletedTaskId = $_GET['deleted_task'];
                                echo "Tâche avec l'ID $deletedTaskId a été supprimée avec succès.";
                            }

                            // Si utilisateur veut acceder a tache de indexe non existant
                            if (isset($_GET['error'])) {
                                $error = $_GET['error'];
                                if ($error === 'task_not_found') {
                                    echo "La tâche que vous essayez de supprimer n'a pas été trouvée.";
                                }
                            }

                            // Details de tache avec index recu
                            if (isset($_GET['task']) && isLoggedIn()) {
                                $taskId = $_GET['task'];
                                if (!isset($tasks[$taskId])) {
                                    echo "Tâche non trouvée";
                                } else {
                                    $task = $tasks[$taskId];
                                    ?>
                                    <div class="task-details-header">
                                        <div class="details-info">
                                            <h4 class="title"><?= htmlspecialchars($task['title']); ?></h4>
                                            <div class="date">
                                                <img src="../img/calendar.svg" width="16" height="16" alt="Icône de date">
                                                Date - <?= htmlspecialchars($task['due_date']); ?>
                                            </div>
                                        </div>
                                        <div class="task-details-tools">
                                            <div class="badge-wrap">
                                                <span
                                                    class="badge <?= $badgeClass = getTaskBadge($task) ?>"><?= $task['status'] ?></span>
                                            </div>
                                            <a href="#" class="btn btn-icon btn-edit">
                                                <img src="../img/edit-2.svg" width="14" height="14" alt="Modifier">
                                            </a>
                                            <form action="delete.php" method="post">
                                                <!-- Formulaire pour supprimer la tâche -->
                                                <input type="hidden" name="id" value="<?= $taskId ?>">
                                                <button class="btn btn-icon btn-delete">
                                                    <img src="../img/trash.svg" width="14" height="14" alt="Supprimer">
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="task-details-body">
                                        <p><?= htmlspecialchars($task['body']); ?></p>
                                    </div>
                                    <?php
                                }
                            } else {
                                // Afficher un message si aucune tâche n'est sélectionnée
                                echo "<p>Aucune tâche sélectionnée.</p>";
                            }
                            ?>
                        </div>

                    </div>
                </div>
            </div>
    </main>
</body>

</html>