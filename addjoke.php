<?php
if (isset($_POST['joketext'])){
    try{
        include __DIR__ . "/includes/DatabaseConnection.php";

        $sql='INSERT INTO `joke` SET `joketext`= :joketext, `jokedate` = CURDATE()';
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':joketext', $_POST['joketext']);
        $stmt->execute();
        // once the joke is inserted redirect to the following page.
        header('location: jokes.php');
    }
    catch(PDOException $e){
        $title = 'An Error has occured';
        $error = "Database error: The error {$e->getMessage()} occured in the file {$e->getFile()}: at line {$e->getLine()}";
    }
    
} else{
    $title = 'Add Joke';
    ob_start();
    include __DIR__.'/_templates/addjoke.html.php';
    $output = ob_get_clean();
}

include __DIR__.'/_templates/layout.html.php';
