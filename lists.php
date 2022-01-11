<?php require __DIR__ . '/app/autoload.php'; ?>
<?php require __DIR__ . '/views/header.php'; ?>
<?php
$statment_lists = $database->query('SELECT * FROM lists');

$lists = $statment_lists->fetchAll(PDO::FETCH_ASSOC);

$_POST['title'] = NULL;
$_POST['description'] = NULL;
$_POST['completed'] = NULL;
$_POST['deadline'] = NULL;

if (isset($_POST['title'], $_POST['content'])) {
    echo "it went through 💖";


    $_POST['lists_id'] = 3;


    $query =
        'INSERT INTO lists (lists_id, user_id, title, description, completed, deadline)
        VALUES (:lists_id, :user_id, :title, :content, :completed, :deadline);';

    $insert = $database->prepare($query);

    $insert->bindParam(':lists_id', $_POST['lists_id'], PDO::PARAM_STR);
    $insert->bindParam(':user_id', $_SESSION['email'], PDO::PARAM_STR);
    $insert->bindParam(':title', $_POST['title'], PDO::PARAM_STR);
    $insert->bindParam(':content', $_POST['content'], PDO::PARAM_STR);
    $insert->bindParam(':deadline', $_POST['deadline'], PDO::PARAM_STR);

    $insert->bindParam(':completed', $_POST['complete'], PDO::PARAM_BOOL);

    // if ($_POST['completed']) {
    //     $insert->bindParam(':completed', true, PDO::PARAM_BOOL);
    // } else {
    //     $insert->bindParam(':completed', false, PDO::PARAM_BOOL);
    // }

    // $insert->bindParam(':author_id', $author_id, PDO::PARAM_INT);

    $insert->execute();

    //Resetting _POST
}

if (isset($_POST['page_name'])) {
    echo "it went through 💖";

    $query_page = 'INSERT INTO pages(user_id, page_title)
    VALUES (:user_id, :page_title);';

    $insert_pages = $database->prepare($query_page);

    $insert_pages->bindParam(':user_id', $_SESSION['email'], PDO::PARAM_STR);
    $insert_pages->bindParam(':page_title', $_POST['page_name'], PDO::PARAM_STR);

    $insert_pages->execute();
}

?>

<main>
    <h1>Task list</h1>

    <form action="" method="POST">
        <h2>Create a page</h2>

        <div class="mb-3">
            <label for="title">title</label>
            <input class="" type="" name="page_name" id="page_name" placeholder="title page" required>
        </div>

        <button type="submit" class="btn btn-primary">submit</button>
    </form>

    <?php foreach ($lists as $list) : ?>
        <div>
            <?= $list['title'] . " " . $list['description'] . '<br>'; ?>
            <input type="checkbox" name="completed">
            <label for="checkbox">completed</label>
        </div>
    <?php endforeach; ?>

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
            <label for="checkbox">deadline</label>
            <input type="date" name="deadline">
        </div>


        <button type="submit" class="btn btn-primary">submit</button>
    </form>

    <script src="list.js"></script>
</main>

<?php require __DIR__ . '/views/footer.php'; ?>
