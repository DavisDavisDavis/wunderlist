<?php

declare(strict_types=1);

require __DIR__ . '/../autoload.php';


if (isset($_FILES['profile'])) {
    $profile = $_FILES['profile'];



    $destination = __DIR__ . '/img/' . $_SESSION['email'] . '.png';
    // die(var_dump($destination));
    if ($profile['size'] >= 2097152) {
        echo 'Too big';
        die(var_dump($profile));
    } else {
        move_uploaded_file($profile['tmp_name'], $destination);
    }
}

redirect('/profile.php');
