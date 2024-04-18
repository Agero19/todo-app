<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport"
    content="width=device-width, initial-scale=1.0">
  <title>Todo App - Platon Motulko</title>

  <!-- Styles -->
  <link rel="stylesheet"
    href="css/styles.css">

  <!-- Google fFont Import -->
  <link rel="preconnect"
    href="https://fonts.googleapis.com">
  <link rel="preconnect"
    href="https://fonts.gstatic.com"
    crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap"
    rel="stylesheet">
</head>

<body>
  <main>
    <div class="container ">
      <div class="main-wrapper">

        <!-- Sidebar -->
        <aside class="sidebar">

          <a href="login.php"
            class="btn btn-info btn-logout">
            Login
          </a>
        
        </aside>

        <!-- Main Content -->
        <div class="tasks-column w-100">
          <header class="main-header">
            <!-- Search -->
            <form action="">
              <div class="form-group">
                <input type="text"
                  class="form-input"
                  id="name"
                  placeholder="Search..."
                  required="" />
              </div>
            </form>

            <!-- Filter -->
            <div class="filter">
              <select name="filter"
                id="filter">
                <option value="all">All</option>
                <option value="completed">Completed</option>
                <option value="uncompleted">Uncompleted</option>
              </select>
            </div>

          </header>

          <div class="tasks-wrapper">

            <!-- Tasks List -->
            <ul class="tasks-list">
              

              <li class="add-btn">
                <a href="#"
                  class="btn btn-success btn-logout">
                  Add Task
                </a>
              </li>

            </ul>

            <!-- Task Details -->
            <div class="task-details">


            </div>
          </div>

        </div>

      </div>
    </div>
  </main>
</body>

</html>

