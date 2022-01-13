<?php

declare(strict_types=1);

function redirect(string $path)
{
    header("Location: ${path}");
    exit;
}

function statement_fetchAll($database, $item)
{
    $query = 'SELECT * FROM ' . $item;

    $statment = $database->query($query);
    return $statment->fetchAll(PDO::FETCH_ASSOC);
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
        return " 💖 completed 💖" . '<br>';
    }
}

function display_task($list, $select_display)
{
    if ($list['user_id'] == $_SESSION['email']) {
        if ($select_display == 'none') {
            echo $list['title'] . ' ' . $list['description'];
            echo task_completed($list);
        } elseif ($list['deadline'] == date_today()) {
            echo $list['title'] . ' ' . $list['description'];
            echo task_completed($list);
        }
    }
}
