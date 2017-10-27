<?php
  session_start();

  require "dbConnect.php";
  $db = get_db();

  $query = 'SELECT * FROM users WHERE username=:username';
	$statement = $db->prepare($query);
	$statement->bindValue(':username', $_SESSION['username']);
  $result = $statement->execute();
  $userRow = $statement->fetch();

  if (isset($_SESSION['username']))
  {
    $username = $_SESSION['username'];
  }
  else
  {
    header("Location: signin.php");
    die();
  }
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
    <header>
      <h1 class="text-center title"> <span class="red">Rager</span>Gamer</h1></br>

      <p class="text-right"><?php echo "Welcome " . $_SESSION['username']?></p>
      <div class="pull-right">
        <a href="account.php">Go to account</a>
        <a href="browse.php">Back to Browse</a>
        <a href="logout.php">Logout</a>
        
      </div>  
      </br></br></br>

      <hr class="thick">

    </header>

    <div class="text-center">
      <?php

        echo "<h2>These items: </h2>";

        foreach($_SESSION as $value) {
          if($value == $_SESSION['userid'] || $value == $_SESSION['username'] || $value == $_SESSION['error']) {
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
          if($game == $_SESSION['userid'] || $game == $_SESSION['username'] || $game == $_SESSION['error']) {
            continue;
          }
          $query = 'INSERT INTO transactions (game_id, user_id, purchase_date) VALUES((SELECT id FROM games WHERE name = :game), (SELECT id FROM users WHERE username = :username), current_date)';
          $statement = $db->prepare($query);
          $statement->bindValue(':username', $_SESSION['username']);
          $statement->bindValue(':game', $game);        
          $statement->execute();
        }

        foreach($_SESSION as $value) {
          if($value == $_SESSION['userid'] || $value == $_SESSION['username'] || $value == $_SESSION['error']) {
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