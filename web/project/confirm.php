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

        // $st = $db->prepare("INSERT INTO users (username, password, address, city, state, zip, payment_type, card_num, name) VALUES(:username, :password, :address, :city, :state, :zip, :payment_type, :card_num, :name)");
        // $st->execute(array(':username' => 'tempun', ':password' => 'temppw', ':address' => $_REQUEST['street'], ':city' => $_REQUEST['city'], ':state' => $_REQUEST['state'], ':zip' => $_REQUEST['zip'], ':payment_type' => 'visa', ':card_num' => 123456789, ':name' => $_REQUEST['name']));

        echo "<h2>Will be sent to: </h2>";
        echo "<h4>" . $_REQUEST['name'] . "\n"
            . "<h4>" . $_REQUEST['street'] . "</h4>"
            . "<h4>" . $_REQUEST['city'] . ", " . $_REQUEST['state'] . " " . $_REQUEST['zip'] . "</h4>";
        
        unset($value);
        unset($data);

        foreach($_SESSION as $value) {
        $st = $db->prepare("INSERT INTO transactions (user_id, game_id, purchase_date) VALUES((SELECT id FROM games WHERE name = $value), (SELECT id FROM users WHERE name = 'tempnm'/*$_REQUEST[name]*/), current_date))");
        $st->execute();
        echo "ya";
        }
    
        unset($value);

        foreach($_SESSION as $value) {
          unset($_SESSION[$value]);
        }
        unset($value);
      ?>

      <a href="browse.php">Back to Shopping</a>
    </div>

  </body>

</html>