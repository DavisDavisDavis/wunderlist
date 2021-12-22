<?php require __DIR__ . '/app/autoload.php'; ?>
<?php require __DIR__ . '/views/header.php'; ?>

<?php
//Resetting _FILES
$_POST['title'] = NULL;

if (isset($_FILES['avatar'])) {
    $statment = $database->query('SELECT name FROM users');
    $names = $statment->fetch(PDO::FETCH_ASSOC);

    echo $names['name'];

    $avatar = $_FILES['avatar'];

    die(var_dump($avatar['tmp_name']));

    move_uploaded_file($avatar['tmp_name'], __DIR__ . '/' . $names);
}



?>


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
