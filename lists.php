<?php require __DIR__ . '/app/autoload.php'; ?>
<?php require __DIR__ . '/views/header.php'; ?>
<?php
$statment = $database->query('SELECT * FROM posts');

$posts = $statment->fetchAll(PDO::FETCH_ASSOC);

foreach ($posts as $post) {
    echo $post['title'] . $post['content'] . '<br>';
}

$_POST['title'] = NULL;
$_POST['content'] = NULL;

if (isset($_POST['title'], $_POST['content'])) {
    $author_id = 6;


    $query =
        'INSERT INTO posts (title, content, author_id)
        VALUES (:title, :content, :author_id)';

    $insert = $database->prepare($query);

    $insert->bindParam(':title', $_POST['title'], PDO::PARAM_STR);
    $insert->bindParam(':content', $_POST['content'], PDO::PARAM_STR);
    $insert->bindParam(':author_id', $author_id, PDO::PARAM_INT);

    $insert->execute();


    //Resetting _POST
}
?>

<main>
    <h1>Task list</h1>

    <form action="" method="post">
        <div class="mb-3">
            <label for="title">title</label>
            <input class="" type="title" name="title" id="title" placeholder="title" required>
        </div>

        <div class="mb-3">
            <label for="content">content</label>
            <input class="" type="content" name="content" id="content" required>
        </div>

        <button type="submit" class="btn btn-primary">submit</button>
    </form>

    <script src="list.js"></script>
</main>

<?php require __DIR__ . '/views/footer.php'; ?>
