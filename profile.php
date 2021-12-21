<?php require __DIR__ . '/app/autoload.php'; ?>
<?php require __DIR__ . '/views/header.php'; ?>

<main>
    <h1>Profile</h1>

    <form action="" method="post">
        <div class="mb-3">
            <label for="avatar">Upload a new fun profile picture 💖</label>
            <input class="" type="file" name="avatar" id="avatar" required>
        </div>

        <button type="submit">upload</button>
    </form>

    <script src="list.js"></script>
</main>

<?php require __DIR__ . '/views/footer.php'; ?>
