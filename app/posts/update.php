<?php

declare(strict_types=1);

require __DIR__ . '/../autoload.php';

// In this file we delete posts in the database.

//I wonder if i can make this into a class somehow...
if (isset($_POST['title'])) {
    $query = 'UPDATE lists SET title = :title WHERE id = :id AND user_id = :user_id';
    $statement = $database->prepare($query);
    $statement->bindParam(':title', $_POST['title'], PDO::PARAM_STR);
    $statement->bindParam(':id', $_POST['task_id'], PDO::PARAM_INT);
    $statement->bindParam(':user_id', $_SESSION['email'], PDO::PARAM_STR);
    $statement->execute();
}

redirect('/lists.php');
