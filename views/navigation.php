<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#"><?php echo $config['title']; ?></a>

    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" href="/index.php">Home</a>
        </li>

        <li>
            <a href="/lists.php">Lists</a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="/views/about.php">About</a>
        </li>

        <li>
            <a href="/profile.php">Profile</a>
        </li>

        <li class="nav-item">
            <?php if (isset($_SESSION['user'])) : ?>
                <a class="nav-link" href="/app/users/logout.php">Logout</a>
            <?php else : ?>
                <a class="nav-link" href="/login.php">Login</a>
            <?php endif; ?>
        </li>
    </ul>
</nav>
