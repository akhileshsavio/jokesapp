<?php 
try {
    include __DIR__ . '/includes/DatabaseConnection.php';
    include __DIR__ . '/includes/DatabaseFunctions.php';

// $output = 'Database connection established.';

$sql = 'SELECT joke.id, LEFT(joke.joketext, 20) as joketext, author.name, author.email FROM joke INNER JOIN author ON joke.authorid = author.id';
$result = $pdo->query($sql);
$jokes = $result->fetchAll();
$title = 'Joke list';
$totaljokes = totalJokes($pdo);

// Start the buffer
ob_start();
// Include the template. The PHP code will be executed,
// but the resulting HTML will be stored in the buffer
// rather than sent to the browser.
include __DIR__ . '/_templates/jokes.html.php';
// Read the contents of the output buffer and store them
// in the $output variable for use in layout.html.php
$output = ob_get_clean();

}
catch (PDOException $e) {
$title = 'An error has occurred';
$error = "Unable to connect to the database server: The error {$e->getMessage()} occured in the file {$e->getFile()}: at line {$e->getLine()}";
$output = $error;
}
include __DIR__.'/_templates/layout.html.php';
