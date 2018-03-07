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
      }
    </script>

  </head>

  <body>

    <header>
      <h1 class="text-center title"> <span class="red">Rager</span>Gamer</h1></br>

      <p class="text-right"><?php echo "Welcome " . $_SESSION['username']?></p>
      <div class="pull-right">
        <a href="account.php">Go to account</a>
        <a href="cart.php">Go to cart</a>
        <a href="logout.php">Logout</a>
        
      </div>  
      </br></br></br>

      <hr class="thick">

    </header>

    <?php
      $statement = $db->prepare("SELECT name, picture, description FROM games");
      $statement->execute();
			// Go through each result
			echo '<div class="col-xs-12 text-center" style="width:400px; display:inline-block;">';			
      while ($row = $statement->fetch(PDO::FETCH_ASSOC))
      {
        // The variable "row" now holds the complete record for that
        // row, and we can access the different values based on their
        // name
				echo '<div class="row pad med" style="display:inline-block">';
				echo '<hr class="thick">';
				// echo '<p>' . $row['description'] . '</p>';
				// echo $row['name']. $row['description'];				
				echo '<div class="pull-left" style="display:inline-block;"><img src="' . $row['picture'] . '" alt="' . $row['name'] . '" height="150" width="200" class="img-responsive center-block">' . $row['rating'] . '</div>';
				echo '<p>' . $row['description'] . '</p>';
        echo '<div class="pull-right"><button class="btn-lg btn-primary" onclick="' . "addToCart('" . $row['name'] . "')" . '">Buy</button></div>';
				echo '</div>';
			}
			echo '</div>';
			
    ?>

    </div>
  </body>

</html>