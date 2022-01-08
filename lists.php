<?php require __DIR__ . '/app/autoload.php'; ?>
<?php require __DIR__ . '/views/header.php'; ?>
<?php
$statment = $database->query('SELECT * FROM lists');

$posts = $statment->fetchAll(PDO::FETCH_ASSOC);

foreach ($posts as $post) {
    echo $post['title'] . $post['content'] . '<br>';
}

// $_POST['title'] = NULL;
// $_POST['content'] = NULL;
// $_POST['completed'] = NULL;
// $_POST['deadline'] = NULL;


if (isset($_POST['title'], $_POST['content'])) {
    echo "it went through 💖";



    $query =
        'INSERT INTO lists (lists_id, user_id, title, description, completed, deadline)
        VALUES (:lists_id, :user_id, :title, :content, :completed, :deadline)';

    $insert = $database->prepare($query);

    $insert->bindParam(':lists_id', $_POST['lists_id'], PDO::PARAM_STR);
    $insert->bindParam(':user_id', $_POST['user_id'], PDO::PARAM_STR);
    $insert->bindParam(':title', $_POST['title'], PDO::PARAM_STR);
    $insert->bindParam(':content', $_POST['content'], PDO::PARAM_STR);
    $insert->bindParam(':completed', $_POST['completed'], PDO::PARAM_BOOL);
    $insert->bindParam(':deadline', $_POST['deadline'], PDO::PARAM_STR);

    // $insert->bindParam(':author_id', $author_id, PDO::PARAM_INT);

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

        <div>
            <label for="checkbox">completed</label>
            <input type="checkbox" name="completed">
        </div>

        <div>
            <label for="checkbox">deadline</label>
            <input type="date" name="deadline">
        </div>


        <button type="submit" class="btn btn-primary">submit</button>
    </form>

    <script src="list.js"></script>
</main>

<?php require __DIR__ . '/views/footer.php'; ?>
