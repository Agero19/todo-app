<main>
    <div <div style='justify-content: center; align-items: center; height: 90vh; margin: auto;'>
        <h1 style="text-align: center;">Create a new task</h1>

        <form action="#" method="post" style='display: grid;'>
            <div>
                <label for="title">Title</label>
                <input type="text" id="title" name="title" required>
                <!-- Added name="title" attribute -->
            </div>
            <div>
                <label for="body">Description</label>
                <textarea name="body" id="body"></textarea>
            </div>
            <div>
                <label for="status">Status</label>
                <select name="status" id="status" required>
                    <option value="to do">To Do</option>
                    <option value="in progress">In Progress</option>
                    <option value="completed">Completed</option>
                </select>
            </div>
            <div>
                <label for="due_date" required>Due</label>
                <input type="date" name="due_date" id="due_date">
                <!-- Added name="due_date" attribute -->
            </div>


            <button type="submit" class="btn btn-success btn-logout">
                Create
            </button>
        </form>
    </div>
</main>