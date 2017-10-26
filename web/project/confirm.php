<?php
  session_start();

  require "dbConnect.php";
  $db = get_db();

  $query = 'SELECT * FROM users WHERE username=:username';
	$statement = $db->prepare($query);
	$statement->bindValue(':username', $_SESSION['username']);
  $result = $statement->execute();
  $userRow = $statement->fetch();
?>
<!DOCTYPE html>
<html lang="en">

  <head>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

  <link rel="stylesheet" href="browse.css">

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

  <script
  src="https://code.jquery.com/jquery-3.2.1.min.js"
  integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
  crossorigin="anonymous"></script>

  <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

  </head>

  <body>

    <h1 class="text-center title"> <span class="red">Rager</span>Gamer</h1>

    <hr class="thick">

    <div class="text-center">
      <?php

        echo "<h2>These items: </h2>";

        foreach($_SESSION as $value) {
          if($value == $_SESSION['userid'] || $value == $_SESSION['username']) {
            continue;
          }

          echo "<h4>$value</h4>";
        }

        foreach($_REQUEST as $data) {
          $data = trim($data);
          $data = stripslashes($data);
          $data = htmlspecialchars($data);
        }

        
        echo "<h2>Will be sent to: </h2>";
        echo "<h4>" . $userRow['name'] . "\n"
            . "<h4>" . $userRow['street'] . "</h4>"
            . "<h4>" . $userRow['city'] . ", " . $userRow['state'] . " " . $userRow['zip'] . "</h4>";

        unset($value);
        unset($data);




        foreach($_SESSION as $game) {
          if($game == $_SESSION['userid'] || $game == $_SESSION['username']) {
            continue;
          }
          $query = 'INSERT INTO transactions (game_id, user_id, purchase_date) VALUES((SELECT id FROM games WHERE name = :game), (SELECT id FROM users WHERE username = :username), current_date)';
          $statement = $db->prepare($query);
          $statement->bindValue(':username', $_SESSION['username']);
          $statement->bindValue(':game', $game);        
          $statement->execute();
        }

        foreach($_SESSION as $value) {
          if($value == $_SESSION['userid'] || $value == $_SESSION['username']) {
            continue;
          }
          unset($_SESSION[$value]);
        }
        unset($game);
        unset($value);
      ?>

      <a href="browse.php">Back to Shopping</a>
    </div>

  </body>

</html>