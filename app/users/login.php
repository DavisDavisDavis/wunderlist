<?php

declare(strict_types=1);

require __DIR__ . '/../autoload.php';
echo "hewwo world <br>";
// In this file we login users.
if (isset($_POST['email'], $_POST['password'])) {
    echo "it works <3 <br>";

    $statment = $database->query('SELECT * FROM users');
    $user = $statment->fetch(PDO::FETCH_ASSOC);

    if ($user['email'] === $_POST['email'] && password_verify($_POST['password'], $user['password'])) {
        echo "user name correct 💖";
        $_SESSION['user'] = $user;
        $_SESSION['email'] = $_POST['email'];
        die(var_dump($_SESSION['email']));
    }

    // redirect('/');
}

// redirect('/');
