<?php
  session_start();
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

      <hr class="thick">

    </header>
    
    <?php
      echo "<h1>$_SESSION[error]</h1>";
      $_SESSION['error'] = "";
    ?>
    <div class="col-xs-12 text-center">    
      <h3>Input your information, so we can send you sweet games!</h3>
      <form  action="createUser.php" method="post">
        <div class="row pad">
          <label for="username">username:</label>
          <input type="text" name="username" id="username">
        </div>
        <div class="row pad">
          <label for="password">password:</label>
          <input type="password" name="password" id="password">
        </div>
        <div class="row pad">
          <label for="name">name:</label>
          <input type="text" name="name" id="name">
        </div>
        <div class="row pad">
          <label for="street">street:</label>
          <input type="text" name="street" id="street">
        </div>
        <div class="row pad">
          <label for="city">city:</label>
          <input type="text" name="city" id="city">
        </div>
        <div class="row pad">
          <label for="state">State:</label>
          <input type="text" name="state" id="state">
        </div>
        <div class="row pad">
          <label for="zip">Zip Code:</label>
          <input type="text" name="zip" id="zip">
        </div>
        <div class="row pad">
          <label for="cardNum">Credit Card number (visa only):</label>
          <input type="text" name="cardNum" id="cardNum">
        </div>
        <div class="row pad">
          <input type="submit">
        </div>
      </form>
    </div>

  </body>

</html>