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

          <div class="avatar">

            <!-- User default avatar -->
            <img class="user-image"
              src="public/img/avatar-photo.avif"
              alt="Avatar">

            <!-- User have picture -->
            <!-- <img class="user-icon"
              src="public/img/user.svg"
              alt="Avatar"> -->
          </div>

          <h2>Platon Motulko</h2>

          <div class="stats">
            <div class="stats-item">
              <span>ToDo</span>
              <span>5</span>
            </div>
            <div class="stats-item">
              <span>In Progress</span>
              <span>3</span>
            </div>
            <div class="stats-item">
              <span>Done</span>
              <span>2</span>
            </div>
          </div>

          <a href="login.php"
            class="btn btn-info btn-logout">
            Login
          </a>
          <a href="#"
            class="btn btn-info btn-logout">
            Logout
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
              <li class="task-item">
                <a href="#"
                  class="task">
                  <div class="icon">
                    <img src="public/img/check-circle.svg"
                      alt="Checked">
                  </div>
                  <div class="text">
                    <h4>Task Title</h4>
                    <div class="date">Due - 24 may 2024</div>
                  </div>

                  <span class="badge success">Success</span>
                </a>
              </li>
              <li class="task-item">
                <a href="#"
                  class="task">
                  <div class="icon">
                    <img src="public/img/check-circle.svg"
                      alt="Checked">
                  </div>
                  <div class="text">
                    <h4>Task Title</h4>
                    <div class="date">Due - 24 may 2024</div>
                  </div>

                  <span class="badge info">Success</span>
                </a>
              </li>
              <li class="task-item">
                <a href="#"
                  class="task">
                  <div class="icon">
                    <img src="public/img/check-circle.svg"
                      alt="Checked">
                  </div>
                  <div class="text">
                    <h4>Task Title</h4>
                    <div class="date">Due - 24 may 2024</div>
                  </div>

                  <span class="badge danger">Success</span>
                </a>
              </li>
              <li class="task-item">
                <a href="#"
                  class="task">
                  <div class="icon">
                    <img src="public/img/check-circle.svg"
                      alt="Checked">
                  </div>
                  <div class="text">
                    <h4>Task Title</h4>
                    <div class="date">Due - 24 may 2024</div>
                  </div>

                  <span class="badge success">Success</span>
                </a>
              </li>
              <li class="task-item">
                <a href="#"
                  class="task">
                  <div class="icon">
                    <img src="public/img/check-circle.svg"
                      alt="Checked">
                  </div>
                  <div class="text">
                    <h4>Task Title</h4>
                    <div class="date">Due - 24 may 2024</div>
                  </div>

                  <span class="badge warning">Success</span>
                </a>
              </li>

              <li class="add-btn">
                <a href="#"
                  class="btn btn-success btn-logout">
                  Add Task
                </a>
              </li>

            </ul>

            <!-- Task Details -->
            <div class="task-details">

              <div class="task-details-header">
                <h2>Task Title</h2>

                <div class="task-details-tools">
                  <a href="#"
                    class="btn btn-icon btn-edit">
                    <img src="public/img/edit-2.svg"
                      alt="Edit">
                  </a>

                  <a href="#"
                    class="btn btn-icon btn-delete">
                    <img src="public/img/trash.svg"
                      alt="Remove">
                  </a>
                </div>
              </div>

              <div class="task-details-body">
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quos sunt, tempora assumenda corporis, minus
                  voluptates eligendi inventore possimus iusto accusamus vero quod maxime aspernatur sed architecto
                  voluptas quia rem odio?</p>
              </div>

            </div>
          </div>

        </div>

      </div>
    </div>
  </main>
</body>

</html>

