<?php

session_start();

require("dbConnect.php");
$db = get_db();

$query = 'SELECT * FROM users WHERE username=:username';
$statement = $db->prepare($query);
$statement->bindValue(':username', $_SESSION['username']);
$result = $statement->execute();
$userRow = $statement->fetch();

if($row['card_num'] == 6666666666666666 || $row['card_num'] == '6666666666666666') 
{
	$row['card_num'] = 'Update, if you want to games.';
}

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
			<div class="pull-right">
        <!-- <a href="account.php">Go to account</a>
        <a href="cart.php">Go to cart</a>
        <a href="logout.php">Logout</a> -->
				<select name="navbar" onchange="javascript:handleSelect(this)">
					<option value="">Navigation</option>
					<option value="browse.php">Browse</option>
					<option value="cart.php">Cart</option>
					<option value="Account.php">Account</option>
					<option value="logout.php">Logout</option>
				</select>
        
      </div>  
      </br>

      <hr class="thick">

    </header>
    
    <?php
      echo "<h1>$_SESSION[error]</h1>";
      $_SESSION['error'] = "";
    ?>
    <div class="col-xs-12 text-center">    
      <h3>Update your information, so we can send you sweet games!</h3>
      <form  action="update.php" method="post">
        <div class="row pad">
          <label for="name">name:</label>
          <input type="text" name="name" id="name" value="<?php echo $userRow['name'];?>" pattern="^[a-z*A-Z*\s]{1,50}$" title="You sure that is your name??">
        </div>
        <div class="row pad">
          <label for="street">street:</label>
          <input type="text" name="street" id="street" value="<?php echo $userRow['address'];?>" pattern="^[a-z*A-Z*0-9*\s]{1,100}$" title="You sure that is your street?">
        </div>
        <div class="row pad">
          <label for="city">city:</label>
          <input type="text" name="city" id="city" value="<?php echo $userRow['city'];?>" pattern="^[a-z*A-Z*\s]{1,100}$" title="You sure that is your city?">
        </div>
        <div class="row pad">
          <label for="state">State:</label>
          <input type="text" name="state" id="state" value ="<?php echo $userRow['state'];?>" pattern="^[A-Z*]{2}$" title="Make sure to use your states capitalized two letter code">
        </div>
        <div class="row pad">
          <label for="zip">Zip Code:</label>
          <input type="text" name="zip" id="zip" value="<?php echo $userRow['zip'];?>" pattern="^[0-9*]{5}$" title="You sure that is your Zip Code?">
        </div>
        <div class="row pad">
          <label for="cardNum">Credit Card number (visa only):</label>
          <input type="text" name="cardNum" id="cardNum" value="<?php echo $userRow['card_num'];?>" pattern="^[0-9*]{16}$" title="You sure that is your Card Number? Do not use dashes.">
        </div>
        <div class="row pad">
          <input type="submit">
        </div>
      </form>
    </div>

  </body>

</html>