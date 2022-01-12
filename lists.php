<?php require __DIR__ . '/app/autoload.php'; ?>
<?php require __DIR__ . '/views/header.php'; ?>

<?php

$statment_lists = $database->query('SELECT * FROM lists');
$lists = $statment_lists->fetchAll(PDO::FETCH_ASSOC);
$statment_pages = $database->query('SELECT * FROM pages');
$pages = $statment_pages->fetchAll(PDO::FETCH_ASSOC);

?>


<main>
    <h1>Task list</h1>
    <?= date_today(); ?>

    <form action="" method="POST">
        <label for="select">Display:</label>
        <select name="select_display" id="">
            <option value="none">All</option>
            <option value="today">Today</option>
        </select>

        <button type="submit">Select</button>
    </form>

    <?php foreach ($pages as $page) : ?>
        <h2><?= $page['page_title'] ?></h2>
        <?php foreach ($lists as $list) : ?>
            <div>
                <?php if ($list['lists_id'] == $page['id']) : ?>

                    <?php if (isset($_POST['select_display'])) : ?>
                        <?php if ($_POST['select_display'] == 'today') : ?>
                            <?php if ($list['deadline'] == date_today()) : ?>
                                <?= $list['title'] . ': ' . $list['description'] ?>
                                <?= task_completed($list) ?>
                            <?php endif; ?>
                        <?php endif; ?>
                        <?php if ($_POST['select_display'] == 'none') : ?>
                            <?= $list['title'] . ': ' . $list['description'] ?>
                            <?= task_completed($list) ?>
                        <?php endif; ?>
                    <?php endif; ?>
                <?php endif; ?>
            </div>
        <?php endforeach; ?>
    <?php endforeach; ?>



    <form action="/app/posts/store.php" method="POST">
        <h2>Create a page 📀</h2>

        <div class="mb-3">
            <label for="title">title</label>
            <input class="" type="" name="page_name" id="page_name" placeholder="title page" required>
        </div>

        <div>
            <button type="submit" class="btn btn-primary">submit</button>
        </div>
    </form>

    <form action="/app/posts/store.php" method="post">
        <h2>Create task 💖</h2>

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

        <div>
            <label for="pages">Select page</label>
            <select class="" name="select_page">
                <optgroup label="Pages">
                    <?php foreach ($pages as $page) : ?>
                        <option value="<?= $page['id']; ?>"><?= $page['page_title']; ?></option>
                    <?php endforeach; ?>
                </optgroup>
            </select>
        </div>

        <div>
            <button type="submit" class="btn btn-primary">submit</button>
        </div>
    </form>

    <form action="/app/posts/update.php" method="POST">
        <h2>Update 🐱</h2>

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

        <div>
            <input type="checkbox" name="completed">
            <label for="checkbox">completed</label>
        </div>

        <div>
            <input type="number" name="task_id">
            <button type="submit">Edit</button>
        </div>
    </form>

    <form action="/app/posts/delete.php" method="POST">
        <h2>Delete task 🔥</h2>

        <div>
            <input type="number" name="delete_task">
            <button type="submit">Delete</button>
        </div>
    </form>

    <script src="list.js"></script>
</main>

<?php require __DIR__ . '/views/footer.php'; ?>
