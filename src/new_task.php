<?php
// Vérifie si une erreur de connexion s'est produite
if (isset($_GET['error']) && $_GET['error'] === 'missing_fields') {
    echo "<p style='color: red;'>Champs obligatoires sont manquants. Reesayer.</p>";
}
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
                <div class="container h-100 task-form-wrap">
                    <div class="task-form">
                        <h1 class="mb-4">Ajouter Tache</h1>
                        <form action="new_task_logic.php" method="post">
                            <div class="mb-3">
                                <label for="title" class="form-label">Nom</label>
                                <input type="text" class="form-control" id="title" name="title" />
                            </div>

                            <div class="mb-3">
                                <label for="body" class="form-label">Description</label>
                                <textarea class="form-control" id="body" rows="3" name="body"></textarea>
                            </div>

                            <div class="mb-3">
                                <label for="due_date" class="form-label">Date limite</label>
                                <input type="date" class="form-control" id="due_date" name="due_date" />
                            </div>

                            <div class="mb-3">
                                <label for="taskStatus" class="form-label mb-1 d-block">Etat</label>

                                <div class="form-check mb-1">
                                    <input class="form-check-input" type="radio" name="taskStatus"
                                        id="taskStatusNotStarted" value="not-started" checked />
                                    <label class="form-check-label" for="taskStatusNotStarted">A faire</label>
                                </div>

                                <div class="form-check mb-1">
                                    <input class="form-check-input" type="radio" name="taskStatus"
                                        id="taskStatusInProgress" value="in-progress" />
                                    <label class="form-check-label" for="taskStatusInProgress">En Cours</label>
                                </div>

                                <div class="form-check mb-1">
                                    <input class="form-check-input" type="radio" name="taskStatus"
                                        id="taskStatusCompleted" value="completed" />
                                    <label class="form-check-label" for="taskStatusCompleted">Termine</label>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-info w-100">
                                Ajouter
                            </button>
                        </form>
                    </div>
                </div>
            </div>
    </main>
</body>

</html>