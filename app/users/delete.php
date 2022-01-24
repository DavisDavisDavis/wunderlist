<?php

declare(strict_types=1);

require __DIR__ . '/../autoload.php';

if (isset($_POST['delete'])) {
    $inputDelete= filter_var($_POST['delete'], FILTER_SANITIZE_STRING);
    $email = $_SESSION['email'];
    if ($inputDelete === 'DELETE') {

        // Delete lists
        $statement = $database->prepare('DELETE from lists WHERE user_id = :user_id');
        $statement->bindParam(':user_id', $email, PDO::PARAM_STR);
        $statement->execute();

        // Delete pages
        $statement = $database->prepare('DELETE from pages WHERE user_id  = :user_id');
        $statement->bindParam(':user_id', $email, PDO::PARAM_STR);
        $statement->execute();

        //Delete account
        $statement = $database->prepare('DELETE from users WHERE email = :email');
        $statement->bindParam(':email', $email, PDO::PARAM_STR);
        $statement->execute();

        $_SESSION['message'] = 'Your account has been deleted.';
        redirect('/index.php');
    } else {
        $_SESSION['message'] = "Failed to type 'DELETE'. Your account was not removed.";
        redirect('/profile.php');
    }
}
