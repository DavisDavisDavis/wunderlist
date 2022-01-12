<?php

declare(strict_types=1);

function redirect(string $path)
{
    header("Location: ${path}");
    exit;
}

function date_today(): string
{
    $date_today = new DateTime('NOW');
    $date_today_formated = $date_today->format('Y-m-d');
    return $date_today_formated;
}

function task_completed($list)
{
    if ($list['completed'] == 'yes') {
        return "💖 completed" . '<br>';
    }
}

function display_task($list, $_POST, $select_display)
{
    if ($_POST['select_display'] == $select_display) {
        # code...
    }
}



<?php if ($_POST['select_display'] == 'today') : ?>
    <?php if ($list['deadline'] == date_today()) : ?>
        <?= $list['title'] . ': ' . $list['description'] ?>
        <?= task_completed($list) ?>
    <?php endif; ?>
<?php endif; ?>
