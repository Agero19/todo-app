<!-- Sidebar -->
<aside class="sidebar">


    <div class="avatar">

        <!-- User default avatar -->
        <img class="user-image" src="img/avatar-photo.avif" alt="Avatar">

        <!-- User have picture -->
        <!-- <img class="user-icon"
        src="/img/user.svg"
        alt="Avatar"> -->
    </div>

    <h2><?= $_SESSION['username'] ?? 'Guest' ?></h2>

    <?php if (isset($_SESSION['username'])): ?>
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

        <a href="#" class="btn btn-info btn-logout">
            Logout
        </a>

    <?php else: ?>
        <!-- TODO: Styling for guest user in the sidebar. -->

        <a href="/login" class="btn btn-info btn-logout">
            Login
        </a>

    <?php endif; ?>

</aside>