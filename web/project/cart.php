<?php
  session_start();

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
  <script>
    function deleteItem(item) {
      $.ajax({
        type: "POST",
        url: 'deleteItem.php',
        data: {
          item : item
        },
        success: function(response) {
          console.log(response);
        }
      });
      
      location.reload();
    }
  </script>
  </head>

  <body>
    <header>
      <h1 class="text-center title"> <span class="red">Rager</span>Gamer</h1></br>

      <p class="text-right"><?php echo "Welcome " . $_SESSION['username']?></p>
      <div class="pull-right">
        <a href="confirm.php">Purchase</a>
        <a href="account.php">Go to account</a>
        <a href="browse.php">Back to Browse</a>
        <a href="logout.php">Logout</a>
        
      </div>  
      </br></br></br>

      <hr class="thick">

    </header>

    <div class="col xs-12 text-center">
      <h3>These are the items that are currently in your cart.</h3>
      <?php
        foreach($_SESSION as $value) {
          if($value == $_SESSION['userid'] || $value == $_SESSION['username'] || $value == $_SESSION['error']) {
            continue;
					}

					//This is where things are added
					$statement = $db->prepare("SELECT name, picture, description FROM games WHERE name = $value");
					$statement->execute();
					// Go through each result
					while ($row = $statement->fetch(PDO::FETCH_ASSOC))
					{
						// The variable "row" now holds the complete record for that
						// row, and we can access the different values based on their
						// name
						echo '<div class="col-xs-12 text-center">';
						echo '<div class="row pad">';
						echo '<p>' . $row['description'] . '</p>';
						echo '<img src="' . $row['picture'] . '" alt="' . $row['name'] . '" height="270" width="480" class="img-responsive center-block">';
            echo '<button class="btn-xs btn-primary" onclick="' . "deleteItem('" . "$value" . "')" . '">delete</button>' . "\n";						
						echo '</div>';
					}


					//end of addition
					
          // echo "<div class='row'>";
          // echo "<h3>$value</h3>";
          // echo '<button class="btn-xs btn-primary" onclick="' . "deleteItem('" . "$value" . "')" . '">delete</button>' . "\n";
          // echo "</div>";
        }

        unset($value);
      ?>  
    </div>
  </body>

</html>