<?php
  session_start();
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
    <h1 class="text-center title"> <span class="red">Rager</span>Gamer</h1>

    <hr class="thick">

    <div class="col xs-12 text-center">
      <h3>These are the items that are currently in your cart.</h3>
      <?php
        foreach($_SESSION as $value) {
          echo "<div class='row'>";
          echo "<h3>$value</h3>";
          echo '<button class="btn-xs btn-primary" onclick="' . "deleteItem('" . "$value" . "')" . '">delete</button>' . "\n";
          echo "</div>";
        }

        unset($value);
      ?>  
      <div class="row pad">
        <a href="browse.php">Shop some more!</a>
        <a href="checkout.php">Checkout</a>
      </div>
    </div>
  </body>

</html>