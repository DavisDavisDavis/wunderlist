<?php require __DIR__ . '/app/autoload.php'; ?>
<?php require __DIR__ . '/views/header.php'; ?>

<article class="login">
    <h1>Login</h1>

    <form action="app/users/login.php" method="post">
        <h2>Just fill in your information ⭐️</h2>

        <div class="mb-3">
            <label for="email">Email</label>
            <input class="form-control" type="email" name="email" id="email" required>
        </div>

        <div class="mb-3">
            <label for="password">Password</label>
            <input class="form-control" type="password" name="password" id="password" required>
        </div>

        <button type="submit" class="btn btn-primary">Login</button>

        <a href="/register.php">
            <p>Click here to sign up</p>
        </a>
    </form>
</article>

<?php require __DIR__ . '/views/footer.php'; ?>
