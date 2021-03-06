<?php
  session_start();

  require "dbConnect.php";
  $db = get_db();

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

    <script>
      function addToCart(value) {

        $.ajax({
          type: "POST",
          url: 'addItem.php',
          data: {
            value : value,
          },
          success: function(response) {
            console.log(response);
          }
        });
				$('#alert').css('visibility', 'visible');
				// $('#alert').fadeIn('fast');
				
				// $('#alert').fadeOut('slow');
				setTimeout(function(){ $('#alert').css('visibility', 'hidden'); $('#alert').css('display', ''); }, 1500);
				// $('#alert').css('visibility', 'hidden');
				
      }

			function handleSelect(elm)
			{
				window.location = elm.value;
			}
    </script>

  </head>

  <body>

    <header>
      <h1 class="text-center title"> <span class="red">Rager</span>Gamer</h1></br>
			<div id="alert" style="position: fixed; top: 50%; left: 50%; visibility:hidden">Item added to cart</div>

      <p class="text-right"><?php echo "Welcome " . $_SESSION['username']?></p>
    

			<div class="pull-right">
        <!-- <a href="account.php">Go to account</a>
        <a href="cart.php">Go to cart</a>
        <a href="logout.php">Logout</a> -->
				<select name="navbar" onchange="javascript:handleSelect(this)">
					<option value="">Navigation</option>
					<option value="account.php">Account</option>
					<option value="cart.php">Cart</option>
					<option value="logout.php">Logout</option>
				</select>
        
      </div>  
      </br>

      <hr class="thick">

    </header>

    <?php
      $statement = $db->prepare("SELECT name, picture, description FROM games");
      $statement->execute();
			// Go through each result
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
        echo '<div class="pull-right"><button class="btn-med btn-primary" onclick="' . "addToCart('" . $row['name'] . "')" . '">Buy</button></div>';
				echo '</div>';
				echo '<hr class="thick">';
			}
			echo '</div>';
			echo '</div>';
			
    ?>

    </div>

  </body>

</html>