<?php require __DIR__ . '/app/autoload.php'; ?>
<?php require __DIR__ . '/views/header.php'; ?>

<article class="index">
    <?php if (isset($_SESSION['email'])) : ?>
        <h1>💖 Welcome to wunderlist! 💖</h1>
        <p>You are logged in</p>
    <?php endif; ?>
    <?php if (isset($_SESSION['email']) === false) : ?>
        <h1><?php echo '✨ ' . $config['title'] . ' ✨'; ?></h1>
        <p>To do list!</p>
    <?php endif; ?>

    <img src="https://i.pinimg.com/originals/b6/aa/45/b6aa456d67464a2f6a1f19d3a3efbd2d.gif" alt="">
</article>

<?php require __DIR__ . '/views/footer.php'; ?>
