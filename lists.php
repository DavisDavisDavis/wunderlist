<?php require __DIR__ . '/app/autoload.php'; ?>
<?php require __DIR__ . '/views/header.php'; ?>
<?php

$statment = $database->query('SELECT * FROM lists');
$lists = $statment->fetch(PDO::FETCH_ASSOC);

?>

<main>
    <h1>Task list</h1>


    <script src="list.js"></script>
</main>

<?php require __DIR__ . '/views/footer.php'; ?>
