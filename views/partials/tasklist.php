<!-- Tasks List -->
<ul class="tasks-list">
    <?php if (count($todos) > 0): ?>
        <?php foreach ($todos as $todo): ?>
            <li class="task-item">
                <!-- TODO: Active task class for those which is clicked -->
                <a href="?task=<?= $todo['id'] ?>" class="task active">
                    <div class="icon">
                        <img src="img/check-circle.svg" alt="Checked">
                    </div>
                    <div class="text">
                        <h4><?= htmlspecialchars($todo['title']); ?></h4>
                        <div class="date">Due - <?= htmlspecialchars($todo['due_date']); ?></div>
                    </div>

                    <?php
                    // Determine the appropriate CSS class for the badge based on task status
                    switch ($todo['status']) {
                        case 'to do':
                            $badgeClass = 'info';
                            break;
                        case 'in progress':
                            $badgeClass = 'warning';
                            break;
                        case 'completed':
                            $badgeClass = 'success';
                            break;
                        default:
                            $badgeClass = 'info'; // Default to 'info' if status is unknown
                            break;
                    }
                    ?>


                    <span class="badge <?= $badgeClass ?>"> <?= $todo['status'] ?> </span>
                </a>
            </li>
        <?php endforeach; ?>
    <?php else: ?>
        <!-- TODO: Styling for absence of tasks -->
        <div>
            User has no tasks
        </div>
    <?php endif; ?>
    <li class="add-btn">
        <a href="/add" class="btn btn-success btn-logout">
            Add Task
        </a>
    </li>

</ul>