<?php

declare(strict_types=1);

require __DIR__ . '/../autoload.php';

// In this file we delete new posts in the database.

if (isset($_POST['delete_task'])) {
    echo "isset 💖";

    $query = 'DELETE FROM tasks WHERE id = :id AND user_id = :user_id';
    $statement = $database->prepare($query);
    $statement->bindParam(':id', $_POST['delete_task'], PDO::PARAM_INT);
    $statement->bindParam(':user_id', $_SESSION['email'], PDO::PARAM_STR);
    $statement->execute();
}

redirect('../../lists.php');
