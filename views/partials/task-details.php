<div class="task-details">

    <?php if ($_SERVER['REQUEST_METHOD'] === 'POST'): ?>
        <?php
        // Handle task deletion if the request method is POST
        $db->querry('DELETE FROM todos WHERE id = :id AND user_id = :user_id', [
            'id' => $_POST['id'],
            'user_id' => 1,
        ]);
        echo 'Task deleted';
        ?>
    <?php elseif (isset($_GET['task'])): ?>
        <?php
        // Display task details if a task is selected via GET parameter
        $taskId = $_GET['task'];
        $query = "SELECT * FROM todos WHERE id = :taskId";
        $task = $db->querry($query, ['taskId' => $taskId])->fetch();

        if (!$task) {
            abort(404); // Assuming abort() function handles HTTP error responses
        }

        $currentUserId = 1;

        if ($task['user_id'] != $currentUserId) {
            abort(403); // Assuming abort() function handles HTTP error responses
        }

        // Determine the appropriate CSS class for the badge based on task status
        switch ($task['status']) {
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

        <div class="task-details-header">
            <div class="details-info">
                <h4 class="title"><?= htmlspecialchars($task['title']); ?></h4>
                <div class="date">
                    <img src="img/calendar.svg" width="16" height="16" alt="Date icon">
                    Due - <?= htmlspecialchars($task['due_date']); ?>
                </div>
            </div>
            <div class="task-details-tools">
                <div class="badge-wrap">
                    <span class="badge <?= $badgeClass ?>"><?= $task['status'] ?></span>
                </div>
                <a href="#" class="btn btn-icon btn-edit">
                    <img src="img/edit-2.svg" width="14" height="14" alt="Edit">
                </a>
                <form action="" method="post">
                    <input type="hidden" name="id" value="<?= $task['id'] ?>">
                    <button class="btn btn-icon btn-delete">
                        <img src="img/trash.svg" width="14" height="14" alt="Remove">
                    </button>
                </form>
            </div>
        </div>
        <div class="task-details-body">
            <p><?= htmlspecialchars($task['body']); ?></p>
        </div>
    <?php else: ?>
        <!-- Display a message if no task is selected -->
        <p>No task selected.</p>
    <?php endif; ?>
</div>