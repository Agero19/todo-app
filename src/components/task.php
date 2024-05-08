<li class="task-item">
    <!-- Affichage de chaque tâche avec son titre, sa date d'échéance et son état -->
    <a href="?task=<?= $index ?>&filter=<?= isset($_GET['filter']) ? $_GET['filter'] : 'all' ?>&query=<?= isset($_GET['query']) ? $_GET['query'] : '' ?>"
        class="task <?= activeTask($index) ?>">
        <div class="icon">
            <img src="../img/check-circle.svg" alt="Checked">
        </div>
        <div class="text">
            <h4><?= htmlspecialchars($task['title']); ?></h4>
            <div class="date">Date - <?= htmlspecialchars($task['due_date']); ?></div>
        </div>

        <span class="badge <?= $badgeClass = getTaskBadge($task) ?>"> <?= $task['status'] ?>
        </span>
    </a>
</li>