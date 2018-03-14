<?php
  session_start();
  require("dbConnect.php");
  $db = get_db();
  $query = 'SELECT * FROM users WHERE username=:username';
	$statement = $db->prepare($query);
	$statement->bindValue(':username', $_SESSION['username']);
  $result = $statement->execute();
  $row = $statement->fetch();

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
<html>

  <head>

    <title>Account Details</title>

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
					<option value="logout.php">Logout</option>
				</select>
        
      </div>  
      </br>

      <hr class="thick">

    </header>

  <h1 class="text-center">Welcome to your account!</h1>


  <h4 class="text-center">Account Details</h4>
	<div class="cRow">
	<div class="cColumn">
  <div class="col-xs-12 text-center">
    <div class="row pad">
      <label for="name"><?php echo "Name: " . $row['name'];?></label>
    </div>
    <div class="row pad">
      <label for="street"><?php echo "Street: " . $row['address'];?></label>
    </div>
    <div class="row pad">
      <label for="city"><?php echo "City: " . $row['city'];?></label>
    </div>
    <div class="row pad">
      <label for="state"><?php echo "State: " . $row['state'];?></label>
    </div>
    <div class="row pad">
      <label for="zip"><?php echo "Zip Code: " . $row['zip'];?></label>
    </div>
    <div class="row pad">
      <label for="cardNum"><?php echo "Visa Number: " . $row['card_num'];?></label>
    </div>
  </div>
	</div>

	<div class="cColumn">
  <h4 class="text-center">Here are all of the games you've bought!</h4>

  <?php
  $query = 'SELECT g.name, g.picture, g.description FROM transactions AS t INNER JOIN games AS g ON g.id = t.game_id WHERE t.user_id = :user_id';
  $statement = $db->prepare($query);
  $statement->bindValue(':user_id', $_SESSION['userid']);
  $statement->execute();

	echo '<div class="col-xs-12 text-center">';	
	echo '<div style="width:400px; text-align:center;">';
	while ($row = $statement->fetch(PDO::FETCH_ASSOC))
	{
		// The variable "row" now holds the complete record for that
		// row, and we can access the different values based on their
		// name
		echo '<div class="row pad">';
		// echo '<p>' . $row['description'] . '</p>';
		// echo $row['name']. $row['description'];
		echo '<div>';				
		echo '<div class="pull-left" style="display:inline-block;"><img src="' . $row['picture'] . '" alt="' . $row['name'] . '" height="200" width="250" class="img-responsive center-block">' . $row['esrb'] . '</div>';
		echo '<p class="bold">' . $row['name'] . '</p>';
		echo '<p>' . $row['description'] . '</p>';
		echo '</div></br>';
		echo '</div>';
		echo '<hr class="thick">';
	}
	echo '</div>';
	echo '</div>';

  ?>

	</div>
	</div>

  </body>