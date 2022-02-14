<?php

declare(strict_types=1);

require __DIR__ . '/../autoload.php';

// In this file we store/insert new posts in the database.

if (isset($_POST['title'], $_POST['content'])) {
    echo "it went through 💖";


    $query =
        'INSERT INTO tasks (task_id, user_id, title, description, completed, deadline)
        VALUES (:task_id, :user_id, :title, :content, :completed, :deadline);';

    $insert = $database->prepare($query);

    $insert->bindParam(':task_id', $_POST['select_page'], PDO::PARAM_STR);
    $insert->bindParam(':user_id', $_SESSION['email'], PDO::PARAM_STR);
    $insert->bindParam(':title', $_POST['title'], PDO::PARAM_STR);
    $insert->bindParam(':content', $_POST['content'], PDO::PARAM_STR);
    $insert->bindParam(':deadline', $_POST['deadline'], PDO::PARAM_STR);


    // if ($_POST['completed']) {
    //     $insert->bindParam(':completed', true, PDO::PARAM_BOOL);
    // } else {
    //     $insert->bindParam(':completed', false, PDO::PARAM_BOOL);
    // }

    // $insert->bindParam(':author_id', $author_id, PDO::PARAM_INT);

    $insert->execute();

    //Resetting _POST
}

if (isset($_POST['list_name'])) {
    echo "it went through 💖";

    $query_page = 'INSERT INTO lists(user_id, list_title)
    VALUES (:user_id, :list_title);';

    $insert_pages = $database->prepare($query_page);

    $insert_pages->bindParam(':user_id', $_SESSION['email'], PDO::PARAM_STR);
    $insert_pages->bindParam(':list_title', $_POST['list_name'], PDO::PARAM_STR);

    $insert_pages->execute();
}

redirect('/lists.php');
