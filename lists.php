<?php require __DIR__ . '/app/autoload.php'; ?>
<?php require __DIR__ . '/views/header.php'; ?>

<?php

$statment_lists = $database->query('SELECT * FROM lists');
$lists = $statment_lists->fetchAll(PDO::FETCH_ASSOC);
$statment_pages = $database->query('SELECT * FROM pages');
$pages = $statment_pages->fetchAll(PDO::FETCH_ASSOC);

?>
<?php foreach ($pages as $page) : ?>
    <h2><?php
        echo $page['id'];
        echo $page['page_title']; ?>
    </h2>
<?php endforeach; ?>


<main>
    <h1>Task list</h1>

    <form action="/app/posts/store.php" method="POST">
        <h2>Create a page</h2>

        <div class="mb-3">
            <label for="title">title</label>
            <input class="" type="" name="page_name" id="page_name" placeholder="title page" required>
        </div>

        <button type="submit" class="btn btn-primary">submit</button>
    </form>

    <?php foreach ($pages as $page) : ?>
        <h2><?= $page['page_title'] ?></h2>
        <?php foreach ($lists as $list) : ?>
            <div>
                <?php
                if ($list['lists_id'] == $page['id']) {
                    echo $list['title'] . " " . $list['description'];
                    if ($list['completed'] == 'yes') {
                        echo "💖 completed" . '<br>';
                    }
                }
                ?>
            </div>
        <?php endforeach; ?>
    <?php endforeach; ?>

    <form action="/app/posts/store.php" method="post">
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

        <label for="pages">Select page</label>
        <select class="" name="select_page">
            <option disabled selected value>Add</option>
            <?php foreach ($pages as $page) : ?>
                <option value="<?= $page['id']; ?>"><?= $page['page_title']; ?></option>
            <?php endforeach; ?>
        </select>


        <button type="submit" class="btn btn-primary">submit</button>
    </form>

    <form action="/app/posts/update.php" method="POST">
        <div class="mb-3">
            <label for="title">edit</label>
            <input class="" type="title" name="title" id="title" placeholder="title">
        </div>

        <div class="mb-3">
            <label for="content">content</label>
            <input class="" type="content" name="content" id="content">
        </div>

        <div>
            <label for="checkbox">deadline</label>
            <input type="date" name="deadline">
        </div>

        <input type="checkbox" name="completed">
        <label for="checkbox">completed</label>

        <input type="number" name="task_id">
        <button type="submit">Edit</button>
    </form>

    <form action="/app/posts/delete.php" method="POST">
        <input type="number" name="delete_task">
        <button type="submit">Delete</button>
    </form>

    <script src="list.js"></script>
</main>

<?php require __DIR__ . '/views/footer.php'; ?>
