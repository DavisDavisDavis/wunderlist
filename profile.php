<?php require __DIR__ . '/app/autoload.php'; ?>
<?php require __DIR__ . '/views/header.php'; ?>

<article>
    <h1>Profile</h1>

    <?php if (isset($_SESSION['email'])) : ?>
        <h2><?= $_SESSION['name'] ?></h2>
        <h2><?= $_SESSION['email'] ?></h2>
        <h2><?= $_SESSION['email'] ?></h2>
        <a href="/edit.php">Edit profile</a>
    <?php endif; ?>

    <form action="/app/posts/upload_img.php" method="post" enctype="multipart/form-data">
        <div>
            <label for="profile">Upload a profile picture</label>
            <input type="file" name="profile" id="profile" required>
        </div>

        <button type="submit">Upload</button>
    </form>

    <form action="app/posts/update.php" method="post">

        <div class="mb-3">
            <label for="email">Name</label>
            <input class="form-control" type="name" name="name" id="name" placeholder="name" required>
            <small class="form-text">Please provide the your email address.</small>
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
