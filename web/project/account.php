<?php
  session_start();
  require("dbConnect.php");
  $db = get_db();
  $query = 'SELECT * FROM users WHERE username=:username';
	$statement = $db->prepare($query);
	$statement->bindValue(':username', $_SESSION['username']);
  $result = $statement->execute();
  $row = $statement->fetch();
?>
<!DOCTYPE html>
<html>

  <head>

    <title>Account Details</title>

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
      <h1 class="text-center title"> <span class="red">Rager</span>Gamer</h1></br>

      <p class="text-right"><?php echo "Welcome " . $_SESSION['username']?></p>
      <a href="cart.php" class="text-right">Go to cart</a>      

      <hr class="thick">
  </header>

  <h1 class="text-center">Welcome to your account!</h1>


  <h4 class="text-center">Account Details</h4>
  <a href="updateInfo.php">Update Info</a>

  <div class="col-xs-12 text-center">
    <div class="row pad">
      <label for="name"><?php echo "Name: " . $row['name']?></label>
    </div>
    <div class="row pad">
      <label for="street"><?php echo "Street: " . $row['street']?></label>
    </div>
    <div class="row pad">
      <label for="city"><?php echo "City: " . $row['city']?></label>
    </div>
    <div class="row pad">
      <label for="state"><?php echo "State: " . $row['state']?></label>
    </div>
    <div class="row pad">
      <label for="zip"><?php echo "Zip Code: " . $row['name']?></label>
    </div>
    <div class="row pad">
      <label for="cardNum"><?php echo "Visa Number: " . $row['card_num']?></label>
    </div>
  </div>

  </body>