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

    <h1 class="text-center title"> <span class="red">Rager</span>Gamer</h1>

    <hr class="thick">

    <?php
      $statement = $db->prepare("SELECT name, picture FROM games");
      $statement->execute();
      // Go through each result
      while ($row = $statement->fetch(PDO::FETCH_ASSOC))
      {
        // The variable "row" now holds the complete record for that
        // row, and we can access the different values based on their
        // name
        echo '<div class="col-xs-12 text-center">';
        echo '<div class="row pad">';
        echo '<img src="' . $row['picture'] . '" alt="' . $row['name'] . '" height="270" width="480" class="img-responsive center-block">';
        echo '<button class="btn-lg btn-primary" onclick="' . "addToCart('" . $row['name'] . "')" . '">delete</button>' . "\n";
        echo '</div>';
      }

      echo '<div class="row pad">';
      echo '<a href="cart.php">Go To Cart</a>';
      echo '</div>';
    ?>

    <!-- <div class="col-xs-12 text-center">
      <div class="row pad">
        <img src="http://gameranx.com/wp-content/uploads/2017/03/Destiny-2-1080P-Wallpaper-1.jpg" alt="Destiny 2" height="270" width="480" class="img-responsive center-block">
        <button class="btn-lg btn-primary" onclick="addToCart('Destiny 2')">Buy</button>
      </div>
      <div class="row pad">
        <img src="http://www.logicalincrements.com/assets/img/articles/overwatch/maxresdefault.jpg" alt="OverWatch" height="270" width="480" class="img-responsive center-block">
        <button class="btn-lg btn-primary" onclick="addToCart('OverWatch')">Buy</button>
      </div>
      <div class="row pad">
        <img src="https://i.pinimg.com/originals/7c/93/e5/7c93e56c19abb0951c8c208bfbf158c3.jpg" alt="Middle Earth: Shadow of War" height="270" width="480" class="img-responsive center-block">
        <button class="btn-lg btn-primary" onclick="addToCart('Middle Earth: Shadow of War')">buy</button>
      </div>
      <div class="row pad">
        <img src="https://techraptor.net/wp-content/uploads/2017/06/ac-origins.png" alt="Assassin's Creed: Origin" height="270" width="480" class="img-responsive center-block">
        <button class="btn-lg btn-primary" onclick="addToCart('Assassins Creed Origin')">buy</button>
      </div>
      <div class="row pad">
        <a href="cart.php">Go To Cart</a>
      </div> -->

    </div>
  </body>

</html>