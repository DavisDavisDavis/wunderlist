<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#"><?php echo $config['title']; ?></a>

    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" href="/index.php">Home</a>
        </li>

        <?php if (isset($_SESSION['email'])) : ?>
            <li>
                <a href="/lists.php">Lists</a>
            </li>

            <li>
                <a href="/profile.php">Profile</a>
            </li>

            <li>
                <a class="nav-link" href="/app/users/logout.php">Logout</a>
            </li>

        <?php else : ?>
            <li>
                <a class="nav-link" href="/login.php">Login</a>
            </li>
        <?php endif; ?>
    </ul>
</nav>
