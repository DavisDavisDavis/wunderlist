<?php require __DIR__ . '/app/autoload.php'; ?>
<?php require __DIR__ . '/views/header.php'; ?>

<article class="profile">
    <h1>Profile</h1>

    <form action="/app/posts/upload_img.php" method="post" enctype="multipart/form-data">
        <h2>Change profile picture 📸</h2>

        <img class="profile_picture" src="<?= '/app/posts/img/' . $_SESSION['email'] . '.png'; ?>" alt="">
        <div>
            <label for="profile">Upload a profile picture</label>
            <input type="file" name="profile" id="profile" required>
        </div>

        <button type="submit">Upload</button>
    </form>

    <form action="app/posts/update.php" method="post">
        <h2>Change profile information 📝</h2>

        <div class="mb-3">
            <label for="email">Name</label>
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

        <button type="submit" class="btn btn-primary">Change</button>
    </form>
</article>



<?php require __DIR__ . '/views/footer.php'; ?>
