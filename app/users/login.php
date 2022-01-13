<?php

declare(strict_types=1);

require __DIR__ . '/../autoload.php';
echo "hewwo world <br>";
// In this file we login users.
if (isset($_POST['email'], $_POST['password'])) {
    echo "it works <3 <br>";

    $statment = $database->query('SELECT * FROM users');
    $users = $statment->fetchAll(PDO::FETCH_ASSOC);

    foreach ($users as $user) {
        if ($user['email'] === $_POST['email'] && password_verify($_POST['password'], $user['password'])) {
            echo "user name correct 💖";

            $_SESSION['name'] = $_POST['name'];
            $_SESSION['email'] = $_POST['email'];
        }
    }


    redirect('/');
}

redirect('/');
