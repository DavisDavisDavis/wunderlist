<?php require __DIR__ . '/app/autoload.php'; ?>
<?php require __DIR__ . '/views/header.php'; ?>

<article class="register">
    <h1>Sign up</h1>

    <form action="app/users/register.php" method="post">
        <h2>What's your name? 🔐</h2>

        <div class="mb-3">
            <label for="name">Name</label>
            <input class="form-control" type="name" name="name" id="name" required>
        </div>

        <div class="mb-3">
            <label for="email">Email</label>
            <input class="form-control" type="email" name="email" id="email" required>
        </div>

        <div class="mb-3">
            <label for="password">Password</label>
            <input class="form-control" type="password" name="password" id="password" required>
        </div>

        <button type="submit" class="btn btn-primary">Sign up</button>
    </form>
</article>

<?php require __DIR__ . '/views/footer.php'; ?>
