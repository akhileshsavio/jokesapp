<?php
try {
    include __DIR__ . "/includes/DatabaseConnection.php";
    $id = $_POST['id'];
    $sql = 'DELETE FROM `joke` WHERE ((`id` = :id))';
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(':id', $id);
    $stmt->execute();
    header('location: jokes.php');
} catch (PDOException $e) {
    $title = 'An error has occurred';
    $error = "Unable to connect to the database server: The error {$e->getMessage()} occured in the file {$e->getFile()}: at line {$e->getLine()}";
    $output = $error;
};

include __DIR__ . '/_templates/layout.html.php';
?>
