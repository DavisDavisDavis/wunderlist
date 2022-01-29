<?php

declare(strict_types=1);

require __DIR__ . '/../autoload.php';

// In this file we register a new user.

if (isset($_POST['name'], $_POST['email'], $_POST['password'])) {
    $name = filter_var(trim($_POST['name']), FILTER_SANITIZE_STRING);
    $email = filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $query =
        'INSERT INTO users (name, email, password)
        VALUES (:name, :email, :password);';

    $insert = $database->prepare($query);

    $insert->bindParam(':name', $name, PDO::PARAM_STR);
    $insert->bindParam(':email', $email, PDO::PARAM_STR);
    $insert->bindParam(':password', $password, PDO::PARAM_STR);
    $insert->execute();

    // SENDS WELCOME MESSAGE TO EMAIL
    sendMessage();
}

redirect('/login.php');
