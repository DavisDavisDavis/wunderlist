<?php require __DIR__ . '/app/autoload.php'; ?>
<?php require __DIR__ . '/views/header.php'; ?>
<?php
$tasks = statement_fetchAll($database, 'tasks');
$lists = statement_fetchAll($database, 'lists');

if (isset($_POST['select_display']) === false) {
    $_POST['select_display'] = 'none';
}

// If not signed in, redirect to start-page
if (!isset($_SESSION['email'])) {
    redirect('/index.php');
}
?>


<main class="tasks">
    <h1>Task list</h1>
    <?= date_today(); ?>

    <ul id="button_list" class="button_list">
        <button>Create Task ⭐️</button>
        <button>Create Page 📀</button>
        <button>Update Task ✨</button>
        <button>Delete Task 🔥</button>
    </ul>

    <form action="/app/posts/store.php" method="POST">
        <h2>Create a list 📀</h2>

        <div class="mb-3">
            <label for="title">title</label>
            <input class="" type="" name="list_name" id="list_name" placeholder="title list" required>
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
            <label for="lists">Select page</label>
            <select class="" name="select_page">
                <optgroup label="lists">
                    <?php foreach ($lists as $list) : ?>
                        <?php if ($list['user_id'] == $_SESSION['email']) : ?>
                            <option value="<?= $list['id']; ?>"><?= $list['list_title']; ?></option>
                        <?php endif; ?>
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
            <label for="lists">Select task</label>
            <select class="" name="task_id">
                <optgroup label="Tasks">
                    <?php foreach ($tasks as $list) : ?>
                        <?php if ($list['user_id'] == $_SESSION['email']) : ?>
                            <option value="<?= $list['id']; ?>"><?= $list['title']; ?></option>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </optgroup>
            </select>
            <button type="submit">Edit</button>
        </div>
    </form>

    <form action="/app/posts/delete.php" method="POST">
        <h2>Delete task 🔥</h2>

        <div>
            <label for="lists">Select task</label>
            <select class="" name="delete_task">
                <optgroup label="Tasks">
                    <?php foreach ($tasks as $list) : ?>
                        <?php if ($list['user_id'] == $_SESSION['email']) : ?>
                            <option value="<?= $list['id']; ?>"><?= $list['title']; ?></option>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </optgroup>
            </select>
            <button type="submit">Delete</button>
        </div>
    </form>

    <form action="" method="POST">
        <label for="select">Display</label>
        <select name="select_display" id="">
            <option value="none">All</option>
            <option value="today">Today</option>
        </select>

        <button type="submit">Select</button>
    </form>

    <?php foreach ($lists as $list) : ?>
        <?php if ($list['user_id'] == $_SESSION['email']) : ?>
            <h2><?= $list['list_title'] ?></h2>
            <?php foreach ($tasks as $task) : ?>
                <div>
                    <?php if ($task['task_id'] == $list['id']) : ?>
                        <?= display_task($task, $_POST['select_display']); ?>
                    <?php endif; ?>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    <?php endforeach; ?>

    <script src="/assets/scripts/list.js"></script>
</main>

<?php require __DIR__ . '/views/footer.php'; ?>
