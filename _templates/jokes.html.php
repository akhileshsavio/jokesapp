<?php
if (isset($error)) {
   echo ("<p>{$error}<p>");
} else { ?>
   <blockquote>
      <p> <?php echo ($totaljokes) ?> jokes have been submitted to the Internet Joke Database.</p>
   </blockquote>
   <?php
   foreach ($jokes as $joke) { ?>
      <blockquote>
         <p>
            <?php echo ($joke['joketext']);
            echo (" {$joke['name']}");
            echo (" {$joke['email']}");

            ?>
         <form action="deletejoke.php" method="post">
            <input type="hidden" name="id" value="<?= $joke['id'] ?>">
            <input type="submit" name="delete" value="delete">
         </form>
         </p>
      </blockquote>
<?php };
}; ?>
