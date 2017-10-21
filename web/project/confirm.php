<?php
  session_start();

  require "dbConnect.php";
  $db = get_db();
?>
<!DOCTYPE html>
<html lang="en">

  <head>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

  <link rel="stylesheet" href="browse3.css">
  <!-- <script type="text/javascript" src="prove2.js"></script> -->

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
          echo "<h4>$value</h4>";
        }

        foreach($_REQUEST as $data) {
          $data = trim($data);
          $data = stripslashes($data);
          $data = htmlspecialchars($data);
        }

        echo "<h2>Will be sent to: </h2>";
        echo "<h4>" . $_REQUEST['name'] . "\n"
            . "<h4>" . $_REQUEST['street'] . "</h4>"
            . "<h4>" . $_REQUEST['city'] . ", " . $_REQUEST['state'] . " " . $_REQUEST['zip'] . "</h4>";

        unset($value);
        unset($data);

        $street = $_REQUEST['street'];
        $city = $_REQUEST['city'];
        $state = $_REQUEST['state'];
        $zip = $_REQUEST['zip'];
        $name = $_REQUEST['name'];
        $query = 'INSERT INTO users(username, password, address, city, state, zip, payment_type, card_num, name) VALUES(:username, :password, :address, :city, :state, :zip, :payment_type, :card_num, :name)';
        $statement = $db->prepare($query);
        $statement->bindValue(':username', $name);
        $statement->bindValue(':password', $name);
        $statement->bindValue(':address', $street);
        $statement->bindValue(':city', $city);
        $statement->bindValue(':state', $state);
        $statement->bindValue(':city', $city);
        $statement->bindValue(':zip', $zip);
        $statement->bindValue(':payment_type', 'visa');
        $statement->bindValue(':card_num', 1234567890);
        $statement->bindValue(':name', $name);
        $statement->execute();


        foreach($_SESSION as $game) {
          $statement = $db->prepare("INSERT INTO transactions(game_id,user_id, purchase_date) VALUES((SELECT id FROM games WHERE name = '$game'), (SELECT id FROM users WHERE name = '$name'), current_date)");
          $statement->execute();
        }

      ?>

      <a href="browse.php">Back to Shopping</a>
    </div>

  </body>

</html>