<?php

declare(strict_types=1);

require __DIR__ . '/../autoload.php';

// In this file we delete posts in the database.

//I wonder if i can make this into a class somehow...
if (isset($_POST['task_id'])) {
    $query = 'UPDATE tasks SET
        title = :title,
        description = :description,
        completed = :completed,
        deadline = :deadline
    WHERE
        id = :id
        AND user_id = :user_id';

    $completed = 'yes';
    $not_completed = null;

    $statement = $database->prepare($query);
    if (isset($_POST['title'])) {
        $statement->bindParam(':title', $_POST['title'], PDO::PARAM_STR);
    }
    if (isset($_POST['content'])) {
        $statement->bindParam(':description', $_POST['content'], PDO::PARAM_STR);
    }
    if (isset($_POST['completed'])) {
        $statement->bindParam(':completed', $completed, PDO::PARAM_STR);
    } else {
        $statement->bindParam(':completed', $not_completed, PDO::PARAM_STR);
    }
    if (isset($_POST['deadline'])) {
        $statement->bindParam(':deadline', $_POST['deadline'], PDO::PARAM_STR);
    }
    $statement->bindParam(':id', $_POST['task_id'], PDO::PARAM_INT);
    $statement->bindParam(':user_id', $_SESSION['email'], PDO::PARAM_STR);
    $statement->execute();
}

if (isset($_POST['email'], $_POST['name'])) {
    $query = 'UPDATE users SET
        name = :name,
        email = :email,
        password = :password
    WHERE
        email = :email_old';

    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $statement = $database->prepare($query);
    $statement->bindParam(':name', $name, PDO::PARAM_STR);
    $statement->bindParam(':email', $email, PDO::PARAM_STR);
    $statement->bindParam(':password', $password, PDO::PARAM_STR);
    $statement->bindParam(':email_old', $_SESSION['email'], PDO::PARAM_STR);
    $statement->execute();
}




redirect('/lists.php');
