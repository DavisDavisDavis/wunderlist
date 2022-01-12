<?php require __DIR__ . '/app/autoload.php'; ?>
<?php require __DIR__ . '/views/header.php'; ?>

<article>
    <h1>Sign up</h1>

    <form action="app/users/register.php" method="post">

        <div class="mb-3">
            <label for="name">Name</label>
            <input class="form-control" type="name" name="name" id="name" placeholder="name" required>
            <small class="form-text">Please provie your name</small>
        </div>

        <div class="mb-3">
            <label for="email">Email</label>
            <input class="form-control" type="email" name="email" id="email" placeholder="uwu@gmail.com" required>
            <small class="form-text">Please provide the your email address.</small>
        </div>

        <div class="mb-3">
            <label for="password">Password</label>
            <input class="form-control" type="password" name="password" id="password" required>
            <small class="form-text">Please provide the your password (passphrase).</small>
        </div>

        <button type="submit" class="btn btn-primary">Login</button>
    </form>
</article>

<?php require __DIR__ . '/views/footer.php'; ?>