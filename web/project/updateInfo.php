<?php

session_start();

require("dbConnect.php");
$db = get_db();

$query = 'SELECT * FROM users WHERE username=:username';
$statement = $db->prepare($query);
$statement->bindValue(':username', $_SESSION['username']);
$result = $statement->execute();
$userRow = $statement->fetch();

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

$name = test_input($_POST['name']);
$street = test_input($_POST['street']);
$city = test_input($_POST['city']);
$state = test_input($_POST['state']);
$zip = test_input($_POST['zip']);
$cardNum = test_input($_POST['cardNum']);

if (!isset($name) || $name == ""
  || !isset($street) || $street == ""
  || !isset($city) || $city == ""
  || !isset($state) || $state == ""
  || !isset($zip) || $zip == ""
  || !isset($cardNum) || $cardNum == "")
{
  $_SESSION['error'] = "Try Again";
  header("Location: updateInfo.php");
	die(); 
}

$query = 'UPDATE users SET address = :address, city = :city, state = :state, zip = :zip, card_num = :card_num, name = :name WHERE username = :username';
$statement = $db->prepare($query);
$statement->bindValue(':username', $_SESSION['username']);
$statement->bindValue(':address', $street);
$statement->bindValue(':city', $city);
$statement->bindValue(':state', $state);
$statement->bindValue(':zip', $zip);
$statement->bindValue(':card_num', $cardNum);
$statement->bindValue(':name', $name);
$statement->execute();

header("Location: account.php");
die(); 
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

    <header>
      <h1 class="text-center title"> <span class="red">Rager</span>Gamer</h1>

      <hr class="thick">
    </header> 
    
    <?php
      echo "<h1>$_SESSION[error]</h1>";
    ?>
    <div class="col-xs-12 text-center">    
      <h3>Update your information, so we can send you sweet games!</h3>
      <form  action="updateInfo.php" method="post">
        <div class="row pad">
          <label for="username">username:</label>
          <input type="text" name="username" id="username" value="<?php $userRow['username']?>">
        </div>
        <div class="row pad">
          <label for="name">name:</label>
          <input type="text" name="name" id="name" value="<?php $userRow['name']?>">
        </div>
        <div class="row pad">
          <label for="street">street:</label>
          <input type="text" name="street" id="street" value="<?php $userRow['street']?>">
        </div>
        <div class="row pad">
          <label for="city">city:</label>
          <input type="text" name="city" id="city" value="<?php $userRow['city']?>">
        </div>
        <div class="row pad">
          <label for="state">State:</label>
          <input type="text" name="state" id="state" value ="<?php $userRow['state']?>">
        </div>
        <div class="row pad">
          <label for="zip">Zip Code:</label>
          <input type="text" name="zip" id="zip" value="<?php $userRow['zip']?>">
        </div>
        <div class="row pad">
          <label for="cardNum">Credit Card number (visa only):</label>
          <input type="text" name="cardNum" id="cardNum" value="<?php $userRow['card_num']?>">
        </div>
        <div class="row pad">
          <input type="submit">
        </div>
      </form>
    </div>

  </body>

</html>